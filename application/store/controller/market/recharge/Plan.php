<?php

namespace app\store\controller\market\recharge;

use app\store\controller\Controller;
use app\store\model\RechargePlan as RechargePlanModel;

/**
 * 用户充值套餐控制器
 */
class Plan extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new RechargePlanModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new RechargePlanModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('plan'))) {
            return $this->renderSuccess('添加成功', url('market.recharge.plan/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 更新
     */
    public function edit($recharge_plan_id)
    {
        // 帮助详情
        $model = RechargePlanModel::detail($recharge_plan_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('plan'))) {
            return $this->renderSuccess('更新成功', url('market.recharge.plan/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($recharge_plan_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 详情
        $model = RechargePlanModel::detail($recharge_plan_id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
