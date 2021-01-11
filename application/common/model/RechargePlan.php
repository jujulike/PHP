<?php
namespace app\common\model;

use think\Request;
/**
 * 用户充值套餐模型
 */
class RechargePlan extends BaseModel
{
    protected $name = 'recharge_plan';

    /**
     * 获取列表
     */
    public function getList()
    {
		// 执行查询
        $list = $this->order(['recharge_plan_id'=> 'desc','sort' => 'asc'])
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 详情
     */
    public static function detail($recharge_plan_id)
    {
        return self::get($recharge_plan_id);
    }

}
