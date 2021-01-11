<?php

namespace app\store\model;

use app\common\model\Express as ExpressModel;

/**
 * 物流公司模型
 */
class Express extends ExpressModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
		return $this->allowField(true)->save($data);
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
