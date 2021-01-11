<?php
namespace app\task\controller;
use app\common\library\wechat\WxBizMsgCrypt;
use app\task\model\Config as ConfigModel;
use app\task\model\Wxapp as WxappModel;
/**
 * 第三方平台与微信通讯接口
 */

class Callback
{
	/**
     * 异步通知处理
     */
    public function web()
    {
		echo 'success';
	}
    /**
     * 异步通知处理
     */
    public function ticket()
    {
		//获取第三方配置信息
		$config = ConfigModel::detail();
		// 接收公众号平台发送的消息
		$timeStamp = empty ( $_GET ['timestamp']) ? "" : trim ( $_GET ['timestamp'] );
        $nonce = empty ( $_GET ['nonce'] ) ?"" : trim ( $_GET ['nonce'] );
        $msg_signature = empty ( $_GET['msg_signature'] ) ? "" : trim ( $_GET ['msg_signature'] );
        $encryptMsg = file_get_contents ('php://input' );
        //创建解密类
		$pc = new WxBizMsgCrypt($config['token'], $config['encoding_aes_key'], $config['app_id']);
		$msg = '';
		
		$errCode = $pc->decryptMsg($msg_signature, $timeStamp, $nonce, $encryptMsg, $msg);
		if($errCode == 0){
			$data = _xmlToArr($msg);	//XML转换为数组
			//write_log($data, __DIR__);//用于测试callback.php接口
			//推送的ticket
			if($data['InfoType'] == 'component_verify_ticket'){
				//更新过期的令牌component_access_token
				if($config['expires_in'] < time()){
					$token = $this->getToken($config['app_id'], $config['app_secret'], $config['component_verify_ticket']);
					$config['component_access_token'] = $token['component_access_token'];
					$config['expires_in'] = time()+6000;
				}
				$config['component_verify_ticket'] = $data['ComponentVerifyTicket']; 
				$config->save();	//保存ticket
			}
			//取消授权
			if($data['InfoType'] == 'unauthorized'){
				$wxapp = WxappModel::getWxapp(['app_id' => $data['AuthorizerAppid']]); //获取商户数据
				$wxapp->edit([
					'is_empower' => 0,	//0=取消授权
					'app_id' => '',	//app_id值空，否则影响下次授权
				]);
			}
			//更新授权
			if($data['InfoType'] == 'updateauthorized'){
				/*
				Array
				(
					[AppId] => wxd081a139beb02c77
					[CreateTime] => 1572001402
					[InfoType] => updateauthorized
					[AuthorizerAppid] => wxfd9875920f95854c
					[AuthorizationCode] => queryauthcode@@@x51tQWCqAh2vrSm6LOkLUDEvazWHdq8bZ05mwEwMDVGCBVZiydGjEMhbO0qDTriq-7F1sFNuicI_lqSp4SWUqg
					[AuthorizationCodeExpiredTime] => 1572005002
					[PreAuthCode] => preauthcode@@@eJqcbkFUN6N1hrO1S4H_zymHzftXj902fhTR5EM1zUCFHCUmSYISd-dYq_Gt_x0w
				)
				*/
			}
			//成功授权
			if($data['InfoType'] == 'authorized'){
				//转移到 store/wxapp/authorize
			}
			
			//小程序注册成功
			if($data['InfoType'] == 'notify_third_fasteregister'){
				write_log('小程序注册成功', __DIR__);
				write_log($data, __DIR__);
			}
			//名称审核结果事件推送
			if($data['MsgType'] == 'event'){
				if($data['Event'] == 'weapp_audit_success'){
					write_log('审核通过', __DIR__);
				}
				if($data['Event'] == 'weapp_audit_fail'){
					write_log('审核不通过', __DIR__);
				}
				if($data['Event'] == 'weapp_audit_delay'){
					write_log('审核延后', __DIR__);
				}
				write_log($data, __DIR__);				
			}
			return 'success';
		}else{
			write_log('解密失败 - 错误代码：'.$errCode, __DIR__);
		}
		
    }
	
	/**
     * 获取 component_access_token
    */
	private function getToken($appid, $appsecret, $ticket)
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';
		$data = '{"component_appid":"'.$appid.'","component_appsecret":"'.$appsecret.'","component_verify_ticket":"'.$ticket.'"}';
		$result = http_request($url,$data);
		return json_decode($result,true);
	}
}
