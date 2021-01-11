<?php

namespace app\admin\controller\wxapp;

use app\admin\controller\Controller;
use app\admin\model\Authentication as AuthenticationModel;

/**
 * 商户申请认证记录
 */
class Apply extends Controller
{
    /**
     * 获取所有列表
     */
    public function index()
    {
        $model = new AuthenticationModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
	/**
     * 获取详情
     */
    public function detail($authentication_id)
    {
		
        $model = AuthenticationModel::detail($authentication_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('detail', compact('model'));
        }
		$data = $this->postData('authentication');
		if($data['status']==0){
			return $this->renderSuccess('正在跳转', url('wxapp.apply/index'));
		}
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($data['status'], $model)) {
            return $this->renderSuccess('更新成功', url('wxapp.apply/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
}
