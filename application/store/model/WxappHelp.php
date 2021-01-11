<?php

namespace app\store\model;

use app\common\model\WxappHelp as WxappHelpModel;

/**
 * 小程序帮助中心
 */
class WxappHelp extends WxappHelpModel
{
    /**
     * 新增记录
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }

    /**
     * 更新记录
     */
    public function edit($data)
    {
        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 删除记录
     */
    public function remove() {
        return $this->delete();
    }

}
