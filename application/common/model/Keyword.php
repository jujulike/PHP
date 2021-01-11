<?php
namespace app\common\model;
use think\Request;
/**
 * 系统设置模型
 */
class Keyword extends BaseModel
{
    protected $name = 'keyword';

    /**
     * 获取器: 转义数组格式
     */
    public function getDatagroupAttr($value)
    {
        return json_decode($value, true);
    }

    /**
     * 获取列表
     */
    public function getList($is_open=-1)
    {
        // 筛选条件
        $filter = [];
        $is_open >= 0 && $filter['is_open'] = $is_open;
		// 执行查询
        $list = $this->where($filter)
            ->order('keyword_id','desc')
            ->paginate(15, false, ['query' => Request::instance()->request()]);
        return $list;
    }
}
