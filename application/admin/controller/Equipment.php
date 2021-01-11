<?php
namespace app\admin\controller;
use app\admin\model\Equipment as EquipmentModel;
use app\admin\model\Config as ConfigModel;

/**
 * 打印设备授权控制器
 */
class Equipment extends Controller
{
    /**
     * 设备列表
     */
    public function index()
    {
        $model = new EquipmentModel;
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
		if($err = is_power('admin')){
			return $this->renderError($err);
		}	
		$equipment = $this->postData('equipment');
        $model = new EquipmentModel;
		if(strlen($equipment['uuid'])<16){
			return $this->renderError('设备编号不足16位');
		}
		if($model::detail(['uuid' => $equipment['uuid']])){
			return $this->renderError('该设备已存在');
		}
        if ($model->add($equipment)) {
            return $this->renderSuccess('添加成功', url('equipment/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($equipment_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = EquipmentModel::get($equipment_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     */
    public function edit($equipment_id)
    {
        // 详情
        $model = EquipmentModel::detail($equipment_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
		$equipment = $this->postData('equipment');
		if(strlen($equipment['uuid'])<16){
			return $this->renderError('设备编号不足16位');
		}
		if($equipment['uuid']==$model['uuid']){
			return $this->renderError('该设备已存在');
		}
		if(EquipmentModel::detail(['uuid' => $equipment['uuid']])){
			return $this->renderError('该设备已存在');
		}	
        if ($model->edit($equipment)) {
            return $this->renderSuccess('更新成功', url('equipment/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
	/**
     * 云端设置
     */
    public function setting()
    {
        $model = ConfigModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power('admin')){
				return $this->renderError($err);
			}
            if ($model->edit($this->postData('config'))){
				return $this->renderSuccess('更新成功');
			}
            return $this->renderError('更新失败');
        }
        return $this->fetch('setting', compact('model'));
    }

}
