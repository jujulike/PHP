<?php

namespace app\admin\controller;

use app\admin\model\Config as ConfigModel;

/**
 * 站点配置
 */
class Setting extends Controller
{
    /**
     * 站点设置
     */
    public function index()
    {
        $model = ConfigModel::detail();
        if ($this->request->isAjax()) {
			if($err = is_power('admin')){
				return $this->renderError($err);
			}
            if ($model->edit($this->postData('config'))){
				return $this->renderSuccess('更新成功');
			}
            return $this->renderError('更新失败');
        }
        return $this->fetch('index', compact('model'));
    }

}
