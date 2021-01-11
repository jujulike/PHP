<?php
namespace app\api\controller;
use app\api\model\Wxapp as WxappModel;
use app\api\model\WxappPage as WxappPageModel;
use app\api\model\WxappHelp;

/**
 * 微信小程序
 */
class Wxapp extends Controller
{
    /**
     * 小程序基础信息
     */
    public function base()
    {
        $wxapp = WxappModel::getWxappCache();
		$wxapp['navbar'] = WxappPageModel::diyPage()['page_data']['array']['page'];
        return $this->renderSuccess(compact('wxapp'));
    }

    /**
     * 帮助中心
     */
    public function help()
    {
        $model = new WxappHelp;
        $list = $model->getList();
        return $this->renderSuccess(compact('list'));
    }

}
