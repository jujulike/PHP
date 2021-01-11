<?php
namespace app\index\controller;
use app\index\model\Wxapp as WxappModel;
use app\index\model\StoreUser as StoreUserModel;
use think\Session;
/**
 * 用户首页
 */
class User extends Controller
{
	/**
     * 获取列表
     */
    public function index()
    {
		$model = new WxappModel;
        $list = $model->getList($this->store_user_id);
		$set['title'] = '用户中心 - 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'user';
		$this->assign('set', $set);
        return $this->fetch('index', compact('list'));
    }
	
	/**
     * 添加
     */
    public function addWxapp()
    {
        if (!$this->request->isAjax()) {
            $set['title'] = '创建微信小程序 - 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
			$set['nav'] = 'addwxapp';
			$this->assign('set', $set);
            return $this->fetch('addwxapp');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new WxappModel;
		$wxapp = $this->postData('wxapp');
		$wxapp['store_user_id'] = $this->store['user']['store_user_id'];
		if($model::getWxapp(['app_type' => $wxapp['app_type'] , 'store_user_id' => $wxapp['store_user_id']])){
			return $this->renderError('同类型小程序只能创建1个');
		}
        if ($model->addWxapp($wxapp)) {
            return $this->renderSuccess('创建成功', url('user/index'));
        }
        $error = $model->getError() ?: '创建失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($wxapp_id)
    {
		return $this->renderError('暂不支持');
		/*
        $model = GoodsModel::get($goods_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
		*/
    }

    /**
     * 登录小程序
     */
    public function wxappLogin($wxapp_id)
    {
        // 小程序详情
		if($model = WxappModel::getWxapp(['wxapp_id' => $wxapp_id])){
			if ($model->wxappLogin($model)) {
				$this->redirect('/store.php');
				return false;
			}
		}
		$this->error('应用错误', '/user.php');
		return false;		
    }
	
	/**
     * 修改管理员密码
     */
    public function renew()
    {
        $model = StoreUserModel::detail($this->store['user']['user_name']);
        if ($this->request->isAjax()) {
			if($err = is_power()){
				return $this->renderError($err);
			}
            if ($model->renew($this->postData('user'))) {
                return $this->renderSuccess('修改成功','/user.php');
            }
            return $this->renderError($model->getError() ?: '修改失败');
        }
		$set['title'] = '修改密码 - 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'renew';
		$this->assign('set', $set);
        return $this->fetch('renew', compact('model'));
    }
}
