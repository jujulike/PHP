<?php

namespace app\store\model;

use app\common\model\UploadFile as UploadFileModel;

/**
 * 文件库模型
 */
class UploadFile extends UploadFileModel
{
    /**
     * 添加新记录
     */
    public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->save($data);
    }

    /**
     * 批量软删除
     */
    public function softDelete($fileIds)
    {
        return $this->where('file_id', 'in', $fileIds)->update(['is_delete' => 1]);
    }

    /**
     * 批量移动文件分组
     */
    public function moveGroup($group_id, $fileIds)
    {
        return $this->where('file_id', 'in', $fileIds)->update(compact('group_id'));
    }

}
