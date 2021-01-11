<?php

namespace app\common\model;

use app\common\model\Template;
use think\Request;
/**
 * 商户发布的模板
 */
class WxappTpl extends BaseModel
{
    protected $name = 'wxapp_tpl';
	
	/**
     * 设置小程序模板信息
     */
    public function getTemplateAttr($value)
    {
		if($value==0){
			return ['template_id' => $value];
		}
		return Template::detail($value);
         
    }
	
	/**
     * 获取列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->order('wxapp_tpl_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
	
    /**
     * 获取详情
     */
    public static function detail($wxapp_tpl_id)
    {
        return self::get($wxapp_tpl_id);
    }
	
	/**
     * 获取最新
     */
    public static function getNew()
    {
        return self::order('wxapp_tpl_id','desc')->find();
    }

}
