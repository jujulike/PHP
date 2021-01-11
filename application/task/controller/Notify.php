<?php

namespace app\task\controller;

use app\task\model\Order as OrderModel;
use app\common\library\wechat\WxPay;
use app\task\model\Recharge as RechargeModel;

/**
 * 支付成功异步通知接口
 */
class Notify
{
    /**
     * 支付成功异步通知
     */
    public function order()
    {
        $WxPay = new WxPay([]);
        $WxPay->notify(new OrderModel);
    }
	
	/**
     * 支付成功异步通知 - 充值
     */
    public function recharge()
    {
        $WxPay = new WxPay([]);
        $WxPay->notify(new RechargeModel);
    }

}
