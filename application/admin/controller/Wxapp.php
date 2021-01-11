<?php
namespace app\admin\controller;
use app\admin\model\Wxapp as WxappModel;
use app\admin\model\StoreUser as StoreUserModel;

/**
 * 商户管理控制器
 */
class Wxapp extends Controller
{
    /**
     * 商户列表
     */
    public function index()
    {
        $model = new WxappModel;
        $list = $model->getAllList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($wxapp_id)
    {
		return $this->renderError('暂不支持删除');
        $model = WxappModel::getWxapp($wxapp_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }
	
	/**
     * 管理员执行小程序登录
     */
    public function appLogin($wxapp_id)
    {
        $wxapp = WxappModel::getWxapp(['wxapp_id'=>$wxapp_id]);
		$model = StoreUserModel::detailId($wxapp['store_user_id']);
        if ($model->appLogin($wxapp,$model)) {
            $this->redirect('/store.php');
        }
        $this->error('登录错误', '/login.php');
    }


}
