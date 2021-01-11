<?php

namespace app\store\controller\food;

use app\store\controller\Controller;
use app\store\model\Table as TableModel;

/**
 * 餐桌管理控制器
 */
class Table extends Controller
{
    /**
     * 餐桌列表
     */
    public function index()
    {
        $model = new TableModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new TableModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('table'))) {
            return $this->renderSuccess('添加成功', url('food.table/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 更新
     */
    public function edit($table_id)
    {
        // 详情
        $model = TableModel::detail($table_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('table'))) {
            return $this->renderSuccess('更新成功', url('food.table/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($table_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 详情
        $model = TableModel::detail($table_id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
