<?php

namespace app\common\model;

use think\Request;

/**
 * 优惠活动模型
 */
class Activity extends BaseModel
{
    protected $name = 'activity';
		
	/**
     * 优惠券类型
     */
    public function getActivityTypeAttr($value)
    {
		$status = [10 => '满减', 20 => '首单立减'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 获取列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->order('activity_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取详情
     */
    public static function detail($activity_id)
    {
        return self::get($activity_id);
    }
	
}
