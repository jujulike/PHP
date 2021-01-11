<?php

namespace app\api\controller;

use app\api\model\Table as TableModel;

/**
 * 桌号
 */
class Table extends Controller
{
    /**
     * 桌号详情
     */
    public function detail($table_id)
    {
		if ($table = TableModel::detail($table_id)) {
            return $this->renderSuccess(compact('table'));
        }
        return $this->renderError('包间/桌号不存在');
    }
	
	/**
     * 桌号列表
     */
    public function lists()
    {
		$model = new TableModel;
        $list = $model->getList();
        return $this->renderSuccess(compact('list'));
    }

}
