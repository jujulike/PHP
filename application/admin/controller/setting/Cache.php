<?php

namespace app\admin\controller\setting;

use app\admin\controller\Controller;
use think\Cache as Driver;

/**
 * 清理缓存
 */
class Cache extends Controller
{
    /**
     * 清理缓存
     */
    public function clear($isForce = false)
    {
        if ($this->request->isAjax()) {
            $data = $this->postData('cache');
            $this->rmCache($data['keys'], isset($data['isForce']) ? !!$data['isForce'] : false);
            return $this->renderSuccess('操作成功');
        }
        return $this->fetch('clear', [
            'cacheList' => $this->getCacheKeys(),
            'isForce' => !!$isForce ?: config('app_debug'),
        ]);
    }

    /**
     * 删除缓存
     */
    private function rmCache($keys, $isForce = false)
    {
        if ($isForce === true) {
            Driver::clear();
        } else {
            $cacheList = $this->getCacheKeys();
            foreach (array_intersect(array_keys($cacheList), $keys) as $key) {
                Driver::has($cacheList[$key]['key']) && Driver::rm($cacheList[$key]['key']);
            }
        }
    }

    /**
     * 获取缓存索引数据
     */
    private function getCacheKeys()
    {
        return [
            'wxapp' => [
                'key' => 'category_serve_setting',
                'name' => '服务类目'
            ],
        ];
    }

}
