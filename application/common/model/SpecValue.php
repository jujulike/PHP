<?php

namespace app\common\model;

/**
 * 规格/属性(值)模型
 */
class SpecValue extends BaseModel
{
    protected $name = 'spec_value';
    protected $updateTime = false;

    /**
     * 关联规格组表
     */
    public function spec()
    {
        return $this->belongsTo('Spec');
    }

}
