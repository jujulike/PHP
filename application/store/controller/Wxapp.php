<?php
namespace app\store\controller;
use app\store\model\Wxapp as WxappModel;
use app\store\model\Config as ConfigModel;
use app\store\model\UploadFile as UploadFileModel;

/**
 * 小程序管理
 */
class Wxapp extends Controller
{
    /**
     * 小程序设置
     */
    public function setting()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
            $data = $this->postData('wxapp');
            if ($wxapp->edit($data)) return $this->renderSuccess('更新成功');
            return $this->renderError('更新失败');
        }
		//如果授权给第三方了，则获取
		if($wxapp['is_empower']['value']==1){
			$infor = $this->getInfor(); //服务端 - 小程序设置信息
		}
        return $this->fetch('setting', compact('wxapp','infor'));
    }
	
	
	/**
     * 生成二维码
     */
	public function qrCode($wxapp_id)
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/getwxacode?access_token='.$access_token;
		$data = '{"path":"/pages/index/index"}';
		$result = http_request($url,$data);
		file_put_contents('assets/images/wxapp/'.$wxapp_id.'.png',$result); //获取的二维码数据存储到指定的文件
		$this->redirect('/assets/images/wxapp/'.$wxapp_id.'.png');
	}
	
	/**
     * 设置功能介绍
     */
    public function signature()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
			$app = $this->postData('wxapp');
			$access_token = getAccessToken();
			$url = 'https://api.weixin.qq.com/cgi-bin/account/modifysignature?access_token='.$access_token;
			$data = '{"signature": "'.$app['signature'].'"}';
			$result = json_decode(http_request($url,$data),true);
			if($result['errcode']!=0){
				return $this->renderError('设置失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
            if ($wxapp->edit($app)) return $this->renderSuccess('设置成功', url('wxapp/setting'));
            return $this->renderError('设置失败');
        }
        return $this->fetch('signature', compact('wxapp'));
    }
	
	/**
     * 设置业务域名
     */
    public function setdomain()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
			$app = $this->postData('wxapp');
			$access_token = getAccessToken();
			$url = 'https://api.weixin.qq.com/wxa/setwebviewdomain?access_token='.$access_token;
			$data = '{"action":"set","webviewdomain":["'.$app['api_domain'].'"]}';
			$result = json_decode(http_request($url,$data),true);
			if($result['errcode']!=0){
				return $this->renderError('设置失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
            if ($wxapp->edit($app)) return $this->renderSuccess('设置成功', url('wxapp/setting'));
            return $this->renderError('设置失败');
        }
        return $this->fetch('setdomain', compact('wxapp'));
    }
	
	/**
     * 设置服务器域名
     */
    public function servedomain()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
			$app = $this->postData('wxapp');
			$access_token = getAccessToken();
			$url = 'https://api.weixin.qq.com/wxa/modify_domain?access_token='.$access_token;
			$data = '{"action":"set","requestdomain":["https://'.$app['serve_domain'].'"],"wsrequestdomain":["wss://'.$app['serve_domain'].'"],"uploaddomain": ["https://'.$app['serve_domain'].'"],"downloaddomain": ["https://'.$app['serve_domain'].'"]}';
			$result = json_decode(http_request($url,$data),true);
			if($result['errcode']!=0){
				return $this->renderError('设置失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
			$app['serve_domain'] = 'https://'.$app['serve_domain'];
            if ($wxapp->edit($app)) return $this->renderSuccess('设置成功', url('wxapp/setting'));
            return $this->renderError('设置失败');
        }
        return $this->fetch('servedomain', compact('wxapp'));
    }
	
	/**
     * 设置头像
     */
    public function sethead()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
			$app = $this->postData('wxapp');
			if(empty($app['head_img'])){
				return $this->renderError('请选择一个头像图片');
			}else{
				$access_token = getAccessToken();
				//获取图片文件名称
				$file = UploadFileModel::getFileName($app['head_img']);
				$filename = '/uploads/'.$file;
				$real_path="{$_SERVER['DOCUMENT_ROOT']}{$filename}";
				//上传临时素材
				$url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$access_token.'&type=image';
				$data['media'] = curl_file_create($real_path,'image/jpeg',$file);//获取要上传的二进制文件
				$result = json_decode(http_request($url,$data),true);
				$media_id = $result['media_id']; //返回的临时素材（media_id）
				//执行修改头像
				$url = 'https://api.weixin.qq.com/cgi-bin/account/modifyheadimage?access_token='.$access_token;
				$data = '{"head_img_media_id":"'.$media_id.'","x1":0,"y1":0,"x2":1,"y2":1}';
				$result = json_decode(http_request($url,$data),true);
				if($result['errcode']!=0){
					return $this->renderError('设置失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
				}
				$app['head_img'] = $filename; 
				if ($wxapp->edit($app)){
					return $this->renderSuccess('设置成功', url('wxapp/setting'));
				}
				return $this->renderError('设置失败');
				
			}
        }
        return $this->fetch('sethead', compact('wxapp'));
    }
	
	/**
     * 设置昵称
     */
    public function setnickname()
    {
        $wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
			$app = $this->postData('wxapp');
			$access_token = getAccessToken();
			$url = 'https://api.weixin.qq.com/wxa/setnickname?access_token='.$access_token;
			$data = '{"nick_name":"'.$app['app_name'].'"}';
			$result = json_decode(http_request($url,$data),true);
			if($result['errcode']!=0){
				return $this->renderError('设置失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
			write_log('昵称设置成功：商户ID：'.$wxapp['wxapp_id'].'，audit_id='.$result['audit_id'], __DIR__);//记录日志
            if ($wxapp->edit($app)) return $this->renderSuccess('设置成功', url('wxapp/setting'));
            return $this->renderError('设置失败');
        }
        return $this->fetch('setnickname', compact('wxapp'));
    }
	
	/**
	* 查询昵称设置状态
	*/
	public function querynickname(){
		$audit_id='454738159';
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/api_wxa_querynickname?access_token='.$access_token;
		$data = '{"audit_id":"'.$audit_id.'"}';
		$result = http_request($url,$data);
		return $result;
	}
	
	/**
	* 获取可设置的所有类目
	*/
	public function getallcategories()
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/getallcategories?access_token='.$access_token;
		//$result = curl($url);
		$result = json_decode(curl($url),true);
		write_log($result, __DIR__);//记录日志
		//return $result;
	}
	/**
	* 获取小程序设置信息
	*/
	public function getInfor(){
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/account/getaccountbasicinfo?access_token='.$access_token;
		$result = json_decode(curl($url),true);
		return $result;
	}
	
	/**
	* 获取审核时可填写的类目信息
	*/
	public function getshowwxaitem()
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/getshowwxaitem?access_token='.$access_token;
		return curl($url);
	}
	
	/**
     * 一键扫码授权控制器
     */
    public function authorize()
    {
		$type = $this->store['wxapp']['app_type']['value'];//获取应用类型,1为公众号
		if($err = is_power()){
			$url = 'wxapp/setting';
			if($type==1){
				$url = 'wechat/setting';
			}
			$this->error($err, $url);
            return false;
		}
		$auth_code = empty ( $_GET ['auth_code'] ) ?"" : trim ( $_GET ['auth_code'] );	//获取授权码
		$config = ConfigModel::detail();
		if(!empty($auth_code)){
			
			//获取授权信息
			$result = getAuth($config['app_id'], $config['component_access_token'], $auth_code);
			$auth = $result['authorization_info'];//得到授权信息
				
			//获取授权应用的帐号基本信息
			$result = getAppInfo($config['app_id'], $config['component_access_token'], $auth['authorizer_appid']);
			$app = $result['authorizer_info'];//得到授权应用的帐号基本信息
				
			$wxapp = WxappModel::detail(); //获取商户数据
			$wxapp->edit([
				'app_name' => $app['nick_name'],					//昵称
				'head_img' => $app['head_img'],						//头像
				'user_name' => $app['user_name'],					//原始ID
				'principal_name' => $app['principal_name'],			//主体名称
				'signature' => $app['signature'],					//账号介绍
				'app_id' => $auth['authorizer_appid'],				//授权方APPid
				'access_token' => $auth['authorizer_access_token'],	//令牌
				'expires_in' => time()+7000,						//令牌过期时间
				'authorizer_refresh_token' => $auth['authorizer_refresh_token'],	//刷新令牌
				'is_empower' => 1,	//是否授权				
			]);
			if($type==1){
				$this->redirect('wechat/setting');
			}
			$this->redirect('wxapp/setting');
		}
		if($type>1){
			$type=2; //大于1为公众号
		}
		if(empty($config['app_id']) OR empty($config['component_access_token'])){
			$url = 'wxapp/setting';
			if($type==1){
				$url = 'wechat/setting';
			}
			$this->error('第三方参数配置错误', $url);
            return false;
		}
		$url = authUrl($config['app_id'],$config['component_access_token'],$type);//获取授权页面地址
		$this->redirect($url);
	}
	
}
