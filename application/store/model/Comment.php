<?php
namespace app\store\model;

use app\common\model\Comment as CommentModel;

/**
 * 用户评论
 */
class Comment extends CommentModel
{
    /**
     * 添加
     */
    public function add(array $data)
    {
		//固定时间
		$data['start_time'] = strtotime($data['start_time']);
		$data['end_time'] = strtotime($data['end_time']);
        $data['wxapp_id'] = self::$wxapp_id;
		return $this->allowField(true)->save($data);
    }

    /**
     * 编辑
     */
    public function edit($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }
	
    /**
     * 删除
     */
    public function remove()
    {
        return $this->delete();
    }

}
