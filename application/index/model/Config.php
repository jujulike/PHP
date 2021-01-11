<?php
namespace app\index\model;

use think\Model;
use think\Session;
/**
 * 站点配置模型
 */
class Config extends Model
{

    /**
     * 从缓存中获取配置信息
     */
    public static function detail()
    {
		$datail = self::find();
		unset($datail->user_name);
		unset($datail->password);
		unset($datail->app_id);
		unset($datail->app_secret);
		unset($datail->encoding_aes_key);
		unset($datail->token);
		unset($datail->api_domain);
		unset($datail->mchid);
		unset($datail->apikey);
		unset($datail->component_verify_ticket);
		unset($datail->component_access_token);
		unset($datail->expires_in);
        return $datail;
    }
}
