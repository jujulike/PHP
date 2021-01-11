<?php

namespace app\store\model;

use app\common\model\UserMsg as UserMsgModel;

/**
 * 用户消息模型模型
 */
class UserMsg extends UserMsgModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        $this->allowField(true)->save($data);
    }
	
    /**
     * 编辑
     */
    public function edit($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除
     */
    public function remove()
    {
        return $this->delete();
    }

}
