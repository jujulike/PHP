<?php
namespace app\admin\controller\role;
use app\admin\controller\Controller;
use app\admin\model\RoleCategory as RoleCategoryModel;
use app\admin\model\StoreUser as StoreUserModel;
use app\admin\model\Role as RoleModel;

/**
 * 角色控制器
 */
class User extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new RoleModel;
		if($this->admin['user']['role']==0){
			$store = StoreUserModel::detail($this->admin['user']['user_name']);
			$list = $model->getList($this->admin['user']['store_user_id']);
			return $this->fetch('index', compact('list','store'));
		}else{
			$list = $model->getList($this->admin['user']['store_user_id'],$this->admin['user']['role']);
			return $this->fetch('index', compact('list'));
		}
    }

    /**
     * 删除
     */
    public function delete($role_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = RoleModel::get($role_id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new RoleModel;
        if (!$this->request->isAjax()) {
			$category = RoleCategoryModel::getCacheTree($this->admin['user']['store_user_id']);
            return $this->fetch('add', compact('category'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('role'),$this->admin['user']['store_user_id'])) {
            return $this->renderSuccess('添加成功', url('role.user/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑
     */
    public function edit($role_id)
    {
        $model = RoleModel::get($role_id);
        if (!$this->request->isAjax()) {
            $category = RoleCategoryModel::getCacheTree($this->admin['user']['store_user_id']);
            return $this->fetch('edit', compact('model', 'category'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('role'))) {
            return $this->renderSuccess('更新成功', url('role.user/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
	/**
     * 更新当前管理员信息
     */
    public function renew()
    {
        $model = StoreUserModel::detail($this->admin['user']['user_name']);
        if ($this->request->isAjax()) {
			if($err = is_power('admin')){
				return $this->renderError($err);
			}
            if ($model->renew($this->postData('store'))) {
                return $this->renderSuccess('更新成功', url('role.user/index'));
            }
            return $this->renderError($model->getError() ?: '更新失败');
        }
        return $this->fetch('renew', compact('model'));
    }

}
