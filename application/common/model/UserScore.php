<?php

namespace app\common\model;

use think\Request;
/**
 * 用户积分明细
 */
class UserScore extends BaseModel
{
    protected $name = 'user_score';
	
	/**
     * 关联商品分类表
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
	
	/**
     * 状态
     */
    public function getStatusAttr($value)
    {
        $status = ['扣减', '增加'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
    /**
     * 获取列表 - 商户
     */
    public function getList()
    {
        // 执行查询
        $list = $this->with(['user'])->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
	/**
     * 获取列表 - 用户
     */
    public function getUserList($user_id)
    {
        // 执行查询
        $list = $this->with(['user'])
				->where('user_id','=',$user_id)
				->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

}
