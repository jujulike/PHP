<?php
namespace app\store\controller\material;
use app\store\controller\Controller;
use app\store\model\Material as MaterialModel;
use app\store\model\MaterialText as MaterialTextModel;
/**
 * 图文素材
 */
class Text extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new MaterialModel;
        $list = $model->getList(40);
        return $this->fetch('index', compact('list'));
    }
	
	/**
     * 添加
     */
    public function add()
    {
        $model = new MaterialModel;
        if (!$this->request->isAjax()) {
			$material = $model->getDefault();
            return $this->fetch('add', compact('material'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
		if($model->addText($this->postData('data'))){
			return $this->renderSuccess('添加成功', url('material.text/index'));
		}
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }
	
	/**
     * 编辑
     */
    public function edit($material_id,$text_no)
    {
        $model = MaterialModel::get($material_id);
		$text = new MaterialTextModel;
		$material = $text->getList($text_no,$model['name']);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('material'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->editText($this->postData('data'),$text)) {
            return $this->renderSuccess('更新成功', url('material.text/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
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
}
