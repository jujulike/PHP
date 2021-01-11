<?php
namespace app\api\model;
use app\common\model\User as UserModel;
use app\common\model\Config as ConfigModel;
use app\common\model\UserGrade as UserGradeModel;
use app\common\model\Wxapp;
use app\common\library\wechat\WxUser;
use app\common\library\wechat\WxBizDataCrypt;
use app\common\exception\BaseException;
use think\Cache;
use think\Request;

/**
 * 用户模型类
 */
class User extends UserModel
{
    private $token;

    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'create_time',
        'update_time'
    ];

    /**
     * 获取用户信息
     */
    public static function getUser($token)
    {
		$model = new UserGradeModel;
		$grade = $model->getList();//获取等级列表
		$model = new UserModel;
		$user = $model::detail(['open_id' => Cache::get($token)['openid']]);//获取用户详情
		if(empty($user)){ //用户不存在返回错误
			return false;
		}
		if($grade){
			for ($n = 0; $n < sizeof($grade); $n++) { 
				if($user['score'] >= $grade[$n]['score']){
					$user['user_grade_id'] = $grade[$n]['user_grade_id'];
					break;
				}	
			}
		}
		$user->allowField(true)->save();
        return $user;
    }

    /**
     * 用户登录
     */
    public function login($post)
    {
        // 微信登录 获取session_key，openid,unionid
        $session = $this->wxlogin($post['code']);
        // 自动注册用户
        $userInfo = json_decode(htmlspecialchars_decode($post['user_info']), true);
        $user_id = $this->register($session['openid'], $userInfo);
        // 生成token (session3rd)
        $this->token = $this->token($session['openid']);
        // 记录缓存, 7天
        Cache::set($this->token, $session, 86400 * 7);
        return $user_id;
    }
	
	/**
     * 自动登录登录
     */
    public function autoLogin($post)
    {
        // 微信登录 获取session_key，openid,unionid
        $session = $this->wxlogin($post['code']);
        if (!$user = self::get(['open_id' => $session['openid']])) {
			//用户不存在才执行
            $user = $this;
            $userInfo['open_id'] = $session['openid'];
            $userInfo['wxapp_id'] = self::$wxapp_id;
			
			$userInfo['recommender'] = $post['recommender'];
			/* 介绍人
			if($post['recommender']==0){
				$userInfo['recommender'] = 10001;
			}
			*/
        }
		$userInfo['login_count'] = ['inc',1];
        if (!$user->allowField(true)->save($userInfo)) {
            throw new BaseException(['msg' => '用户注册失败']);
        }
        return $user['user_id'];// 自动注册用户
    }

    /**
     * 获取token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * 微信登录
     */
    private function wxlogin($code)
    {
        $wxapp = Wxapp::detail();	// 获取当前小程序信息
		$config = ConfigModel::detail();	//获取第三方配置信息
        if (empty($wxapp['app_id'])) {
            throw new BaseException(['msg' => '您还未绑定您的微信小程序']);
        }
        // 微信登录 (获取session_key)
        $WxUser = new WxUser($wxapp['app_id'], $config['app_id'], $config['component_access_token']);
        if (!$session = $WxUser->sessionKey($code)) {
            throw new BaseException(['msg' => $WxUser->getError()]);
        }
        return $session;
    }

    /**
     * 生成用户认证的token
     */
    private function token($openid)
    {
        $wxapp_id = self::$wxapp_id;
        // 生成一个不会重复的随机字符串
        $guid = \getGuidV4();
        // 当前时间戳 (精确到毫秒)
        $timeStamp = microtime(true);
        // 自定义一个盐
        $salt = 'token_salt';
        return md5("{$wxapp_id}_{$timeStamp}_{$openid}_{$guid}_{$salt}");
    }

    /**
     * 自动注册用户
     */
    private function register($open_id, $userInfo)
    {
        if (!$user = self::get(['open_id' => $open_id])) {
            throw new BaseException(['msg' => '用户不存在']);
        }
		if (!$user->allowField(true)->save($userInfo)) {
			throw new BaseException(['msg' => '用户注册失败']);
		}
		return $user['user_id'];
    }
	
	/**
     * 获取用户手机号
     */
    public function getPhoneNumber($post,$userInfo)
    {
		 // 获取当前小程序信息
        $wxapp = Wxapp::detail();
        $appid = $wxapp['app_id'];
		$sessionKey = Cache::get($post['token'])['session_key'];
		$encryptedData= $post['encryptedData'];
		$iv = $post['iv'];
		$pc = new WxBizDataCrypt($appid, $sessionKey);
		$errCode = $pc->decryptData($encryptedData, $iv, $data );
		$data = json_decode($data,true);
		if ($errCode == 0) {
			//保存手机号
			$user = UserModel::detail(['open_id' => Cache::get($post['token'])['openid']]);//获取用户详情
			$user['mobile'] = $data['phoneNumber'];
			$user->save();
			return $user;
		}
		return false;
    }

}
