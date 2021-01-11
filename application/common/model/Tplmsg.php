<?php
namespace app\common\model;
use think\Request;

/**
 * 模板消息模型
 */
class Tplmsg extends BaseModel
{
    protected $name = 'tplmsg';
	
	/**
     * 类型
     */
    public function getTplTypeAttr($value)
    {
        $status = [10 => '支付通知', 20 => '发货通知', 30 => '售后通知'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 获取列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->order('tplmsg_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 获取详情
     */
    public static function detail($where)
    {
        return self::get($where);
    }
}
