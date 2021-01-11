<?php
namespace app\store\controller\material;
use app\store\controller\Controller;
use app\store\model\Material as MaterialModel;

/**
 * 图片素材
 */
class Image extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new MaterialModel;
        $list = $model->getList(10);
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($material_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}		
        $model = MaterialModel::get($material_id);
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
        $model = new MaterialModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
		if($model->add([],$this->postData('material'))){
			return $this->renderSuccess('添加成功', url('material.image/index'));
		}
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑
     */
    public function edit($material_id)
    {
        $model = MaterialModel::get($material_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('material'))) {
            return $this->renderSuccess('更新成功', url('material.image/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
