<?php
namespace app\task\controller;
use app\common\library\wechat\WxBizMsgCrypt;
use app\task\model\Config as ConfigModel;
use app\task\model\Wxapp as WxappModel;
use app\task\model\Setting as SettingModel;
use app\task\model\Keyword as KeywordModel;
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
		
		//获取应用信息
		if(!empty($appid)){
			$wxapp = WxappModel::getWxapp(['app_id' => $appid]);
		}
		//获取第三方配置信息
		$config = ConfigModel::detail();		
        //创建解密类
		$pc = new WxBizMsgCrypt($config['token'], $config['encoding_aes_key'], $config['app_id']);
		$msg = '';	
		$errCode = $pc->decryptMsg($msg_signature, $timeStamp, $nonce, $encryptMsg, $msg);
		if($errCode == 0){
			$data = _xmlToArr($msg);	//XML转换为数组
			//write_log($data, __DIR__);
			
			//*********************************接收事件推送*****************************************
			if($data['MsgType']=='event'){
				//关注事件
				if($data['Event']=='subscribe'){
					//是否设置了关注回复
					if($subscribe = SettingModel::getItem('subscribe',$wxapp['wxapp_id'])){
						$this->replyMsg($subscribe,$data);//回复信息
					}
				}
				
				//取消关注事件
				if($data['Event']=='unsubscribe'){
					
				}
				
				//扫描带参数二维码事件 - 用户未关注时，进行关注后的事件推送
				if($data['Event']=='subscribe' AND isset($data['EventKey'])){
		
				}
				
				//扫描带参数二维码事件 - 用户已关注时的事件推送
				if($data['Event']=='SCAN'){
				
				}
				
				//上报地理位置事件
				if($data['Event']=='LOCATION'){
					
				}
				
				//自定义菜单事件 - 点击菜单拉取消息时的事件推送
				if($data['Event']=='CLICK'){
					
				}
				
				//自定义菜单事件 - 点击菜单跳转链接时的事件推送
				if($data['Event']=='VIEW'){
					
				}
			}
			
			//*********************************接收普通消息*****************************************
			//接收普通消息 - 文本消息
			if($data['MsgType']=='text'){
				//是否设置了关键字回复
				$model = new KeywordModel;
				if($values = $model->getKey($data['Content'],$wxapp['wxapp_id'])){
					$this->replyMsg($values,$data);//回复信息
				}else{
					//没有，发什么回什么
					echo $this->msgTpl([
						'ToUserName' => $data['FromUserName'],
						'FromUserName' => $data['ToUserName'],
						'MsgType' => $data['MsgType'],
						'Content' => $data['Content']
					]);
				}
			}
			
			//接收普通消息 - 图片消息
			if($data['MsgType']=='image'){
				//发什么回什么
				echo $this->msgTpl([
					'ToUserName' => $data['FromUserName'],
					'FromUserName' => $data['ToUserName'],
					'MsgType' => $data['MsgType'],
					'MediaId' => $data['MediaId']
				]);
			}
			
			//接收普通消息 - 语音消息
			if($data['MsgType']=='voice'){
				//发什么回什么
				echo $this->msgTpl([
					'ToUserName' => $data['FromUserName'],
					'FromUserName' => $data['ToUserName'],
					'MsgType' => $data['MsgType'],
					'MediaId' => $data['MediaId']
				]);
			}
			
			//接收普通消息 - 视频消息
			if($data['MsgType']=='video'){
				//发什么回什么
				echo $this->msgTpl([
					'ToUserName' => $data['FromUserName'],
					'FromUserName' => $data['ToUserName'],
					'MsgType' => 'text',
					'Content' => '我不看，太低俗~'
				]);
			}
			
			//接收普通消息 - 小视频消息
			if($data['MsgType']=='shortvideo'){
				
			}
			
			//接收普通消息 - 地理位置消息
			if($data['MsgType']=='location'){
				
			}
			
			//接收普通消息 - 链接消息
			if($data['MsgType']=='link'){
				
			}
			return 'success';
		}else{
			write_log('解密失败 - 错误代码：'.$errCode, __DIR__);
		}
		
    }
	
	/**
     * 将array转为xml
    */
	private function msgTpl($arr)
	{
		$xml ="<xml><ToUserName><![CDATA[" . $arr['ToUserName'] . "]]></ToUserName>";
		$xml .="<FromUserName><![CDATA[" . $arr['FromUserName'] . "]]></FromUserName>";
		$xml .="<CreateTime>" . time() . "</CreateTime>";
		$xml .="<MsgType><![CDATA[" . $arr['MsgType'] . "]]></MsgType>";
		switch($arr['MsgType']){
			case "text":
				$xml .="<Content><![CDATA[" . $arr['Content'] . "]]></Content>";
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
				$xml .= "<ArticleCount>". sizeof($arr['Articles']) ."</ArticleCount><Articles>";
				for($n=0;$n<sizeof($arr['Articles']);$n++){
					$xml .= "<item><Title><![CDATA[". $arr['Articles'][$n]['title'] ."]]></Title><Description><![CDATA[". $arr['Articles'][$n]['description'] ."]]></Description><PicUrl><![CDATA[". $arr['Articles'][$n]['picurl'] ."]]></PicUrl><Url><![CDATA[". $arr['Articles'][$n]['url'] ."]]></Url></item>";
				}
				$xml .= "</Articles>";
				break;
		}
		$xml .= "</xml>";
		return $xml;
	}
	
	/**
     * 回复消息
    */
	private function replyMsg($msg,$data)
	{
		//是否开启
		if($msg['is_open']==1){
			//文字消息
			if($msg['type']=='text'){
				echo $this->msgTpl([
					'ToUserName' => $data['FromUserName'],
					'FromUserName' => $data['ToUserName'],
					'MsgType' => 'text',
					'Content' => $msg['dataGroup']['text']['content']
				]);
			}			
			//图片消息
			if($msg['type']=='image'){
				echo $this->msgTpl([
				  'ToUserName' => $data['FromUserName'],
				  'FromUserName' => $data['ToUserName'],
				  'MsgType' => 'image',
				  'MediaId' => $msg['dataGroup']['image']['media_id']
				]);
			}
			//语音消息
			if($msg['type']=='voice'){
				echo $this->msgTpl([
				  'ToUserName' => $data['FromUserName'],
				  'FromUserName' => $data['ToUserName'],
				  'MsgType' => 'voice',
				  'MediaId' => $msg['dataGroup']['voice']['media_id']
				]);
			}
			//视频消息
			if($msg['type']=='video'){
				echo $this->msgTpl([
				  'ToUserName' => $data['FromUserName'],
				  'FromUserName' => $data['ToUserName'],
				  'MsgType' => 'video',
				  'Title' => $msg['dataGroup']['video']['title'],
				  'Description' => $msg['dataGroup']['video']['description'],
				  'MediaId' => $msg['dataGroup']['video']['media_id']
				]);	
			}
			//音乐消息
			if($msg['type']=='music'){
				echo $this->msgTpl([
				  'ToUserName' => $data['FromUserName'],
				  'FromUserName' => $data['ToUserName'],
				  'MsgType' => 'music',
				  'Title' => $msg['dataGroup']['music']['title'],
				  'Description' => $msg['dataGroup']['music']['description'],
				  'MusicUrl' => $msg['dataGroup']['music']['url'],
				  'HQMusicUrl' => $msg['dataGroup']['music']['hurl'],
				  'ThumbMediaId' => $msg['dataGroup']['music']['media_id']
				]);
			}
			//图文消息
			if($msg['type']=='news'){
				echo $this->msgTpl([
				  'ToUserName' => $data['FromUserName'],
				  'FromUserName' => $data['ToUserName'],
				  'MsgType' => 'news',
				  'Articles' => $msg['dataGroup']['news']['item']
				]);
			}
		}
	}		
}
