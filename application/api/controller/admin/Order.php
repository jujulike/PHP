<?php

namespace app\api\controller\admin;

use app\api\controller\Controller;
use app\api\model\Order as OrderModel;

/**
 * 商户订单管理
 */
class Order extends Controller
{
    /**
     * 商户订单列表
     */
    public function lists($dataType)
    {
        $model = new OrderModel;
        $list = $model->getStoreList($dataType);
        return $this->renderSuccess(compact('list'));
    }

    /**
     * 订单详情信息
     */
    public function detail($order_id)
    {
        $order = OrderModel::getStoreOrderDetail($order_id);
        return $this->renderSuccess(['order' => $order]);
    }

    /**
     * 上菜完毕
     */
    public function delivery($order_id)
    {
        $model = OrderModel::getStoreOrderDetail($order_id);
        if ($model->delivery()) {
            return $this->renderSuccess();
        }
        return $this->renderError($model->getError());
    }

}
