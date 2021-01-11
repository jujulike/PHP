<?php
namespace app\task\model;
use app\common\model\Wxapp as WxappModel;
use think\Cache;

/**
 * 微信小程序模型
 */
class Wxapp extends WxappModel
{
    /**
     * 更新小程序设置
     */
    public function edit($data)
    {
        // 删除wxapp缓存
        self::deleteCache();
        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 删除wxapp缓存
     */
    public static function deleteCache()
    {
        return Cache::rm('wxapp_' . self::$wxapp_id);
    }
}
