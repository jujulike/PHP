<?php

namespace app\api\model;

use app\common\model\UserGrade as UserGradeModel;

/**
 * 用户等级模型
 */
class UserGrade extends UserGradeModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'wxapp_id',
        'create_time',
    ];

}
