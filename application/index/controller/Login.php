<?php

namespace app\index\controller;

use app\index\model\StoreUser;
use think\Session;

/**
 * 用户登录
 */
class Login extends Controller
{
    /**
     * 用户登录 - 首页
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            $model = new StoreUser;
            if ($model->login($this->postData('User'))) {
                return $this->renderSuccess('登录成功', 'user.php');
            }
            return $this->renderError($model->getError() ?: '登录失败');
        }
		// 验证登录状态
        if (isset($this->store) AND (int)$this->store['is_login'] === 1) {
			$this->redirect('/user.php');
        }
        $set['title'] = '用户登录 - 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'login';
		$this->assign('set', $set);
        return $this->fetch('index');
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear('hema_store');
        $this->redirect('/index.php');
    }

}
