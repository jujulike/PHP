<?php

namespace app\common\model;

/**
 * 小程序帮助中心
 */
class WxappHelp extends BaseModel
{
    protected $name = 'wxapp_help';

    /**
     * 获取帮助列表
     */
    public function getList()
    {
        return $this->order(['sort' => 'asc'])->select();
    }

    /**
     * 帮助详情
     */
    public static function detail($help_id)
    {
        return self::get($help_id);
    }

    /**
     * 新增默认帮助
     */
    public function insertDefault($wxapp_id)
    {
        return $this->save([
            'title' => '关于小程序',
            'content' => '小程序本身无需下载，无需注册，不占用手机内存，可以跨平台使用，响应迅速，体验接近原生APP。',
            'sort' => 100,
            'wxapp_id'=> $wxapp_id
        ]);
    }

}
