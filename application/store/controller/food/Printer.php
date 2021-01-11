<?php

namespace app\store\controller\food;

use app\store\controller\Controller;
use app\store\model\Printer as PrinterModel;
use app\store\model\Equipment as EquipmentModel;

/**
 * 云打印机控制器
 */
class Printer extends Controller
{
    /**
     * 获取云打印机列表
     */
    public function index()
    {
        $model = new PrinterModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加云打印机
     */
    public function add()
    {
        $model = new PrinterModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
		$printer = $this->postData('printer');
		if(strlen($printer['uuid'])<16){
			return $this->renderError('设备编号不足16位');
		}
		//查询设备是否获得授权
		if(!EquipmentModel::detail(['uuid' => $printer['uuid']])){
				return $this->renderError('设备未被授权');
		}
		//查询该位置是否已经添加过了
		if($model::detail(['place' => $printer['place']])){
			return $this->renderError('该位置只允许绑定一台设备');
		}
		//查询设备是否已经添加
		if($model::detail(['uuid' => $printer['uuid']])){
			return $this->renderError('该设备已被添加，不可重复');
		}
        // 新增记录
        if ($model->add($printer)) {
            return $this->renderSuccess('添加成功', url('food.printer/index'));
        }
		$error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 更新云打印机
     */
    public function edit($printer_id)
    {
        $model = PrinterModel::detail(['printer_id' => $printer_id]);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
		$printer = $this->postData('printer');
		if(strlen($printer['uuid'])<16){
			return $this->renderError('设备编号不足16位');
		}
		//查询设备是否获得授权
		if(!EquipmentModel::detail(['uuid' => $printer['uuid']])){
				return $this->renderError('设备未被授权');
		}
		//查询设备是否已经添加
		if(PrinterModel::detail(['uuid' => $printer['uuid']])){
			return $this->renderError('该设备已被添加，不可重复');
		}
        // 更新记录
        if ($model->edit($printer)) {
            return $this->renderSuccess('更新成功', url('food.printer/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 删除云打印机
     */
    public function delete($printer_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = PrinterModel::detail(['printer_id' => $printer_id]);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
