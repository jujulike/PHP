<?php

namespace app\api\model;

use app\common\model\RechargePlan as RechargePlanModel;

/**
 * 用户充值套餐模型
 */
class RechargePlan extends RechargePlanModel
{
    /**
     * 获取列表
     */
    public function lists()
    {
		// 执行查询
        return $this->order(['recharge_plan_id'=> 'desc','sort' => 'asc'])->select();
    }

}
