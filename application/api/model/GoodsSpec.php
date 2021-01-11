<?php

namespace app\api\model;

use app\common\model\GoodsSpec as GoodsSpecModel;

/**
 * 商品规格模型
 */
class GoodsSpec extends GoodsSpecModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'create_time',
        'update_time'
    ];

}
