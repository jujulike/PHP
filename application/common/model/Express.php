<?php

namespace app\common\model;

use think\Request;

/**
 * 物流公司模型
 */
class Express extends BaseModel
{
    protected $name = 'express';

    /**
     * 获取列表
     */
    public function getList()
    {
        // 排序规则
        $sort = ['sort', 'express_id' => 'desc'];
        // 执行查询
        $list = $this->order($sort)
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取详情
     */
    public static function detail($express_id)
    {
        return self::get($express_id);
    }
}
