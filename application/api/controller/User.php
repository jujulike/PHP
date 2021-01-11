<?php
namespace app\api\controller;
use app\api\model\User as UserModel;

/**
 * 用户管理
 */
class User extends Controller
{
    /**
     * 用户自动登录
     */
    public function login()
    {
        $model = new UserModel;
        $user_id = $model->login($this->request->post());
        $token = $model->getToken();
        return $this->renderSuccess(compact('user_id', 'token'));
    }
	
	/**
     * 用户自动登录
     */
    public function autoLogin()
    {
        $model = new UserModel;
        $user_id = $model->autoLogin($this->request->post());
        return $this->renderSuccess(compact('user_id'));
    }
	
	/**
     * 获取用户手机号
     */
    public function getPhoneNumber()
    {
        $userInfo = $this->getUser();
        $model = new UserModel;
		if ($user = $model->getPhoneNumber($this->request->post(),$userInfo)) {
            return $this->renderSuccess($user, '开通成功');
        }
		return $this->renderSuccess([],'手机号验证失败');
    }

}
