<?php

namespace app\store\model;

use app\common\model\UploadGroup as UploadGroupModel;

/**
 * 文件库分组模型
 */
class UploadGroup extends UploadGroupModel
{
    /**
     * 获取列表记录
     */
    public function getList($group_type = 'image')
    {
        return $this->where(compact('group_type'))->order(['sort' => 'asc'])->select();
    }

    /**
     * 添加新记录
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        $data['sort'] = 100;
        return $this->save($data);
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
    public function remove()
    {
        // 更新该分组下的所有文件
        $model = new UploadFile;
        $model->where(['group_id' => $this['group_id']])->update(['group_id' => 0]);
        return $this->delete();
    }

}
