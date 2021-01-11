<?php
namespace app\store\controller;
use app\store\model\User as UserModel;
use app\store\model\UserGrade as UserGradeModel;
use think\Cache;

/**
 * 用户管理
 */
class User extends Controller
{
    /**
     * 用户列表
     */
    public function index($user_grade_id='', $gender='', $search='')
    {
        $model = new UserModel;
        $list = $model->getList($user_grade_id, $gender, $search);
		$model = new UserGradeModel;
		$grade = $model->getList();
        return $this->fetch('index', compact('list','grade'));
    }
	
	/**
     * 用户充值
	 *$recharge 接收表单数据（数组）
	 *$source 0为充值余额，1为充值积分
    */
    public function recharge($user_id,$recharge,$source)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new UserModel;
		if($model->recharge($user_id,$recharge,$source)){
			return $this->renderSuccess('充值成功', url('user/index'));
		}
        $error = $model->getError() ?: '充值失败';
        return $this->renderError($error);
		
    }

}
