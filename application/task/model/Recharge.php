<?php
namespace app\task\model;
use app\common\model\Recharge as RechargeModel;
use app\common\model\User as UserModel;
use think\Db;

/**
 * 用户充值模型
 */
class Recharge extends RechargeModel
{
    /**
     * 待支付订单详情
     */
    public function payDetail($order_no)
    {
        return self::get(['order_no' => $order_no]);
    }

    /**
     * 更新付款状态
     */
    public function updatePayStatus($transaction_id, $order)
    {
		// 开启事务
        Db::startTrans();
		
			// 更新订单状态
			$this->save([
				'pay_status' => 20,
				'pay_time' => time(),
				'transaction_id' => $transaction_id,
			]);
			
		$user = UserModel::detail(['user_id' => $order['user_id']]);//获取用户详情
		$wallet = $order['money']+$order['gift_money']; //充值金额+赠送金额
		$user->wallet = ['inc', $wallet];//增加充值金额
		$user->save();
		Db::commit();
        return true;
    }

}
