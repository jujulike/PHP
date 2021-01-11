<?php
namespace app\admin\model;
use app\common\model\Role as RoleModel;
use app\common\model\StoreUser as StoreUserModel;
use think\Session;

/**
 * 角色用户模型
 */
class Role extends RoleModel
{
	/**
     * 管理员用户登录
     */
    public function login($data)
    {
		
		$filter = [
            'user_name' => $data['user_name'],
            'password' => hema_hash($data['password'])
        ];
        // 验证用户名密码是否正确
		if ($user = $this->useGlobalScope(false)->where($filter)->find()){
			//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
            $role = $user['role_id'];
			//用户状态，=0正常，=10演示，=20过期
			$status = 10; //目前超管角色状态全部是演示权限
        }elseif($user = StoreUserModel::useGlobalScope(false)->where($filter)->where('type',20)->find()){
			//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
            $role = 0;
			//用户状态，=0正常，=10演示，=20过期
			$status = 0; //目前超管角色状态全部是演示权限
		}else{
			$this->error = '登录失败, 用户名或密码错误';
            return false;
		}
        // 保存登录状态
        Session::set('hema_admin', [
            'user' => [
				'store_user_id' => $user['store_user_id'],
                'user_name' => $user['user_name'],
				'role' => $role,
				'status' => $status
            ],
            'is_login' => true,
        ]);
        return true;
    }
}
