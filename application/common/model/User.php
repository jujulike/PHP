<?php

namespace app\common\model;

use think\Request;

/**
 * 用户模型类
 */
class User extends BaseModel
{
    protected $name = 'user';
	
	/**
     * 关联会员等级
     */
    public function grade()
    {
        return $this->belongsTo('UserGrade');
    }

    /**
     * 显示性别
     */
    public function getGenderAttr($value)
    {
        $status = [0 => '未知', 1 => '男', 2 => '女'];
        return $status[$value];
    }
	
	/**
     * 关联收货地址表
     */
    public function address()
    {
        return $this->hasMany('UserAddress');
    }
	
	/**
     * 关联收货地址表 (默认地址)
     */
    public function addressDefault()
    {
        return $this->belongsTo('UserAddress', 'address_id');
    }	

    /**
     * 获取用户列表
     */
    public function getList($user_grade_id, $gender, $search)
    {
		// 筛选条件
        $filter = [];
		$filterOr = [];
		if((!empty($search)) OR (!empty($user_grade_id)) OR (!empty($gender))){
			$user_grade_id >= 0 && $filter['user_grade_id'] = $user_grade_id;
			$gender >= 0 && $filter['gender'] = $gender;
			
			if(!empty($search)){
				$filterOr['nickName'] = ['like', '%' . trim($search) . '%'];
				$filterOr['user_id'] = $search;
				$filterOr['mobile'] = $search;
			}
		}
        return $this->with(['grade','address', 'addressDefault'])
			->order(['create_time' => 'desc'])
			->where($filter)
			->whereOr($filterOr)
			->paginate(15, false, ['query' => Request::instance()->request()]);
    }

    /**
     * 获取用户信息
     */
    public static function detail($where)
    {
        return self::get($where, ['grade','address', 'addressDefault']);
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
