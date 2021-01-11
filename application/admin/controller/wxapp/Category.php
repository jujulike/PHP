<?php

namespace app\admin\controller\wxapp;

use app\admin\controller\Controller;
use app\admin\model\CategoryServe as CategoryServeModel;

/**
 * 服务类目
 */
class Category extends Controller
{
    /**
     * 类目列表
     */
    public function index()
    {
        $model = new CategoryServeModel;
        $list = $model->getCacheTree();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($category_serve_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = CategoryServeModel::get($category_serve_id);
        if (!$model->remove($category_serve_id)) {
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
        $model = new CategoryServeModel;
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            return $this->fetch('add', compact('list'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('category'))) {
            return $this->renderSuccess('添加成功', url('shop.category/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑
     */
    public function edit($category_serve_id)
    {
        // 分类详情
        $model = CategoryServeModel::get($category_serve_id);
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            return $this->fetch('edit', compact('model', 'list'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('shop.category/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
