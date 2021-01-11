<?php

namespace app\api\model;

use app\common\model\OrderGoods as OrderGoodsModel;

/**
 * 订单商品模型
 */
class OrderGoods extends OrderGoodsModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'content',
        'wxapp_id',
        'create_time',
    ];

}
