<?php

namespace app\common\model;

/**
 * 商品规格关系模型
 */
class GoodsSpecRel extends BaseModel
{
    protected $name = 'goods_spec_rel';
    protected $updateTime = false;

    /**
     * 关联规格组
     */
    public function spec()
    {
        return $this->belongsTo('Spec');
    }

}
