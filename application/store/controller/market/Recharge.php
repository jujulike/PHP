<?php
namespace app\store\controller\market;

use app\store\controller\Controller;
use app\store\model\Setting as SettingModel;

/**
 * 用户充值控制器
 */
class Recharge extends Controller
{
    public function setting()
    {
        if (!$this->request->isAjax()) {
            $values = SettingModel::getItem('recharge');
            return $this->fetch('setting', compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new SettingModel;
        if ($model->edit('recharge', $this->postData('recharge'))) {
            return $this->renderSuccess('更新成功');
        }
        return $this->renderError('更新失败');
    }

}
