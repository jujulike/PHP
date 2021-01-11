<?php

namespace app\task\model;

use app\common\model\Order as OrderModel;
use app\common\model\Setting as SettingModel;
use app\common\model\Printer as PrinterModel;
use app\common\model\Table as TableModel;
use app\common\model\User as UserModel;
use app\common\model\UserScore as UserScoreModel;
use think\Cache;
use think\Db;

/**
 * 订单模型
 */
class Order extends OrderModel
{
    /**
     * 待支付订单详情
     */
    public function payDetail($order_no)
    {
        return self::get(['order_no' => $order_no, 'pay_status' => 10], ['goods']);
    }

    /**
     * 更新付款状态
     */
    public function updatePayStatus($transaction_id, $order)
    {
		// 开启事务
        Db::startTrans();
		
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
			$GoodsModel = new Goods;
			$GoodsModel->updateStockSales($this['goods']);
			// 更新订单状态
			$this->save([
				'sort' => $sort,
				'pay_status' => 20,
				'pay_time' => time(),
				'transaction_id' => $transaction_id,
			]);
			
        Db::commit();
		$user = UserModel::detail(['user_id' => $order['user_id']]);	//获取用户详情
		//获取积分配置
		$s_set = SettingModel::getItem('score');
		if(!empty($s_set)){
			if($s_set['is_open']==1){
				//增加用户积分
				$user->score = ['inc', intval($order['pay_price'])*$s_set['gift_multiple']]; //去尾取整增加积分
				
				//增加积分变动记录
				$score = new UserScoreModel;
				$score->values = intval($order['pay_price'])*$s_set['gift_multiple']; //积分值
				$score->reason = '订单支付';
				$score->user_id = $order['user_id'];//用户
				$score->wxapp_id = $order['wxapp_id'];//商户
				$score->save();
			}
		}
		$user->pay = ['inc', $order['pay_price']];//增加消费金额
		$user->save();
			
		$table = TableModel::detail($order['table_id']);
		$order['table'] = $table;
		//获取打印机配置
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
        return true;
    }

}
