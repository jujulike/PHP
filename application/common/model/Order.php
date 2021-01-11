<?php
namespace app\common\model;
use app\common\model\Wxapp;
use think\Hook;

/**
 * 订单模型
 */
class Order extends BaseModel
{
    protected $name = 'order';

    /**
     * 订单模型初始化 - 创建钩子
     */
    public static function init()
    {
        parent::init();
        // 监听订单处理事件
        $static = new static;
        Hook::listen('order', $static);
    }

    /**
     * 订单商品列表
     */
    public function goods()
    {
        return $this->hasMany('OrderGoods');
    }
	
	/**
     * 关联订单收货地址表
     */
    public function address()
    {
        return $this->hasOne('OrderAddress');
    }

    /**
     * 关联用户表
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
	
	/**
     * 关联桌位表
     */
    public function table()
    {
        return $this->belongsTo('Table');
    }


    /**
     * 付款状态
     */
    public function getPayStatusAttr($value)
    {
		$status = [10 => '待付款', 20 => '已付款'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 发货状态
     */
    public function getDeliveryStatusAttr($value)
    {
		$wxapp = Wxapp::detail();
		$status = [10 => '待上菜', 20 => '上菜完毕'];
		if($wxapp['app_type']['value']==20){
			$status = [10 => '待发货', 20 => '已发货'];
		}
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 收货状态
     */
    public function getReceiptStatusAttr($value)
    {
		$wxapp = Wxapp::detail();
		$status = [10 => '待确认', 20 => '已确认'];
		if($wxapp['app_type']['value']==20){
			$status = [10 => '待收货', 20 => '已收货'];
		}
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 订单状态
     */
    public function getOrderStatusAttr($value)
    {
        $status = [10 => '进行中', 20 => '取消', 30 => '已完成'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 订单详情
     */
    public static function detail($order_id)
    {
        return self::get($order_id, ['goods.image', 'table', 'address']);
    }
	
	/**
     * 根据条件统计数量
     */
    public static function getAllCount()
    {
        $count = array();
		//全部
		$count[0][0] = self::where('pay_status','=',20)->count();
		$count[1][0] = self::where('pay_status','=',20)->sum('pay_price');
		//今天
		$star = strtotime(date("Y-m-d"),time());
		$count[0][1] = self::where('pay_status','=',20)->where('create_time','>',$star)->count();
		$count[1][1] = self::where('pay_status','=',20)->where('create_time','>',$star)->sum('pay_price');
		//昨天
		$star = strtotime("-1 day");
		$end = strtotime(date("Y-m-d"),time());
		$count[0][2] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][2] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
		//前天
		$star = strtotime("-2 day");
		$end = strtotime("-1 day");
		$count[0][3] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][3] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
		//-4天
		$star = strtotime("-3 day");
		$end = strtotime("-2 day");
		$count[0][4] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][4] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
		//-5天
		$star = strtotime("-4 day");
		$end = strtotime("-3 day");
		$count[0][5] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][5] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
		//-6天
		$star = strtotime("-5 day");
		$end = strtotime("-4 day");
		$count[0][6] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][6] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
		//-7天
		$star = strtotime("-6 day");
		$end = strtotime("-5 day");
		$count[0][7] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->count();
		$count[1][7] = self::where('pay_status','=',20)->where('create_time','>',$star)->where('create_time','<',$end)->sum('pay_price');
        return $count;
    }

}
