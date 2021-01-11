<?php
namespace app\common\model;
use think\Request;
/**
 * 餐桌模型
 */
class Table extends BaseModel
{
    protected $name = 'table';

    /**
     * 获取列表
     */
    public function getList()
    {
         // 执行查询
        $list = $this->order('table_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 详情
     */
    public static function detail($table_id)
    {
        return self::get($table_id);
    }

}
