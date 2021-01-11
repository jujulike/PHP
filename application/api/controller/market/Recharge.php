<?php
namespace app\api\controller\market;
use app\api\controller\Controller;
use app\api\model\Recharge as RechargeModel;

/**
 * 用户充值管理
 */
class Recharge extends Controller
{
	private $user;

    /**
     * 构造方法
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->user = $this->getUser();   // 用户信息
    } 
	
    /**
     * 充值支付
     */
    public function pay($money,$recharge_plan_id=0,$formId=0)
    {
		// 创建订单
		$model = new RechargeModel;
		$order_no = orderNo();//订单号
		if($model->add($this->user['user_id'],$order_no,$money,$recharge_plan_id,$formId)){
			// 发起微信支付
			$wxParams = wxPay($order_no, $this->user['open_id'], $money, 'recharge');
			return $this->renderSuccess($wxParams);
		}
		$error = $model->getError() ?: '订单创建失败';
        return $this->renderError($error);
    }
}
