<?php
namespace app\common\model;
use think\Cache;

/**
 * 角色类目模型
 */
class Rules extends BaseModel
{
    protected $name = 'rules';
	protected $append = ['state'];
	
	/**
     * 计算显示销量 (初始销量 + 实际销量)
     */
    public function getStateAttr($value)
    {
        return ['selected' => false];
    }

    /**
     * 所有分类
     */
    public static function getALL($app_type)
    {
        $model = new static;
        if (!Cache::get('rules_' . $app_type)) {
            $data = $model->useGlobalScope(false)->order(['sort' => 'asc'])->select();
            $all = !empty($data) ? $data->toArray() : [];
            $tree = [];
            foreach ($all as $first) {
                if ($first['parent'] != '#') continue;
                $twoTree = [];
                foreach ($all as $two) {
                    if ($two['parent'] != $first['id']) continue;
                    $threeTree = [];
                    foreach ($all as $three)
                        $three['parent'] == $two['id']
                        && $threeTree[$three['id']] = $three;
                    !empty($threeTree) && $two['child'] = $threeTree;
                    $twoTree[$two['id']] = $two;
                }
                if (!empty($twoTree)) {
                    array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
                    $first['child'] = $twoTree;
                }
                $tree[$first['id']] = $first;
            }
            Cache::set('rules_' . $app_type, compact('all', 'tree'));
        }
        return Cache::get('rules_' . $app_type);
    }

    /**
     * 获取所有分类
     */
    public static function getCacheAll($app_type)
    {
        return self::getALL($app_type)['all'];
    }

    /**
     * 获取所有分类(树状结构)
     */
    public static function getCacheTree($app_type)
    {
        return self::getALL($app_type)['tree'];
    }

}
