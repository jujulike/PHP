<?php
namespace app\store\controller\wechat;
use app\store\controller\Controller;
use app\store\model\WechatPage as WechatPageModel;

/**
 * 公众号页面菜单管理
 */
class Page extends Controller
{
    /**
     * 获取页面列表
     */
    public function menu()
    {
		// 详情
        $model = WechatPageModel::detail();
		$wechat = new WechatPageModel;
        if (!$this->request->isAjax()) {
			if($model){
				$menu = $model['page_data']['json'];
				return $this->fetch('menu', compact('menu'));
			}
			$menu = $wechat->getDefault();
			return $this->fetch('menu', compact('menu'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $data = $this->postData('data');
		if($model){
			if (!$model->edit($data)) {
				$error = $model->getError() ?: '保存失败';
				return $this->renderError($error);
			}
			return $this->renderSuccess('保存成功');
		}
        if (!$wechat->add($data)) {
            $error = $wechat->getError() ?: '保存失败';
			return $this->renderError($error);
        }
        return $this->renderSuccess('保存成功');
    }
}
