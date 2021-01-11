<?php
namespace app\store\model;
use app\common\model\UserGrade as UserGradeModel;

/**
 * 用户等级
 */
class UserGrade extends UserGradeModel
{
    /**
     * 新增记录
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }

    /**
     * 更新记录
     */
    public function edit($data)
    {
        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 删除记录
     */
    public function remove() {
        return $this->delete();
    }

}
