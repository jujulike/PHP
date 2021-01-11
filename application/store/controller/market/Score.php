<?php
namespace app\store\controller\market;

use app\store\controller\Controller;
use app\store\model\Setting as SettingModel;
use app\store\model\UserScore as UserScoreModel;

/**
 * 积分设置控制器
 */
class Score extends Controller
{
    public function setting()
    {
        if (!$this->request->isAjax()) {
            $values = SettingModel::getItem('score');
            return $this->fetch('setting', compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new SettingModel;
        if ($model->edit('score', $this->postData('score'))) {
            return $this->renderSuccess('更新成功');
        }
        return $this->renderError('更新失败');
    }
	
	/**
     * 获取页面列表
     */
    public function logs()
    {
        $model = new UserScoreModel;
        $list = $model->getList();
        return $this->fetch('logs', compact('list'));
    }

}
