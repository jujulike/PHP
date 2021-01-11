<?php
namespace app\api\model;
use app\common\model\Virtuals as VirtualsModel;

/**
 * 虚拟用户模型
 */
class Virtuals extends VirtualsModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'create_time',
        'update_time'
    ];
}
