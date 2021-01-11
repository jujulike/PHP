<?php
namespace app\admin\controller;
use app\admin\model\StoreUser as StoreUserModel;

/**
 * 商户用户管理
 */
class User extends Controller
{
    /**
     * 商户用户列表
     */
    public function index()
    {
        $model = new StoreUserModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
	
	/**
     * 重置商户密码
     */
    public function resetPwd($user_name)
    {
        $model = StoreUserModel::detail($user_name);
        if ($model->resetPwd($model)) {
			if($err = is_power('admin')){
				$this->error($err, 'user/index');
				return false;
			}
			$this->error('重置成功', 'user/index');
			return false;
        }
        $this->error('重置失败', 'user/index');
    }
	
	/**
     * 管理员执行商户登录
     */
    public function storeLogin($user_name)
    {
        $model = StoreUserModel::detail($user_name);
        if ($model->storeLogin($model)) {
            $this->redirect('/user.php');
        }
        $this->error('登录错误', '/login.php');
    }

}
