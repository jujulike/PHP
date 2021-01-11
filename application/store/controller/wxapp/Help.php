<?php
namespace app\store\controller\wxapp;
use app\store\controller\Controller;
use app\store\model\WxappHelp as WxappHelpModel;

/**
 * 小程序帮助中心
 */
class Help extends Controller
{
    /**
     * 帮助中心列表
     */
    public function index()
    {
        $model = new WxappHelpModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加帮助
     */
    public function add()
    {
        $model = new WxappHelpModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('help'))) {
            return $this->renderSuccess('添加成功', url('wxapp.help/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 更新帮助
     */
    public function edit($help_id)
    {
        // 帮助详情
        $model = WxappHelpModel::detail($help_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('help'))) {
            return $this->renderSuccess('更新成功', url('wxapp.help/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($help_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 帮助详情
        $model = WxappHelpModel::detail($help_id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
