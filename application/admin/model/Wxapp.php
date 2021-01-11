<?php

namespace app\admin\model;

use app\common\model\Wxapp as WxappModel;
use think\Request;

/**
 * 微信小程序模型
 */
class Wxapp extends WxappModel
{
    
	/**
     * 获取列表 - 管理员 
     */
    public function getAllList()
    {
        // 执行查询
        $list = $this->useGlobalScope(false)
            ->order('wxapp_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

}

