<?php
namespace app\common\model;
use think\Request;

/**
 * 微信公众号菜单模型
 */
class WechatPage extends BaseModel
{
    protected $name = 'wechat_page';

    /**
     * 格式化页面数据（读取的时候对数据转换）
     */
    public function getPageDataAttr($json)
    {
        $array = json_decode($json, true);
        return compact('array', 'json');
    }


    /**
     * 自动转换data为json格式(修改器，保存de时候操作)
     */
    public function setPageDataAttr($value)
    {
        return json_encode($value);
    }

    /**
     * diy页面详情
     */
    public static function detail()
    {
		return self::get([]);
    }
	
	/**
     * 新增小程序首页diy默认设置
     */
    public function getDefault()
    {
        $menu = [
			0 => [
				"type" => "view",
				"name" => "一级菜单",
				"sub_button" => [
					0 => [
						"type" => "click",
						"name" => "二级菜单",
						"key" => "关键字"
					],
				],
				"url" => "www.cityphp.cn"
			]
        ];
		return json_encode($menu);
    }
}
