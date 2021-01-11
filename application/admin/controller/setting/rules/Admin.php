<?php
namespace app\admin\controller\setting\rules;
use app\admin\controller\Controller;
use app\admin\model\Rules as RulesModel;

/**
 * 角色类目 - 管理端
 */
class Admin extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new RulesModel;
        $list = $model->getCacheTree('admin');
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = RulesModel::get($id);
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
        $model = new RulesModel;
        if (!$this->request->isAjax()) {
			$list = $model->getCacheTree('admin');
            return $this->fetch('add', compact('list'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('rules'))) {
            return $this->renderSuccess('添加成功', url('setting.rules.admin/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑
     */
    public function edit($id)
    {
        // 分类详情
        $model = RulesModel::get($id);
        if (!$this->request->isAjax()) {
            $list = $model->getCacheTree('admin');
            return $this->fetch('edit', compact('model', 'list'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('rules'))) {
            return $this->renderSuccess('更新成功', url('setting.rules.admin/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
