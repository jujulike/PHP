<?php
namespace app\store\controller\wxapp;
use app\store\controller\Controller;
use app\store\model\Category;
use app\store\model\WxappPage as WxappPageModel;
use app\store\model\Wxapp as WxappModel;

/**
 * 小程序页面管理
 */
class Page extends Controller
{
    /**
     * 获取页面列表
     */
    public function index()
    {
        $model = new WxappPageModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 添加
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
			$temp = WxappPageModel::temp()['json'];
			$opts = array();
            $jsonData = WxappPageModel::page()['json'];
            return $this->fetch('add', compact('temp','jsonData','opts'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new WxappPageModel;
        if ($model->add($this->postData('data'))) {
            return $this->renderSuccess('添加成功', url('wxapp.page/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($page_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = WxappPageModel::get($page_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     */
    public function edit($page_id)
    {
        // 详情
        $model = WxappPageModel::detail($page_id);
        if (!$this->request->isAjax()) {
			$temp = WxappPageModel::temp()['json'];
			$opts['catgory'] = Category::getCacheTree();//获取商品分类
			$opts['sharingCatgory'] ='';
			$opts['articleCatgory'] ='';
			$opts = json_encode($opts); //转换成json格式
            $jsonData = $model['page_data']['json'];
            return $this->fetch('edit', compact('temp','jsonData','opts'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $data = $this->postData('data');
        if (!$model->edit($data)) {
            return $this->renderError('更新失败');
        }
        return $this->renderSuccess('更新成功');
    }
	
	/**
     * 设置默认首页
     */
	public function sethome($page_id)
    {
        if($err = is_power()){
			return $this->renderError($err);
		}
        $model = WxappPageModel::detail($page_id);
        if ($model->sethome($model, $page_id)) {
            return $this->renderSuccess('设置成功',url('wxapp.page/index'));
        }
		return $this->renderError('设置失败');
    }
	
	/**
     * 分类页样式设置
     */
    public function category()
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
		$wxapp = WxappModel::detail();
        if ($this->request->isAjax()) {
            $data = $this->postData('wxapp');
            if ($wxapp->edit($data)) return $this->renderSuccess('更新成功');
            return $this->renderError('更新失败');
        }
        return $this->fetch('category', compact('wxapp'));
    }

}
