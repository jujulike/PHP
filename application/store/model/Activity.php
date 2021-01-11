<?php
namespace app\store\model;

use app\common\model\Activity as ActivityModel;

/**
 * 优惠活动模型
 */
class Activity extends ActivityModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
		//固定时间
        $data['wxapp_id'] = self::$wxapp_id;
		return $this->save($data);
    }

    /**
     * 编辑
     */
    public function edit($data)
    {
        return $this->save($data);
    }
	
    /**
     * 删除
     */
    public function remove()
    {
        return $this->delete();
    }

}
