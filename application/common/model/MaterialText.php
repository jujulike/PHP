<?php
namespace app\common\model;

/**
 * 微信公众号菜单模型
 */
class MaterialText extends BaseModel
{
    protected $name = 'material_text';
	
	public function getList($text_no,$name=''){
		$list = $this->where(['text_no' => $text_no])
			->order('id','asc')
			->select();
		$list[0]['name'] = $name;
		return json_encode($list);
	}	
}
