<?php
namespace app\api\controller\market;

use app\api\controller\Controller;
use app\api\model\Activity as ActivityModel;
/**
 * 优惠活动控制器
 */
class Activity extends Controller
{
	/**
     * 获取优惠活动列表
     */
    public function lists()
    {
		$model = new ActivityModel;
		$list = $model->lists();
        return $this->renderSuccess(compact('list'));
    }

}
