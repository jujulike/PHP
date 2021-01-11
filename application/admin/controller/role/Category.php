<?php
namespace app\admin\controller\role;
use app\admin\controller\Controller;
use app\admin\model\RoleCategory as RoleCategoryModel;
use app\admin\model\Rules as RulesModel;

/**
 * 角色分类
 */
class Category extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new RoleCategoryModel;
        $list = $model->getCacheTree($this->admin['user']['store_user_id']);
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($role_category_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = RoleCategoryModel::get($role_category_id);
        if (!$model->remove($role_category_id)) {
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
        $model = new RoleCategoryModel;
        if (!$this->request->isAjax()) {
			//获取角色类目
			$tree = json_encode(RulesModel::getCacheAll('admin'));
			//获取角色列表
            $list = $model->getCacheTree($this->admin['user']['store_user_id']);
            return $this->fetch('add', compact('list','tree'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
		//获取角色类目
		$tree = RulesModel::getCacheTree('admin');
        // 新增记录
        if ($model->add($this->postData('category'),$this->admin['user']['store_user_id'],$tree)) {
            return $this->renderSuccess('添加成功', url('role.category/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑
     */
    public function edit($role_category_id)
    {
        $model = RoleCategoryModel::get($role_category_id);
        if (!$this->request->isAjax()) {
            //获取角色类目
			$tree = RulesModel::getCacheAll('admin');
			//获取角色列表
            $list = $model->getCacheTree($this->admin['user']['store_user_id']);
			for($n=0;$n<sizeof($tree);$n++){
				for($m=0;$m<sizeof($model['powers']);$m++){
					if($tree[$n]['id']==$model['powers'][$m]){
						$tree[$n]['state']['selected'] = true;
					}
				}
				
			}
			$tree = json_encode($tree);
            return $this->fetch('edit', compact('model', 'list','tree'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
		//获取角色类目
		$tree = RulesModel::getCacheTree('admin');
        // 更新记录
        if ($model->edit($this->postData('category'),$tree)) {
            return $this->renderSuccess('更新成功', url('role.category/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
