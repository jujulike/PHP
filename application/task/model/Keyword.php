<?php

namespace app\task\model;

use app\common\model\Keyword as KeywordModel;

/**
 * 关键字回复模型
 */
class Keyword extends KeywordModel
{
	/**
     * 检索关键字回复内容
    */
	public function getKey($keyword,$wxapp_id)
	{
		$detail = $this->useGlobalScope(false)
			->where(['keyword' => $keyword,'wxapp_id' => $wxapp_id,'is_open' => 1])
			->find();
		if(!$detail){
			$detail = $this->useGlobalScope(false)
				->where(['keyword' => '*','wxapp_id' => $wxapp_id,'is_open' => 1])
				->find();
			if(!$detail){
				return false;
			}
		}
		return $detail;
	}
}
