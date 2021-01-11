<?php
namespace app\admin\model;
use app\common\model\Rules as RulesModel;
use think\Cache;

/**
 * 角色类目模型
 */
class Rules extends RulesModel
{
    /**
     * 添加
     */
    public function add($data)
    {
        $this->deleteCache($data['app_type']);
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑
     */
    public function edit($data)
    {
		write_log($this,__DIR__);
        $this->deleteCache($this->app_type);
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除
     */
    public function remove()
    {
        // 判断是否存在子分类
        if ((new self)->where(['parent' => $this->id])->count()) {
            $this->error = '该目录下存在子目录，请先删除';
            return false;
        }
        $this->deleteCache($this->app_type);
        return $this->delete();
    }

    /**
     * 删除缓存
     */
    private function deleteCache($app_type)
    {
        return Cache::rm('rules_' . $app_type);
    }

}
