<?php
namespace app\store\controller\market;
use app\store\controller\Controller;
use app\store\model\Activity as ActivityModel;

/**
 * 优惠活动控制器
 */
class Activity extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new ActivityModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new ActivityModel;
        if ($model->add($this->postData('activity'))) {
            return $this->renderSuccess('添加成功', url('market.activity/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($activity_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = ActivityModel::detail($activity_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     */
    public function edit($activity_id)
    {
        // 详情
        $model = ActivityModel::detail($activity_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('activity'))) {
            return $this->renderSuccess('更新成功', url('market.activity/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
