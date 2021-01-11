<?php
namespace app\index\controller;
use app\index\model\StoreUser as StoreUserModel;

/**
 * 用户注册
 */
class Regist extends Controller
{
    public function index()
    {
		if ($this->request->isAjax()) {
            $model = new StoreUserModel;
            if ($model->add($this->postData('User'))) {
                return $this->renderSuccess('注册成功', 'login.php');
            }
            return $this->renderError($model->getError() ?: '注册失败');
        }
		$set['title'] = '用户注册 - 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'regist';
		$this->assign('set', $set);
		return $this->fetch('index');
    }
}
