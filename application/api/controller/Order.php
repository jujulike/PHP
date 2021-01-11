<?php
namespace app\api\controller;
use app\api\model\Order as OrderModel;
use app\api\model\Cart as CartModel;
use app\api\model\User as UserModel;
use app\api\model\Goods as GoodsModel;
use app\api\model\Setting as SettingModel;
use app\api\model\Printer as PrinterModel;
use think\Cache;
/**
 * 订单控制器
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
	
	
    public function buyNow($goods_id, $goods_num, $goods_sku_id,$pay_type=0)
    {
		//结算方式 $pay_type=0微信,=1余额
        // 商品结算信息
        $model = new OrderModel;
        $order = $model->getBuyNow($this->user, $goods_id, $goods_num, $goods_sku_id);
        if (!$this->request->isPost()) {
            return $this->renderSuccess($order);
        }
        if ($model->hasError()) {
            return $this->renderError($model->getError());
        }
        // 创建订单
        if ($model->add($this->user['user_id'], $order,$this->app_type)) {
			if($pay_type==0){
				// 发起微信支付
				return $this->renderSuccess([
					'payment' => wxPay($model['order_no'], $this->user['open_id'] , $order['order_pay_price']),
					'order_id' => $model['order_id']
				]);
			}else{
				//发起余额支付
				$order = $model::getUserOrderDetail($model['order_id'],$this->user['user_id']);
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
				if($this->app_type==10){
					//打印-获取打印机配置
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
				return $this->renderSuccess($order);
			}
        }
        $error = $model->getError() ?: '订单创建失败';
        return $this->renderError($error);
    }

    /**
     * 订单确认-购物车结算
     */
    public function cart($table_id=0, $pay_type=0)
    {
        // 商品结算信息
        $model = new OrderModel;
        $order = $model->getCart($this->user);
        if (!$this->request->isPost()) {
            return $this->renderSuccess($order);
        }
		
        // 创建订单
		if($model->add($this->user['user_id'], $order,$this->app_type,$table_id)) {
			// 清空购物车
			$Card = new CartModel($this->user['user_id']);
			$Card->clearAll();
		
			if($pay_type==0){
				// 发起微信支付
				return $this->renderSuccess([
					'payment' => wxPay($model['order_no'], $this->user['open_id'], $order['order_pay_price']),
					'order_id' => $model['order_id']
				]);
			}else{
				//发起余额支付
				$order = $model::getUserOrderDetail($model['order_id'],$this->user['user_id']);
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
				if($this->app_type==10){
					//打印-获取打印机配置
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
				return $this->renderSuccess($order);
				
			}
		}
        $error = $model->getError() ?: '订单创建失败';
        return $this->renderError($error);
    }
}
