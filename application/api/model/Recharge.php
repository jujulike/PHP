<?php
namespace app\api\model;
use app\common\model\Recharge as RechargeModel;
use app\common\model\RechargePlan as RechargePlanModel;

/**
 * 用户充值模型
 */
class Recharge extends RechargeModel
{
	/**
     * 新增订单
     */
    public function add($user_id,$order_no,$money,$recharge_plan_id,$formId)
    {
		$gift_money = 0;//赠送金额
		//如果是套餐充值，获取套餐赠送金额
		if($recharge_plan_id>0){
			if(!$plan = RechargePlanModel::detail($recharge_plan_id)){
				$this->error = '套餐错误';
				return false;	
			}
			if($money>=$plan['money']){
				$gift_money = $plan['gift_money'];
			}
		}
		return $this->save([
			'order_no' => $order_no;//订单号
			'user_id' => $user_id;//用户id
			'money' => $money;//充值金额
			'recharge_plan_id' => $recharge_plan_id;//套餐id
			'gift_money' => $gift_money
			'wxapp_id' => self::$wxapp_id;					
		]);
    }
    

}
