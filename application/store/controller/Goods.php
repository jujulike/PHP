<?php
namespace app\store\controller;

use app\store\model\Category;
use app\store\model\Delivery;
use app\store\model\Goods as GoodsModel;

/**
 * 商品管理控制器
 */
class Goods extends Controller
{
    /**
     * 商品列表(出售中)
     */
    public function index($status=0, $category_id=0, $search='')
    {
        $model = new GoodsModel;
		// 商品分类
        $catgory = Category::getCacheTree();
        $list = $model->getList($status, $category_id, $search, $sortType = 'all', $sortPrice = false);
        return $this->fetch('index', compact('list','catgory'));
    }

    /**
     * 添加商品
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
            // 商品分类
            $catgory = Category::getCacheTree();
			// 配送模板
            $delivery = Delivery::getAll();
            return $this->fetch('add', compact('catgory', 'delivery'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new GoodsModel;
        if ($model->add($this->postData('goods'))) {
            return $this->renderSuccess('添加成功', url('goods/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除商品
     */
    public function delete($goods_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = GoodsModel::get($goods_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 商品编辑
     */
    public function edit($goods_id)
    {
        // 商品详情
        $model = GoodsModel::detail($goods_id);
        if (!$this->request->isAjax()) {
            // 商品分类
            $catgory = Category::getCacheTree();
			// 配送模板
            $delivery = Delivery::getAll();
            // 多规格信息
            $specData = 'null';
            if ($model['spec_type'] == 20)
                $specData = json_encode($model->getManySpecData($model['spec_rel'], $model['spec']));
            return $this->fetch('edit', compact('model', 'catgory', 'delivery', 'specData'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('goods/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
	/**
     * 商品状态编辑
     */
    public function state($goods_id,$state)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 商品详情
        $model = GoodsModel::detail($goods_id);
        // 更新记录
        if ($model->state($state)) {
            return $this->renderSuccess('更新成功', url('goods/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
	/**
     * 一键生成产品缩略图 - 所有
     */
    public function thumbnail()
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new GoodsModel;
        if (!$model->thumbnail()) {
            $this->error('失败', 'goods/index');
            return false;
        }
        $this->error('成功', 'goods/index');
        return true;
    }
	
}
