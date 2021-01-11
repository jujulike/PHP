<?php
namespace app\store\controller\user;
use app\store\controller\Controller;
use app\store\model\UserGrade as UserGradeModel;

/**
 * 用户等级
 */
class Grade extends Controller
{
    /**
     * 用户等级列表
     */
    public function index()
    {
        $model = new UserGradeModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new UserGradeModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('grade'))) {
            return $this->renderSuccess('添加成功', url('user.grade/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 更新
     */
    public function edit($user_grade_id)
    {
        // 帮助详情
        $model = UserGradeModel::detail($user_grade_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('grade'))) {
            return $this->renderSuccess('更新成功', url('user.grade/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($user_grade_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = UserGradeModel::detail($user_grade_id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
