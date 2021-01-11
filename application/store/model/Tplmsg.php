<?php
namespace app\store\model;
use app\common\model\Tplmsg as TplmsgModel;

/**
 * 模板消息模型
 */
class Tplmsg extends TplmsgModel
{
    /**
     * 添加
     */
    public function add($data)
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

