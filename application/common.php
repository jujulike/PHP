<?php
// 应用公共函数库文件
use think\Request;
use think\Cache;
use think\Session;
use app\common\model\Wxapp as WxappModel;
use app\common\model\Config as ConfigModel;
use app\common\library\wechat\WxPay;
	
	/**
     * 获取已设置的所有类目
     */
	function getCategory(){
		$access_token = getAccessToken();
		if($access_token){
			$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/getcategory?access_token='.$access_token;
			return json_decode(curl($url),true);
		}
		return false;
	}
	
	/**
     * 获取令牌
     */
	function getAccessToken()
	{
		$wxapp = WxappModel::detail();
		if($wxapp['is_empower']['value']==0){
			return false;	//未授权
		}
		if($wxapp['expires_in'] >= time()){
			$access_token=$wxapp['access_token'];
		}else{
			//重新获取
			$config = ConfigModel::detail();	//获取第三方配置
			$url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$config['component_access_token'];
			$data ='{"component_appid": "'.$config['app_id'].'","authorizer_appid": "'.$wxapp['app_id'].'","authorizer_refresh_token": "'.$wxapp['authorizer_refresh_token'].'"}';
			$result = http_request($url,$data);
			$token = json_decode($result,true);
			$wxapp['access_token'] = $token['authorizer_access_token'];
			$wxapp['expires_in'] = time()+7000; //2个小时候过期，少加200秒
			//$wxapp['authorizer_refresh_token'] = $token['authorizer_refresh_token'];
			$access_token = $token['authorizer_access_token'];
			$wxapp->save();//保存最新的令牌access_token和过期时间
		}
		return $access_token;		
	}
	
	/**
     * 检测权限
	 * $lx值 store = 商户，admin = 超级管理端
    */
	function is_power($lx='store'){
		if($lx=='admin'){
			$admin = Session::get('hema_admin');
			//判断用户状态，=0正常，=10演示，=20过期
			if($admin['user']['status']==10){
				return '演示用户无法操作';
			}
			if($admin['user']['status']==20){
				return '过期用户无法操作';
			}
			//判断角色; =0为超级管理员，>0为角色管理,控制管理权限
			if($admin['user']['role']>0){
				//非管理员，检测权限
				//return errMsg(0, '过期用户无法操作', '');
			}
		}else{
			$store = Session::get('hema_store');
			//判断用户状态，=0正常，=10演示，=20过期
			if($store['user']['status']==10){
				return '演示用户无法操作';
			}
			if($store['user']['status']==20){
				return '过期用户无法操作';
			}
			//判断角色; =0为超级管理员，>0为角色管理,控制管理权限
			if($store['user']['role']>0){
				//非管理员，检测权限
				//return errMsg(0, '过期用户无法操作', '');
			}
			//判断是否授权
			if(isset($store['wxapp'])){
				$value = $store['wxapp']['is_empower']['value'];
				if($value==0){
					//如果没授权
					if($store['wxapp']['app_type']['value']>1){
						return '您还没有绑定小程序';
					}
					return '您还没有绑定公众号';
				}
			}
		}
		return false;
	}
	
	/**
	* 获取预授权码 - 生成授权页面
	* $type，1=授权公众号，2=授权小程序，3=两者都有
	*/
	function authUrl($appid, $access_token,$type=3){
		$url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$access_token;
		$data = '{"component_appid": "'.$appid.'"}';
		$result = json_decode(http_request($url,$data),true);//返回"pre_auth_code": "预授权码","expires_in": 有效期（600秒）
		$url = 'https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid='.$appid.'&pre_auth_code='.$result['pre_auth_code'].'&redirect_uri='.base_url().'authorize.php&auth_type='.$type;
		return $url;
	}
	
	/**
     * 获取授权信息
    */
	function getAuth($appid, $access_token, $auth_code)
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$access_token;
		$data = '{"component_appid":"'.$appid.'","authorization_code": "'.$auth_code.'"}';
		return json_decode(http_request($url,$data),true);	
	}
	
	/**
     * 获取授权应用的帐号基本信息
    */
	function getAppInfo($appid, $access_token, $auth_appid)
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token='.$access_token;
		$data = '{"component_appid":"'.$appid.'","authorizer_appid": "'.$auth_appid.'"}';
		return json_decode(http_request($url,$data),true);	
	}
	
	/**
     * 将xml转为array
    */
	function _xmlToArr($xml) {
        $res = @simplexml_load_string ( $xml,NULL, LIBXML_NOCDATA );
        $res = json_decode ( json_encode ( $res), true );
        return $res;
    }
	
	/**
	* 验证手机号是否正确
	*/
	function isMobile($mobile) {
		if (!is_numeric($mobile)) {
			return false;
		}
		return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
	}
	
	/**
     * 生成订单号
     */
    function orderNo()
    {
        return date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }
	
	/**
     * 构建微信支付
     */
    function wxPay($order_no, $open_id, $pay_price, $type='')
    {
        $wxConfig = WxappModel::getWxappCache();
        $WxPay = new WxPay($wxConfig);
        return $WxPay->unifiedorder($order_no, $open_id, $pay_price, $type);
    }

	/**
	 * 打印调试函数
	 */
	function pre($content, $is_die = true)
	{
		header('Content-type: text/html; charset=utf-8');
		echo '<pre>' . print_r($content, true);
		$is_die && die();
	}

	/**
	 * 驼峰命名转下划线命名
	 */
	function toUnderScore($str)
	{
		$dstr = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
			return '_' . strtolower($matchs[0]);
		}, $str);
		return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
	}

	/**
	 * 生成密码hash值
	 */
	function hema_hash($password)
	{
		return md5(md5($password) . 'hema_salt_0829_SmTRx');
	}

	/**
	 * 获取当前域名及根路径
	 */
	function base_url()
	{
		$request = Request::instance();
		$subDir = str_replace('\\', '/', dirname($request->server('PHP_SELF')));
		return $request->scheme() . '://' . $request->host() . $subDir . ($subDir === '/' ? '' : '/');
	}

	/**
	 * 写入日志
	 */
	function write_log($values, $dir)
	{
		if (is_array($values))
			$values = print_r($values, true);
		// 日志内容
		$content = '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $values . PHP_EOL . PHP_EOL;
		try {
			// 文件路径
			$filePath = $dir . '/logs/';
			// 路径不存在则创建
			!is_dir($filePath) && mkdir($filePath, 0755, true);
			// 写入文件
			return file_put_contents($filePath . date('Ymd') . '.log', $content, FILE_APPEND);
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * GET方式请求
	 * curl请求指定url
	 */
	function curl($url, $data = [])
	{
		// 处理get数据
		if (!empty($data)) {
			$url = $url . '?' . http_build_query($data);
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	/**
	 * curl请求指定url(POST请求)
	 * $url请求的URL
	 * $data 请求传递的数据
	 */
	function http_request($url,$data = null,$headers=array())
	{
		$curl = curl_init();
		if( count($headers) >= 1 ){
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		}
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

	if (!function_exists('array_column')) {
		/**
		 * array_column 兼容低版本php
		 * (PHP < 5.5.0)
		 */
		function array_column($array, $columnKey, $indexKey = null)
		{
			$result = array();
			foreach ($array as $subArray) {
				if (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
					$result[] = is_object($subArray) ? $subArray->$columnKey : $subArray[$columnKey];
				} elseif (array_key_exists($indexKey, $subArray)) {
					if (is_null($columnKey)) {
						$index = is_object($subArray) ? $subArray->$indexKey : $subArray[$indexKey];
						$result[$index] = $subArray;
					} elseif (array_key_exists($columnKey, $subArray)) {
						$index = is_object($subArray) ? $subArray->$indexKey : $subArray[$indexKey];
						$result[$index] = is_object($subArray) ? $subArray->$columnKey : $subArray[$columnKey];
					}
				}
			}
			return $result;
		}
	}

	/**
	 * 多维数组合并
	 */
	function array_merge_multiple($array1, $array2)
	{
		$merge = $array1 + $array2;
		$data = [];
		foreach ($merge as $key => $val) {
			if (
				isset($array1[$key])
				&& is_array($array1[$key])
				&& isset($array2[$key])
				&& is_array($array2[$key])
			) {
				$data[$key] = array_merge_multiple($array1[$key], $array2[$key]);
			} else {
				$data[$key] = isset($array2[$key]) ? $array2[$key] : $array1[$key];
			}
		}
		return $data;
	}

	/**
	 * 获取全局唯一标识符
	 */
	function getGuidV4($trim = true)
	{
		// Windows
		if (function_exists('com_create_guid') === true) {
			$charid = com_create_guid();
			return $trim == true ? trim($charid, '{}') : $charid;
		}
		// OSX/Linux
		if (function_exists('openssl_random_pseudo_bytes') === true) {
			$data = openssl_random_pseudo_bytes(16);
			$data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
			$data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10
			return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
		}
		// Fallback (PHP 4.2+)
		mt_srand((double)microtime() * 10000);
		$charid = strtolower(md5(uniqid(rand(), true)));
		$hyphen = chr(45);                  // "-"
		$lbrace = $trim ? "" : chr(123);    // "{"
		$rbrace = $trim ? "" : chr(125);    // "}"
		$guidv4 = $lbrace .
			substr($charid, 0, 8) . $hyphen .
			substr($charid, 8, 4) . $hyphen .
			substr($charid, 12, 4) . $hyphen .
			substr($charid, 16, 4) . $hyphen .
			substr($charid, 20, 12) .
			$rbrace;
		return $guidv4;
	}
