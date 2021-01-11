<?php

namespace app\store\model;

use app\common\model\RechargePlan as RechargePlanModel;

/**
 * 用户充值套餐模型
 */
class RechargePlan extends RechargePlanModel
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
