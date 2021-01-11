<?php
/*
* 用于全网发布DEMO
* 1.备份好同目录的wechat.php文件
* 2.把次文件的名称换成 wechat.php
* 3.全网发布检测通过后两个文件在互换过来
*/
namespace app\task\controller;
use app\common\library\wechat\WxBizMsgCrypt;
use app\task\model\Config as ConfigModel;
/**
 * 第三方平台与微信通讯接口
 */
class Wechat
{
    /**
     * 异步通知处理
     */
    public function callback($appid='')
    {
		// 接收公众号平台发送的消息
		$nonce = empty ( $_GET ['nonce'] ) ?"" : trim ( $_GET ['nonce'] );
		$signature = empty ( $_GET['signature'] ) ? "" : trim ( $_GET ['signature'] );
		$timeStamp = empty ( $_GET ['timestamp']) ? "" : trim ( $_GET ['timestamp'] );
		$msg_signature = empty ( $_GET['msg_signature'] ) ? "" : trim ( $_GET ['msg_signature'] );
		$encryptMsg = file_get_contents ('php://input' );
		//获取第三方配置信息
		$config = ConfigModel::detail();		
        //创建解密类
		$pc = new WxBizMsgCrypt($config['token'], $config['encoding_aes_key'], $config['app_id']);
		$msg = '';	
		$errCode = $pc->decryptMsg($msg_signature, $timeStamp, $nonce, $encryptMsg, $msg);
		if($errCode == 0){
			$data = $this->_xmlToArr($msg);	//XML转换为数组
			write_log($data, __DIR__);//用于测试callback.php接口
			//接收普通消息 - 文本消息
			if($data['MsgType']=='text'){
				$needle ='QUERY_AUTH_CODE:';
                $tmparray = explode($needle,$data['Content']);
                if(count($tmparray)>1){
                    //3、模拟粉丝发送文本消息给专用测试公众号，第三方平台方需在5秒内返回空串
                    //表明暂时不回复，然后再立即使用客服消息接口发送消息回复粉丝                                
                    $contentx = str_replace($needle,'',$data['Content']);
					//获取授权信息
					$result = getAuth($config['app_id'], $config['component_access_token'], $contentx);
					$auth = $result['authorization_info'];//得到授权信息
					$test_token = $auth['authorizer_access_token'];
					$content_re = $contentx."_from_api";
                    echo '';
                    $data = '{"touser":"'.$data['FromUserName'].'","msgtype":"text","text":{"content":"'.$content_re.'"}}';                    
                    $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$test_token;
                    http_request($url,$data);
                    
                } else{
                    //2、模拟粉丝发送文本消息给专用测试公众号
                    $test = $data['ToUserName'];
					$data['ToUserName'] = $data['FromUserName'];
					$data['FromUserName'] = $test;
					$data['Content']='TESTCOMPONENT_MSG_TYPE_TEXT_callback';
					$xml= $this->_arrToXml($data);
					echo $xml;
                }
				
			}
			return 'success';
		}else{
			write_log('解密失败 - 错误代码：'.$errCode, __DIR__);
		}
		
    }

	/**
     * 将xml转为array
    */
	private function _xmlToArr($xml) {
        $res = @simplexml_load_string ( $xml,NULL, LIBXML_NOCDATA );
        $res = json_decode ( json_encode ( $res), true );
        return $res;
    }
	
	/**
     * 将array转为xml
    */
	private function _arrToXml($arr,$type='text')
	{
		$xml = "<xml>";
		foreach ($arr as $key => $val) {
			if (is_array($val)) {
				$xml .= "<" . $key . ">" . arrayToXml($val) . "</" . $key . ">";
			} else {
				switch($key){
					case "ToUserName":
						$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
						break;
					case "FromUserName":
						$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
						break;
					case "MsgType"://text,image,voice,video,music,news
						$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
						switch($val){
							case "text":
								break;
							case "image":
								$xml .= "<Image><MediaId><![CDATA[" . $arr['MediaId'] . "]]></MediaId></Image>";
								break;
							case "voice":
								$xml .= "<Voice><MediaId><![CDATA[" . $arr['MediaId'] . "]]></MediaId></Voice>";
								break;
							case "video":
								$xml .= "<Video><MediaId><![CDATA[" . $arr['MediaId'] . "]]></MediaId><Title><![CDATA[" . $arr['Title'] . "]]></Title><Description><![CDATA[" . $arr['Description'] . "]]></Description></Video>";
								break;
							case "music":
								$xml .= "<Music><Title><![CDATA[" . $arr['Title'] . "]]></Title><Description><![CDATA[" . $arr['Description'] . "]]></Description><MusicUrl><![CDATA[" . $arr['MusicUrl'] . "]]></MusicUrl><HQMusicUrl><![CDATA[" . $arr['HQMusicUrl'] . "]]></HQMusicUrl><ThumbMediaId><![CDATA[" . $arr['ThumbMediaId'] . "]]></ThumbMediaId></Music>";
								break;
							case "news":
								$xml .= "<ArticleCount>1</ArticleCount><Articles><item><Title><![CDATA[" . $arr['Title'] . "]]></Title><Description><![CDATA[" . $arr['Description'] . "]]></Description><PicUrl><![CDATA[" . $arr['PicUrl'] . "]]></PicUrl><Url><![CDATA[" . $arr['Url'] . "]]></Url></item></Articles>";
								break;
						}
						break;
					case "Content":
						$xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
						break;
					case "MediaId":
						break;
					case "Title":
						break;
					case "Description":
						break;
					case "MusicUrl":
						break;
					case "HQMusicUrl":
						break;
					case "ThumbMediaId":
						break;
					case "PicUrl":
						break;
					case "Url":
						break;
					default:
						$xml .= "<" . $key . ">" . $val . "</" . $key . ">";
				}
			}
		}
		$xml .= "</xml>";
		return $xml;
	}	
}
