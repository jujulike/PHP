<?php
namespace app\common\model;
use think\Request;

/**
 * 用户充值模型
 */
class Recharge extends BaseModel
{
    protected $name = 'recharge';

    /**
     * 关联套餐表
     */
    public function plan()
    {
        return $this->belongsTo('RechargePlan');
    }
	
	/**
     * 关联用户表
     */
    public function user()
    {
        return $this->belongsTo('User');
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
     * 获取列表
     */
    public function getList($pay_status='',$recharge_plan_id='',$search='',$start_time='',$end_time='')
    {
        // 筛选条件
        $filter = [];
        $pay_status >= 0 && $filter['pay_status'] = $pay_status;
        $recharge_plan_id >= 0 && $filter['recharge_plan_id'] = $recharge_plan_id;
		if(!empty($start_time) AND !empty($end_time)){
			$start_time= strtotime($start_time);
			$end_time = strtotime($end_time);
			$filter['create_time'] = ['between', [$start_time,$end_time]];
		}
		
		// 筛选条件
        $filter2 = [];
        !empty($search) && $filter2['user_id'] = ['like', '%' . trim($search) . '%'];
		!empty($search) && $filter2['order_no'] = ['like', '%' . trim($search) . '%'];
        // 执行查询
        $list = $this->with(['plan','user'])
            ->where($filter)
			->whereOr($filter2)
            ->order('recharge_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 订单详情
     */
    public static function detail($recharge_id)
    {
        return self::get($recharge_id, ['plan','user']);
    }
	
}
