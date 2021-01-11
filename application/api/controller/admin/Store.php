<?php

namespace app\api\controller\admin;

use app\api\controller\Controller;
use app\api\model\User as UserModel;
use app\api\model\Comment as CommentModel;
use app\api\model\Order as OrderModel;

/**
 * 商户管理中心
 */
class Store extends Controller
{
    /**
     * 商户数据统计
     */
    public function getCount()
    {
		$count = array();
		$count['order'] = OrderModel::getAllCount();	//订单和收入统计
		$count['comment'] = CommentModel::getCount();	//评价
		$count['user'] = UserModel::getCount();	//用户统计
		
        return $this->renderSuccess(compact('count'));  
    }
}
