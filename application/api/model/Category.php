<?php

namespace app\api\model;

use app\common\model\Category as CategoryModel;

/**
 * 商品分类模型
 */
class Category extends CategoryModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'update_time'
    ];

    public static function getList() {

    }

}
