<?php
namespace app\index\model;
use app\common\model\StoreUser as StoreUserModel;
use app\common\model\Role as RoleModel;
use think\Session;

/**
 * 商家用户模型
 */
class StoreUser extends StoreUserModel
{
	/**
     * 添加
     */
    public function add(array $data)
    {
		//验证手机号是否合法
		if(!isMobile($data['user_name'])){
			$this->error = '手机号码不合法';
            return false;
		}
		//验证账号是否存在
		if(StoreUserModel::detail($data['user_name'])){
			$this->error = '该账号已存在';
            return false;
		}
		//验证密码长度是否合法
		if(strlen($data['password'])<6){
			$this->error = '密码长度不足6位';
            return false;
		}
		//验证两次密码是否一致
		if($data['password']!==$data['password2']){
			$this->error = '两次密码不一致';
            return false;
		}
		$data['password'] = hema_hash($data['password']);
        // 添加
        return $this->allowField(true)->save($data);
    }

    /**
     * 商家用户登录
     */
    public function login($data)
    {
		
		$filter = [
            'user_name' => $data['user_name'],
            'password' => hema_hash($data['password'])
        ];
        // 验证用户名密码是否正确
		if ($user = RoleModel::useGlobalScope(false)->where($filter)->find()){
			//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
            $role = $user['role_id'];
			//用户状态，=0正常，=10演示，=20过期
			$status = 0; //目前超管角色状态全部是演示权限
        }elseif($user = $this->useGlobalScope(false)->where($filter)->where('type',10)->find()){
			//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
            $role = 0;
			//用户状态，=0正常，=10演示，=20过期
			$status = 0;
		}else{
			$this->error = '登录失败, 用户名或密码错误';
            return false;
		}
		// 保存登录状态
        Session::set('hema_store', [
            'user' => [
                'store_user_id' => $user['store_user_id'],
                'user_name' => $user['user_name'],
				'role' => $role,//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
				'status' => $status	//用户状态，=0正常，=10演示，=20过期
            ],
            'is_login' => true,
        ]);
        return true;
    }  

    /**
     * 修改管理员密码
     */
    public function renew($data)
    {
        //验证密码长度是否合法
		if(strlen($data['password'])<6){
			$this->error = '密码长度不足6位';
            return false;
		}
		if ($data['password'] !== $data['password_confirm']) {
            $this->error = '确认密码不正确';
            return false;
        }
        // 更新管理员信息
        if ($this->save([
                'password' => hema_hash($data['password']),
            ]) === false) {
            return false;
        }
        return true;
    }

}
