<?php
namespace app\api\controller\user;
use app\api\controller\Controller;
use app\api\model\Order as OrderModel;

/**
 * 个人中心主页
 */
class Index extends Controller
{
    /**
     * 获取当前用户信息
     */
    public function detail()
    {
        // 当前用户信息
        $userInfo = $this->getUser();
        // 订单总数
        $model = new OrderModel;
        $orderCount = [
            'payment' => $model->getCount($userInfo['user_id'], 'payment'),
			'delivery' => $model->getCount($userInfo['user_id'], 'delivery'),
            'received' => $model->getCount($userInfo['user_id'], 'received'),
        ];
        return $this->renderSuccess(compact('userInfo', 'orderCount'));
    }

}
