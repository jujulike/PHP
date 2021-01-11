<?php

namespace app\common\model;

use think\Request;

/**
 * 评论模型类
 */
class Comment extends BaseModel
{
    protected $name = 'comment';
	
	/**
     * 用户类型
     */
    public function getStatusAttr($value)
    {
        $status = [10 => '好评', 20 => '中评', 30 => '差评'];
        return ['text' => $status[$value], 'value' => $value];
    }
	

    /**
     * 获取用户列表
     */
    public function getList()
    {
        $request = Request::instance();
        return $this->useGlobalScope(false)
					->order(['user_id' => 'desc'])
					->paginate(15, false, ['query' => $request->request()]);
    }

    /**
     * 获取用户信息
     */
    public static function detail($where)
    {
        return self::useGlobalScope(false)->where($where)->find();
    }
	
	/**
     * 根据条件统计数量
     */
    public static function getCount()
    {
        $count = array();
		//全部
		$count[0] = self::count();
		//今天
		$star = strtotime(date("Y-m-d"),time());
		$count[1] = self::where('create_time','>',$star)->count();
		//昨天
		$star = strtotime("-1 day");
		$end = strtotime(date("Y-m-d"),time());
		$count[2] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
		//前天
		$star = strtotime("-2 day");
		$end = strtotime("-1 day");
		$count[3] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
		//-4天
		$star = strtotime("-3 day");
		$end = strtotime("-2 day");
		$count[4] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
		//-5天
		$star = strtotime("-4 day");
		$end = strtotime("-3 day");
		$count[5] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
		//-6天
		$star = strtotime("-5 day");
		$end = strtotime("-4 day");
		$count[6] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
		//-7天
		$star = strtotime("-6 day");
		$end = strtotime("-5 day");
		$count[7] = self::where('create_time','>',$star)->where('create_time','<',$end)->count();
        return $count;
    }

}
