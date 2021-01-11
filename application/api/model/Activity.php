<?php

namespace app\api\model;

use app\common\model\Activity as ActivityModel;

/**
 * 优惠活动模型类
 */
class Activity extends ActivityModel
{
   /**
     * 获取列表
     */
    public function lists()
    {
        // 执行查询
        return $this->order('activity_id','desc')->select();
    }

}
