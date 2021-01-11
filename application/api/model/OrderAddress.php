<?php

namespace app\api\model;

use app\common\model\OrderAddress as OrderAddressModel;

/**
 * 订单收货地址模型
 */
class OrderAddress extends OrderAddressModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'create_time',
    ];

}
