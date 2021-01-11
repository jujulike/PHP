<?php
namespace app\store\controller\user;
use app\store\controller\Controller;
use app\store\model\Recharge as RechargeModel;

/**
 * 用户充值记录
 */
class Recharge extends Controller
{
    /**
     * 用户充值列表
     */
    public function index($pay_status='',$recharge_plan_id='',$search='',$start_time='',$end_time='')
    {
        $model = new RechargeModel;
        $list = $model->getList($pay_status,$recharge_plan_id,$search,$start_time,$end_time);
        return $this->fetch('index', compact('list'));
    }
}
