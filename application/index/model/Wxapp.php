<?php
namespace app\index\model;
use app\common\model\Wxapp as WxappModel;
use think\Session;
use think\Db;

/**
 * 小程序模型
 */
class Wxapp extends WxappModel
{
    /**
     * 添加
    */ 
    public function addWxapp($data)
    {
		return $this->allowField(true)->save($data);
    }

    /**
     * 一键登录应用
     */
    public function wxappLogin($wxapp)
    {
		// 更新session
        Session::set('hema_store.wxapp',$wxapp->toArray());
		return true;
    }

    /**
     * 删除
     */
    public function remove()
    {
        // 开启事务处理
    }
	

}
