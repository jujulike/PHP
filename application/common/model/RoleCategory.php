<?php
namespace app\common\model;

/**
 * 角色类目模型
 */
class RoleCategory extends BaseModel
{
	protected $name = 'role_category';
	
	/**
     * 格式化数据（读取的时候对数据转换）
     */
    public function getPowersAttr($json)
    {
        return json_decode($json, true);
    }


    /**
     * 自动转换data为json格式(修改器，保存de时候操作)
     */
    public function setPowersAttr($value)
    {
        return json_encode($value);
    }
	
	/**
     * 所有分类
     */
    public static function getALL($store_user_id)
    {
        $model = new static;
        $data = $model->useGlobalScope(false)
			->where(['store_user_id' => $store_user_id])
			->order(['sort' => 'asc','role_category_id' => 'desc'])
			->select();
        $all = !empty($data) ? $data->toArray() : [];
        $tree = [];
        foreach ($all as $first) {
            if ($first['parent_id'] != 0) continue;
            $twoTree = [];
            foreach ($all as $two) {
                if ($two['parent_id'] != $first['role_category_id']) continue;
				$threeTree = [];
				foreach ($all as $three)
					$three['parent_id'] == $two['role_category_id']
					&& $threeTree[$three['role_category_id']] = $three;
				!empty($threeTree) && $two['child'] = $threeTree;
				$twoTree[$two['role_category_id']] = $two;
            }
			if (!empty($twoTree)) {
				array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
				$first['child'] = $twoTree;
			}
			$tree[$first['role_category_id']] = $first;
        }
        return compact('all', 'tree');
    }
	
    /**
     * 获取所有分类
     */
    public static function getCacheAll($store_user_id)
    {
        return self::getALL($store_user_id)['all'];
    }

    /**
     * 获取所有分类(树状结构)
     */
    public static function getCacheTree($store_user_id)
    {
        return self::getALL($store_user_id)['tree'];
    }
	
    /**
     * 添加
    */
    public function add($data,$store_user_id,$tree)
    {
		if (empty($data['powers'])) {
            $this->error = '请选择角色权限';
            return false;
        }
		$data['powers'] = $this->screen($data['powers'],$tree);
		$data['store_user_id'] = $store_user_id;
        return $this->allowField(true)->save($data);
    }
	
	/**
     * 编辑
     */
    public function edit($data,$tree)
    {
		if (empty($data['powers'])) {
            $this->error = '请选择角色权限';
            return false;
        }
        $data['powers'] = $this->screen($data['powers'],$tree);
        return $this->allowField(true)->save($data);
    }
	
    /**
     * 删除
    */
    public function remove($role_category_id)
    {
		// 判断是否存在用户
        if ($roleCount = (new Role)->useGlobalScope(false)->where(['role_category_id' => $role_category_id])->count()) {
            $this->error = '该角色下存在' . $roleCount . '个用户，不允许删除';
            return false;
        }
        // 判断是否存在子分类
        if ((new self)->useGlobalScope(false)->where(['parent_id' => $role_category_id])->count()) {
            $this->error = '该角色下还有子角色，请先删除';
            return false;
        }
        return $this->delete();
    }
	
	/**
     * 权限数据筛选
    */
    private function screen($powers,$tree)
	{
		//筛选配置记录
		$newtree = [];
		foreach($tree as $first){
			if(isset($first['child'])){
				foreach($first['child'] as $two){
					if(isset($two['child'])){
						foreach ($two['child'] as $three){
							array_push($newtree,$three['id']);
						}
					}else{
						array_push($newtree,$two['id']);
					}
				}
			}else{
				array_push($newtree,$first['id']);
			}
		}
		$newpowers = [];
		foreach($powers as $item){
			foreach($newtree as $value){
				if($item == $value){
					array_push($newpowers,$item);
				}
			}
		}
		return $newpowers;
	}
}
