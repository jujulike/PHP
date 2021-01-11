<?php
namespace app\api\controller\user;
use app\api\controller\Controller;
use app\api\model\Order as OrderModel;
use app\api\model\User as UserModel;
use app\api\model\Goods as GoodsModel;
use app\api\model\Setting as SettingModel;
use app\api\model\Printer as PrinterModel;
use think\Cache;

/**
 * 用户订单管理
 */
class Order extends Controller
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
     * 我的订单列表
     */
    public function lists($dataType)
    {
        $model = new OrderModel;
        $list = $model->getList($this->user['user_id'], $dataType);
        return $this->renderSuccess(compact('list'));
    }

    /**
     * 订单详情信息
     */
    public function detail($order_id)
    {
        $order = OrderModel::getUserOrderDetail($order_id, $this->user['user_id']);
        return $this->renderSuccess(['order' => $order]);
    }

    /**
     * 取消订单
     */
    public function cancel($order_id)
    {
        $model = OrderModel::getUserOrderDetail($order_id, $this->user['user_id']);
        if ($model->cancel()) {
            return $this->renderSuccess();
        }
        return $this->renderError($model->getError());
    }

    /**
     * 确认收货
     */
    public function receipt($order_id)
    {
        $model = OrderModel::getUserOrderDetail($order_id, $this->user['user_id']);
        if ($model->receipt()) {
            return $this->renderSuccess();
        }
        return $this->renderError($model->getError());
    }

    /**
     * 立即支付
     */
    public function pay($order_id,$pay_type)
    {
        // 订单详情
        $order = OrderModel::getUserOrderDetail($order_id, $this->user['user_id']);
        // 判断商品状态、库存
        if (!$order->checkGoodsStatusFromOrder($order['goods'])) {
            return $this->renderError($order->getError());
        }
		//发起余额支付
		if($pay_type==1){
			$user = UserModel::detail(['user_id' => $this->user['user_id']]);//获取用户余额并比较余额是否充足
			if($user['wallet']<$order['pay_price']){
				return $this->renderError('储值的余额不足');
			}
			$user->wallet = ['dec',$order['pay_price']];//扣除余额
			$user->pay = ['inc', $order['pay_price']];//增加消费金额
			$user->save();
			//订单排序号
			if($sort = Cache::get('order_sort_'.$order['wxapp_id'])){
				if($sort<99){
					$sort = $sort+1;
				}else{
					$sort=1;
				}	
			}else{
				$sort = 1;
			}
			Cache::set('order_sort_'.$order['wxapp_id'], $sort);
				
			// 更新商品库存、销量
			$GoodsModel = new GoodsModel;
			$GoodsModel->updateStockSales($this['goods']);
			// 更新订单状态
			$order->sort = $sort;
			$order->pay_status = 20;
			$order->pay_time = time();
			$order->save();
			//打印-获取打印机配置(只支持点餐)
			if($this->app_type==10){
				$p_set = SettingModel::getItem('printer');
				if(!empty($p_set)){
					//如果开启打印机并且开启支付后打印 - 则执行打印小票
					if($p_set['is_open']==1 AND $p_set['pay_p']==1){
						$order['p_title'] = $p_set['title']; //小票抬头
						$order['sort'] = $sort; //订单排号
						$p = new PrinterModel;
						if(!$p->gotoPrint($order, $p_set['p_model'], $p_set['p_n'])){//去打印
							return false;
						}
					}
				}
			}
			return $this->renderSuccess($order['order_id']);
		}
        // 发起微信支付
        $wxParams = wxPay($order['order_no'], $this->user['open_id'], $order['pay_price']);
        return $this->renderSuccess($wxParams);
    }

}
