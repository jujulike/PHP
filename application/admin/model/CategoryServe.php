<?php

namespace app\admin\model;

use app\common\model\CategoryServe as CategoryServeModel;
use think\Cache;

/**
 * 服务类目模型
 */
class CategoryServe extends CategoryServeModel
{
    /**
     * 添加新记录
     */
    public function add($data)
    {
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑记录
     */
    public function edit($data)
    {
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除
     */
    public function remove($category_serve_id)
    {
        // 判断是否存在子分类
        if ((new self)->where(['parent_id' => $category_serve_id])->count()) {
            $this->error = '该分类下存在子分类，请先删除';
            return false;
        }
        $this->deleteCache();
        return $this->delete();
    }

    /**
     * 删除缓存
     */
    private function deleteCache()
    {
        return Cache::rm('category_serve');
    }

}
