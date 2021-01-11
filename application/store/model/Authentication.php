<?php

namespace app\store\model;

use app\common\model\Authentication as AuthenticationModel;

/**
 * 快速注册小程序模型
 */
class Authentication extends AuthenticationModel
{
    /**
     * 编辑
     */
    public function edit(array $data)
    {
		$data['status'] = 10;
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }

}
