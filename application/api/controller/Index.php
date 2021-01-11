<?php
namespace app\api\controller;
use app\api\model\WxappPage;
use app\api\model\Goods as GoodsModel;
use app\api\model\Virtuals as VirtualsModel;
/**
 * 首页控制器
 */
class Index extends Controller
{
    /**
     * 首页diy数据
     */
    public function page()
    {
        // 页面元素
        $wxappPage = WxappPage::diyPage();
        $items = $wxappPage['page_data']['array']['items'];
		if($this->app_type==20){
			// 新品推荐
			$model = new GoodsModel;
			$newest = $model->getNewList();
			// 猜您喜欢
			$best = $model->getBestList();
			// 虚拟用户
			$model = new VirtualsModel();
			$virtuals = $model->getList();
			return $this->renderSuccess(compact('items', 'newest', 'best','virtuals'));			
		}
		return $this->renderSuccess(compact('items'));
    }

}
