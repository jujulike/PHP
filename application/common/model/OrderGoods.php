<?php

namespace app\common\model;

/**
 * 订单商品模型
 */
class OrderGoods extends BaseModel
{
    protected $name = 'order_goods';
    protected $updateTime = false;

    /**
     * 订单商品列表
     */
    public function image()
    {
        return $this->belongsTo('UploadFile', 'image_id', 'file_id');
    }

    /**
     * 关联商品表
     */
    public function goods()
    {
        return $this->belongsTo('Goods');
    }

    /**
     * 关联商品规格表
     */
    public function spec()
    {
        return $this->belongsTo('GoodsSpec', 'spec_sku_id', 'spec_sku_id');
    }

}
