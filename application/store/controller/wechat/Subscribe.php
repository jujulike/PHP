<?php
namespace app\store\controller\wechat;
use app\store\controller\Controller;
use app\store\model\Setting as SettingModel;

/**
 * 被关注设置
 */
class Subscribe extends Controller
{
    /**
     * 被关注回复设置
     */
    public function reply()
    {
        if (!$this->request->isAjax()) {
            $values = json_encode(SettingModel::getItem('subscribe'));
            return $this->fetch('reply', compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new SettingModel;
        if ($model->edit('subscribe',$this->postData('data'))) {
            return $this->renderSuccess('更新成功');
        }
        return $this->renderError('更新失败');
    }

}
