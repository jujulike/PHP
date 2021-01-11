<?php

namespace app\api\model;

use app\common\model\GoodsImage as GoodsImageModel;

/**
 * 商品图片模型
 */
class GoodsImage extends GoodsImageModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'create_time',
    ];

}
