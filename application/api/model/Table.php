<?php

namespace app\api\model;

use app\common\model\Table as TableModel;

/**
 * 桌号模型
 */
class Table extends TableModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'create_time',
        'update_time',
    ];
}
