<?php
namespace app\store\model;
use app\common\model\UploadFileUsed as UploadFileUsedModel;

/**
 * 已上传文件使用记录表MO型
 */
class UploadFileUsed extends UploadFileUsedModel
{
    protected $updateTime = false;

    /**
     * 新增记录
     */
    public function add($data) {
        return $this->save($data);
    }

    /**
     * 移除记录
     */
    public function remove($from_type, $file_id, $from_id = null)
    {
        $where = compact('from_type', 'file_id');
        !is_null($from_id) && $where['from_id'] = $from_id;
        return $this->where($where)->delete();
    }
}
