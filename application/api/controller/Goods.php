<?php
namespace app\api\controller;
use app\api\model\Goods as GoodsModel;
use app\api\model\Cart as CartModel;
use app\api\model\Category as CategoryModel;
use app\api\model\Virtuals as VirtualsModel;

/**
 * 商品控制器
 */
class Goods extends Controller
{
    /**
     * 商品列表
     */
    public function lists($category_id=null, $search=null, $sortType=null, $sortPrice=null)
    {
		$model = new GoodsModel;
		if($this->app_type==20){
			$list = $model->getList(10, $category_id, $search, $sortType, $sortPrice);
			// 隐藏api属性
			!$list->isEmpty() && $list->hidden(['category', 'content']);
			return $this->renderSuccess(compact('list'));
		}
		$categorylist = array_values(CategoryModel::getCacheTree());
		$goodslist = $model->getGoodsList($categorylist);
		return $this->renderSuccess(compact('categorylist','goodslist'));
    }
	
    /**
     * 获取商品详情
     */
    public function detail($goods_id)
    {
        // 商品详情
        $detail = GoodsModel::detail($goods_id);
        if (!$detail || $detail['goods_status']['value'] != 10) {
            return $this->renderError('很抱歉，商品信息不存在或已下架');
        }
        // 规格信息
        $specData = $detail['spec_type'] == 20 ? $detail->getManySpecData($detail['spec_rel'], $detail['spec']) : null;
//        $user = $this->getUser();
//        // 购物车商品总数量
//        $cart_total_num = (new CartModel($user['user_id']))->getTotalNum();
		if($this->app_type==20){
			// 虚拟用户
			$model = new VirtualsModel();
			$virtuals = $model->getList();
			return $this->renderSuccess(compact('detail', /*'cart_total_num',*/  'specData', 'virtuals'));			
		}
        return $this->renderSuccess(compact('detail', /*'cart_total_num',*/ 'specData'));
    }
	
	/**
     * 商品上架/下架
     */
	public function upDown($goods_id, $goods_status){
		if($detail = GoodsModel::detail($goods_id)){
			$detail['goods_status'] = $goods_status;
			$detail->save();
			return $this->renderSuccess([],'操作成功');
		}
		return $this->renderError('商品信息不存在');
	}

}
