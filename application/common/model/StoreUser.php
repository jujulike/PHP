<?php
namespace app\common\model;
use think\Request;

/**
 * 管理员用户模型
 */
class StoreUser extends BaseModel
{
    protected $name = 'store_user';
	
	/**
     * 管理员类型
     */
    public function getTypeAttr($value)
    {
        $status = [10 => '商户管理员', 20 => '超级管理员'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 获取列表
     */
    public function getList()
    {
         // 执行查询
        $list = $this->useGlobalScope(false)
			->where('type',10)
			->order('store_user_id','desc')
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
     * 管理员信息
     */
    public static function detailId($store_user_id)
    {
        return self::useGlobalScope(false)->where('store_user_id',$store_user_id)->find();
    }

    /**
     * 更新当前管理员信息
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
