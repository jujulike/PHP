<?php
namespace app\store\controller\data;
use app\store\controller\Controller;
use app\store\model\Category;
use app\store\model\Goods as GoodsModel;

/**
 * 商品管理控制器
 */
class Goods extends Controller
{ 
	//商品列表
	public function lists($status=10,$category_id=0,$search=''){
		$model = new GoodsModel;
		// 商品分类
        $catgory = Category::getCacheTree();
        $list = $model->getList($status, $category_id, $search);
		for($n=0;$n<sizeof($list);$n++){
			$params = [
				"goods_id" => $list[$n]['goods_id'],
				"goods_name" => $list[$n]['goods_name'],
				"selling_point" => $list[$n]['selling_point'],
				"image" => "./uploads/".$list[$n]['goods_id'].".jpg",
				"goods_image" => "./uploads/".$list[$n]['goods_id'].".jpg",
				"goods_price" => $list[$n]['spec'][0]['goods_price'],
				"line_price" => $list[$n]['spec'][0]['line_price'],
				"goods_sales" => $list[$n]['goods_sales']
			];
			$list[$n]['params'] = json_encode($params);
		}
		$this->view->engine->layout(false);
		return $this->fetch('lists', compact('list','catgory'));
	}
	
}
