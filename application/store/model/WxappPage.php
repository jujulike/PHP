<?php

namespace app\store\model;

use app\common\model\WxappPage as WxappPageModel;
use think\Db;

/**
 * 微信小程序diy页面模型
 */
class WxappPage extends WxappPageModel
{

    /**
     * 更新页面数据
     */
    public function edit($page_data)
    {
        // 删除wxapp缓存
        Wxapp::deleteCache();
        return $this->save(compact('page_data')) !== false;
    }
	
	/**
     * 添加
     */
    public function add(array $page_data)
    {
		// 删除wxapp缓存
        Wxapp::deleteCache();
		$data['page_type'] = 20;
		$data['page_data'] = $page_data;
        $data['wxapp_id'] = self::$wxapp_id;

        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 删除
     */
    public function remove()
    {
		// 删除wxapp缓存
        Wxapp::deleteCache();
        return $this->delete() !== false;
    }
	
	/**
     * 设置默认首页
     */
	public function sethome($data, $page_id)
    {
		 // 开启事务处理
        Db::startTrans();
        try {
			
			//取消原来的默认首页
			WxappPageModel::where('page_type',10)->update(['page_type' => 20]);
			//设置新首页
            $data['page_type'] = 10;
			$this->save();
			// 删除wxapp缓存
			Wxapp::deleteCache();
            // 事务提交
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }
	

}
