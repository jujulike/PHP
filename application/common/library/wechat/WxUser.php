<?php

namespace app\common\library\wechat;

/**
 * 微信小程序用户管理类
 */
class WxUser
{
    private $appId;
	private $componentAppId;
    private $componentAccessToken;

    private $error;

    /**
     * 构造方法
     */
    public function __construct($appId, $componentAppId, $componentAccessToken)
    {
        $this->appId = $appId;
        $this->componentAppId = $componentAppId;
		$this->componentAccessToken = $componentAccessToken;
    }

    /**
     * 获取session_key
     */
    public function sessionKey($code)
    {
        /**
         * code 换取 session_key
         * ​这是一个 HTTPS 接口，开发者服务器使用登录凭证 code 获取 session_key 和 openid。
         * 其中 session_key 是对用户数据进行加密签名的密钥。为了自身应用安全，session_key 不应该在网络上传输。
		 * curl() 为GET 方式请求
         */
        $url = 'https://api.weixin.qq.com/sns/component/jscode2session';
        $result = json_decode(curl($url, [
            'appid' => $this->appId,
			'js_code' => $code,
            'grant_type' => 'authorization_code',
            'component_appid' => $this->componentAppId,
			'component_access_token' => $this->componentAccessToken
            
        ]), true);
        if (isset($result['errcode'])) {
            $this->error = $result['errmsg'];
            return false;
        }
        return $result;
    }

    public function getError()
    {
        return $this->error;
    }

}