<?php

namespace app\common\model;

use think\Request;

/**
 * 模板模型
 */
class Template extends BaseModel
{
    protected $name = 'template';
	
	/**
     * 模板类型
     */
    public function getAppTypeAttr($value)
    {
        $status = [10 => '点餐', 20 => '商城'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 获取列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->useGlobalScope(false)
			->order('template_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取详情
     */
    public static function detail($template_id)
    {
        return self::useGlobalScope(false)->where(['template_id' => $template_id])->find();
    }
	
	/**
     * 获取最新模板
     */
    public static function getNew($app_type=10)
    {
		return self::useGlobalScope(false)->where('app_type',$app_type)->order('template_id','desc')->find();
    }

}
