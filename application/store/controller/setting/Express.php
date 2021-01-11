<?php

namespace app\store\controller\setting;

use app\store\controller\Controller;
use app\store\model\Express as ExpressModel;

/**
 * 物流公司管理控制器
 */
class Express extends Controller
{
    /**
     * 物流公司列表
     */
    public function index()
    {
        $model = new ExpressModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        if (!$this->request->isAjax()) {

            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new ExpressModel;
        if ($model->add($this->postData('express'))) {
            return $this->renderSuccess('添加成功', url('setting.express/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($express_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = ExpressModel::get($express_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     */
    public function edit($express_id)
    {
        $model = ExpressModel::detail($express_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('express'))) {
            return $this->renderSuccess('更新成功', url('setting.express/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
}
