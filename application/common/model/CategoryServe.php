<?php

namespace app\common\model;

use think\Cache;

/**
 * 服务类目模型
 */
class CategoryServe extends BaseModel
{
    protected $name = 'category_serve';

    /**
     * 所有分类
     */
    public static function getALL()
    {
        $model = new static;
        if (!Cache::get('category_serve')) {
            $data = $model->useGlobalScope(false)->order(['sort' => 'asc'])->select();
            $all = !empty($data) ? $data->toArray() : [];
            $tree = [];
            foreach ($all as $first) {
                if ($first['parent_id'] != 0) continue;
                $twoTree = [];
                foreach ($all as $two) {
                    if ($two['parent_id'] != $first['category_serve_id']) continue;
                    $threeTree = [];
                    foreach ($all as $three)
                        $three['parent_id'] == $two['category_serve_id']
                        && $threeTree[$three['category_serve_id']] = $three;
                    !empty($threeTree) && $two['child'] = $threeTree;
                    $twoTree[$two['category_serve_id']] = $two;
                }
                if (!empty($twoTree)) {
                    array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
                    $first['child'] = $twoTree;
                }
                $tree[$first['category_serve_id']] = $first;
            }
            Cache::set('category_serve', compact('all', 'tree'));
        }
        return Cache::get('category_serve');
    }

    /**
     * 获取所有分类
     */
    public static function getCacheAll()
    {
        return self::getALL()['all'];
    }

    /**
     * 获取所有分类(树状结构)
     */
    public static function getCacheTree()
    {
        return self::getALL()['tree'];
    }
	
	/**
     * 获取所有分类(树状结构)
     */
    public static function detail($where)
    {
        return self::useGlobalScope(false)->where($where)->find();
    }

}
