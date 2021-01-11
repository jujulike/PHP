<?php
namespace app\admin\controller;
use app\admin\model\Role as RoleModel;
use think\Session;

/**
 * 管理员认证
 */
class Passport extends Controller
{
    /**
     * 后台登录
     */
    public function login()
    {
		 if (!$this->request->isAjax()) {
			// 验证登录状态
			if (isset($this->admin) AND (int)$this->admin['is_login'] === 1) {
				$this->redirect('index/index');
			}
            $this->view->engine->layout(false);
			return $this->fetch('login');
        }
		$model = new RoleModel;
        if ($model->login($this->postData('User'))) {
            return $this->renderSuccess('登录成功', url('index/index'));
        }
        $error = $model->getError() ?: '登录失败';
        return $this->renderError($error);
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear('hema_admin');
        $this->redirect('passport/login');
    }

}
