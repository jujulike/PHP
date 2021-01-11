<?php

namespace app\admin\model;

use app\common\model\Equipment as EquipmentModel;
use think\Db;

/**
 * 打印设备模型
 */
class Equipment extends EquipmentModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 添加
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }
	
    /**
     * 编辑
     */
    public function edit($data)
    {
        // 开启事务
        Db::startTrans();
        try {
            // 保存
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            $this->error = $e->getMessage();
            return false;
        }
    }


    /**
     * 删除
     */
    public function remove()
    {
        // 开启事务处理
        Db::startTrans();
        try {
            // 删除
            $this->delete();
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
