<?php

namespace app\store\model;

use app\common\model\Order as OrderModel;
use think\Request;

/**
 * 订单管理
 */
class Order extends OrderModel
{
    /**
     * 订单列表
     */
    public function getList($filter)
    {
        return $this->with(['goods.image', 'user'])
            ->where($filter)
            ->order(['create_time' => 'desc'])->paginate(10, false, [
                'query' => Request::instance()->request()
            ]);
    }

    /**
     * 确认发货
     */
    public function delivery($data)
    {
        if ($this['pay_status']['value'] == 10
            || $this['delivery_status']['value'] == 20) {
            $this->error = '该订单不合法';
            return false;
        }
        return $this->save([
            'delivery_status' => 20,
            'delivery_time' => time(),
        ]);
    }

}
