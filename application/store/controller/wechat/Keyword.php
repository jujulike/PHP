<?php
namespace app\store\controller\wechat;
use app\store\controller\Controller;
use app\store\model\Keyword as KeywordModel;
use app\store\model\Setting as SettingModel;

/**
 * 关键字回复控制器
 */
class Keyword extends Controller
{
	/**
     * 首页
     */
    public function index()
    {
        $model = new KeywordModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
	
	/**
     * 添加
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
			//获取默认数据
			$model = new SettingModel;
			$values = $model->defaultData();
			$values['subscribe']['values']['keyword'] = '';
			$values = json_encode($values['subscribe']['values']);
            return $this->fetch('add', compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new KeywordModel;
        if ($model->add($this->postData('data'))) {
            return $this->renderSuccess('添加成功', url('wechat.keyword/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除
     */
    public function delete($keyword_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = KeywordModel::get($keyword_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 编辑
     */
    public function edit($keyword_id)
    {
        $model = KeywordModel::get($keyword_id);
        if (!$this->request->isAjax()) {
            $values = json_encode($model);
            return $this->fetch('edit', compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('data'))) {
            return $this->renderSuccess('更新成功', url('wechat.keyword/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
	
	/**
     * 状态编辑
     */
    public function isOpen($keyword_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = KeywordModel::get($keyword_id);
        // 更新记录
        if ($model->isOpen()) {
            return $this->renderSuccess('更新成功', url('wechat.keyword/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
