<?php
namespace app\store\controller;
use app\store\model\Order as OrderModel;
use app\store\model\Comment as CommentModel;
use app\store\model\Goods as GoodsModel;
use app\store\model\User as UserModel;
/**
 * 商户后台首页
 */
class Index extends Controller
{
    public function index()
    {
		if($this->store['wxapp']['app_type']['value']==1){
			//公众号页面
			return $this->fetch('wechat');
		}else{
			 //商城统计页面
			$count = array();
			$count['order'] = OrderModel::getAllCount();	//订单和收入统计
			$count['comment'] = CommentModel::getCount();	//评价
			$count['user'] = UserModel::getCount();	//用户统计
			$count['goods'] = GoodsModel::getCount();	//用户统计
			
			return $this->fetch('index', compact('count'));
		}
    }

    public function demolist()
    {
        return $this->fetch('demo-list');
    }


}
