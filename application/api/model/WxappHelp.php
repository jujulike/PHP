<?php

namespace app\api\model;

use app\common\model\WxappHelp as WxappHelpModel;

/**
 * 小程序帮助中心
 */
class WxappHelp extends WxappHelpModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
        'create_time',
        'update_time',
    ];
}
