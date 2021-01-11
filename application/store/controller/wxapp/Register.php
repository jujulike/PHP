<?php
namespace app\store\controller\wxapp;
use app\store\controller\Controller;
use app\store\model\Authentication as AuthenticationModel;

/**
 * 快速注册小程序
 */
class Register extends Controller
{
    /**
     * 快速注册小程序
     */
    public function index()
    {
		$model = AuthenticationModel::detail();
		if(!$this->request->isAjax()) {
            return $this->fetch('index', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
		$data = $this->postData('register');
		if($data['status']==0){
			$model = new AuthenticationModel;
			if ($model->edit($data)) {
				return $this->renderSuccess('操作成功，等待审核', url('wxapp.register/index'));
			}
			$error = $model->getError() ?: '操作失败';
			return $this->renderError($error);
		}
        if ($model->edit($data)) {
           return $this->renderSuccess('操作成功，等待审核', url('wxapp.register/index'));
        }
        $error = $model->getError() ?: '操作失败';
        return $this->renderError($error);
		
        
    }

}
