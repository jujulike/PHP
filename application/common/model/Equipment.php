<?php

namespace app\common\model;

use think\Request;

/**
 * 设备授权模型
 */
class Equipment extends BaseModel
{
    protected $name = 'equipment';
	
    /**
     * 获取列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->useGlobalScope(false)
			->order('equipment_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
    /**
     * 获取详情 - 根据ID编号
     */
    public static function detail($where)
    {
        return self::useGlobalScope(false)->where($where)->find();
    }
}
