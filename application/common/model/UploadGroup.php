<?php

namespace app\common\model;

/**
 * 文件库分组模型
 */
class UploadGroup extends BaseModel
{
    protected $name = 'upload_group';

    /**
     * 分组详情
     */
    public static function detail($group_id) {
        return self::get($group_id);
    }

}
