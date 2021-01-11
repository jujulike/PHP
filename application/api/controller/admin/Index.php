<?php

namespace app\api\controller\admin;

use app\api\controller\Controller;
use app\api\model\Wxapp as WxappModel;
use app\api\model\StoreUser as StoreUserModel;

/**
 * 管理中心
 */
class Index extends Controller
{
    /**
     * 注册
     */
    public function register()
    {
        $data = $this->request->post();
		if($data['lx']==0){
			if(StoreUserModel::detail($data['phone'])){
				return $this->renderError('您微信绑定的手机号已被占用');
			}
			//餐饮商家注册
			$wxapp = new WxappModel;
			if($wxapp->add($data)){
				return $this->renderSuccess([],'注册成功,账号密码都为：'.$data['phone']);
			}
			return $this->renderError('注册失败');
		}
		if($data['lx']==1){
			//代理商注册
			return $this->renderError('暂不开放注册');
		}   
    }
	
	/**
	 * 商户登录
	 */
	public function login($user_name){
		if($store = StoreUserModel::detail($user_name)){
			return $this->renderSuccess($store['wxapp_id'],'登录成功');
		}
		return $this->renderError('用户不存在');
	}
}
