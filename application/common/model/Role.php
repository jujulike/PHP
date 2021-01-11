<?php
namespace app\common\model;
use think\Request;

/**
 * 角色用户模型
 */
class Role extends BaseModel
{
	protected $name = 'role';
	
	/**
     * 关联角色上级
    
	*/
    public function store()
    {
        return $this->hasOne('StoreUser','store_user_id','store_user_id');
    }
	
	/**
     * 关联角色分类
    */
    public function category()
    {
        return $this->hasOne('RoleCategory','role_category_id','role_category_id');
    }
	
	/**
     * 获取列表
    */
    public function getList($store_user_id,$role_id=0)
    {
		 // 筛选条件
        $filter = [];
        $role_id > 0 && $filter['role_id'] = $role_id;
        $filter['store_user_id'] = $store_user_id;
        $list = $this->useGlobalScope(false)
			->with(['store','category'])
            ->where($filter)
            ->order(['role_id' => 'desc'])
            ->paginate(15, false, ['query' => Request::instance()->request()]);
        return $list;
    }
	
	/**
     * 管理员信息
     */
    public static function detail($user_name)
    {
        return self::useGlobalScope(false)->where('user_name',$user_name)->find();
    }
	
	/**
     * 添加
    */
    public function add($data,$store_user_id)
    {
		$data['store_user_id'] = $store_user_id;
		$data['password'] = hema_hash($data['password']);
        return $this->allowField(true)->save($data);
    }
	
	/**
     * 编辑
     */
    public function edit($data)
    {
		if($data['password2']!=''){
            $data['password'] = hema_hash($data['password2']);
        }
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
