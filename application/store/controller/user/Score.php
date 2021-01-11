<?php

namespace app\store\controller\user;

use app\store\controller\Controller;
use app\store\model\UserScore as UserScoreModel;

/**
 * 用户等级
 */
class Score extends Controller
{
    /**
     * 用户积分明细列表
     */
    public function index()
    {
        $model = new UserScoreModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

}
