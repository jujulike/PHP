<?php
namespace app\store\model;
use app\common\model\MaterialText as MaterialTextModel;

/**
 * 微信公众号图文详情模型
 */
class MaterialText extends MaterialTextModel
{
	
	/**
     * 添加
     */
    public function add($data,$text_no)
    {
		//重组数据
		for($n=0;$n<sizeof($data);$n++){
			$data[$n]['id'] = $n;
			$data[$n]['text_no'] = $text_no;
			$data[$n]['wxapp_id'] = self::$wxapp_id;
		}
        return $this->allowField(true)->saveAll($data) !== false;
    }
	
	/**
     * 添加
     */
    public function edit($data)
    {
        return $this->allowField(true)->saveAll($data) !== false;
    }
}
