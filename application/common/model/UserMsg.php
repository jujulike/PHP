<?php

namespace app\common\model;

use think\Request;

/**
 * 用户消息模型
 */
class UserMsg extends BaseModel
{
    protected $name = 'user_msg';

    /**
     * 消息分类
     */
    public function getCategoryAttr($value)
    {
        $status = [0 => '系统消息', 1 => '积分变更', 2 => '钱包变更', 3 => '等级变更'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 系统操作reason
     */
    public function getOperateAttr($value)
    {
        $status = [0 => '无操作', 1 => '增加', 2 => '扣减', 3 => '重置'];
        return ['text' => $status[$value], 'value' => $value];
    }
	/**
     * 操作原因 - 用于流水
     */
    public function getReasonAttr($value)
    {
        $status = [0 => '无', 1 => '管理员操作', 2 => '扣减', 3 => '重置'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 消息状态
     */
    public function getStatusAttr($value)
    {
        $status = [0 => '未阅读', 1 => '已阅读'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 获取消息列表
     */
    public function getList($user_id = '', $category = '', $status = '')
    {
        // 筛选条件
        $filter = [];
		$filterOr = [];
        if($user_id > 0){//$user_id=0时为系统群发消息
			$filterOr['user_id'] = $user_id;
			$filterOr['user_id'] = 0;
		}	
		$category >= 0 && $filter['category'] = $category;
        $status >= 0 && $filter['status'] = $status;

        // 排序规则
        $sort = [];
		$sort = ['create_time' => 'desc'];
		
        // 执行查询
        $list = $this->where($filter)
			->whereOr($filterOr)
            ->order($sort)
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取消息详情
     */
    public static function detail($user_msg_id)
    {
        return self::get($user_msg_id);
    }

}
