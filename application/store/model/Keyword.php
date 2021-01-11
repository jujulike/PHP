<?php
namespace app\store\model;
use app\common\model\Keyword as KeywordModel;

/**
 * 公众号关键字回复模型
 */
class Keyword extends KeywordModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
		$data['dataGroup'] =json_encode($data['dataGroup']);
        $data['wxapp_id'] = self::$wxapp_id;
		return $this->allowField(true)->save($data);
    }

    /**
     * 编辑
     */
    public function edit($data)
    {
		$data['dataGroup'] =json_encode($data['dataGroup']);
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除
     */
    public function remove()
    {
        return $this->delete();
    }
	
	/**
     * 更新状态
     */
    public function isOpen()
    {
        $this->is_open ? $this->is_open=0 : $this->is_open=1;
        return $this->save();
    }

}
