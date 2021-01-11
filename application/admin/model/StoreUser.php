<?php
namespace app\admin\model;
use app\common\model\StoreUser as StoreUserModel;
use think\Session;
/**
 * 商户用户模型
 */
class StoreUser extends StoreUserModel
{
	/**
     * 重置商户密码
     */
    public function resetPwd($data)
    {
		$data['password'] = hema_hash('123456');
        if ($this->allowField(true)->save($data) === false) {
            return false;
        }
        return true;
    }
	
	/**
     * 管理员执行商户登录
     */
    public function storeLogin($data)
    {
		// 保存登录状态
        Session::set('hema_store', [
            'user' => [
                'store_user_id' => $data['store_user_id'],
                'user_name' => $data['user_name'],
				'role' => 0,//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
				'status' => Session::get('hema_admin')['user']['status']	//用户状态，=0正常，=10演示，=20过期
            ],
            'is_login' => true,
        ]);
        return true;
    }
	
	/**
     * 管理员执行应用登录
     */
    public function appLogin($wxapp,$user)
    {
         // 保存登录状态
        Session::set('hema_store', [
            'user' => [
                'store_user_id' => $user['store_user_id'],
                'user_name' => $user['user_name'],
				'role' => 0,//角色编号; =0为超级管理员，>0为角色管理,控制管理权限
				'status' => Session::get('hema_admin')['user']['status']	//用户状态，=0正常，=10演示，=20过期
            ],
            'wxapp' => $wxapp->toArray(),
            'is_login' => true,
        ]);
        return true;
    }
    
}
