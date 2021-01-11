<?php
namespace app\common\model;

/**
 * 站点配置模型
 */
class Config extends BaseModel
{
    protected $name = 'config';

    /**
     * 获取配置信息
     */
    public static function detail()
    {
        return self::useGlobalScope(false)->find();
    }
}
