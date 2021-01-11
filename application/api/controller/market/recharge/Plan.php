<?php

namespace app\api\controller\market\recharge;

use app\api\controller\Controller;
use app\api\model\RechargePlan as RechargePlanModel;

/**
 * 用户充值套餐控制器
 */
class Plan extends Controller
{
    /**
     * 列表
     */
    public function lists()
    {
        $model = new RechargePlanModel;
        $plan = $model->lists();
        return $this->renderSuccess(compact('plan'));
    }

}
