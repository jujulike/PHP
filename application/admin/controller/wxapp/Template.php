<?php
namespace app\admin\controller\wxapp;
use app\admin\controller\Controller;
use app\admin\model\Config as ConfigModel;
use app\admin\model\Template as TemplateModel;
/**
 * 模板管理
 */
class Template extends Controller
{
	/**
     * 模板列表
     */
    public function index()
    {
        $model = new TemplateModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    /**
     * 删除
     */
    public function delete($template_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = TemplateModel::detail($template_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new TemplateModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 新增记录
        if ($model->add($this->postData('template'))) {
            return $this->renderSuccess('添加成功', url('wxapp.template/index'));
        }
        return $this->renderError('添加失败');
    }

    /**
     * 编辑
     */
    public function edit($template_id)
    {
        // 分类详情
        $model = TemplateModel::detail($template_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('template'))) {
            return $this->renderSuccess('更新成功', url('wxapp.template/index'));
        }
        return $this->renderError('更新失败');
    }
	
    /**
     * 模板列表
     */
    public function template()
    {
		$config = ConfigModel::detail();
		$url = 'https://api.weixin.qq.com/wxa/gettemplatelist?access_token='.$config['component_access_token'];
		$result = json_decode(curl($url),true);
		if($result['errcode']!=0){
			$this->error('未发布，或第三方参数错误', 'setting/index');
			return false;
		}
		$list = $result['template_list'];
        return $this->fetch('template', compact('list'));
    }

    /**
     * 删除模板
     */
    public function deleteTemplate($template_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
		$config = ConfigModel::detail();
		$url = 'https://api.weixin.qq.com/wxa/deletetemplate?access_token='.$config['component_access_token'];
		$data = '{"template_id":'.$template_id.'}';
		$result = json_decode(http_request($url,$data),true);
		if($result['errcode']!=0){
				return $this->renderError('删除失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
		return $this->renderSuccess('删除成功');
    }
	
	/**
     * 草稿列表
     */
    public function draft($draft_id=0)
    {	
		if($draft_id===0){
			//显示草稿模板列表
			$config = ConfigModel::detail();
			$url = 'https://api.weixin.qq.com/wxa/gettemplatedraftlist?access_token='.$config['component_access_token'];
			$result = json_decode(curl($url),true);
			if($result['errcode']!=0){
				$this->error('未发布，或第三方参数错误', 'setting/index');
				return false;
			}
			$list = $result['draft_list'];
			return $this->fetch('draft', compact('list'));
		}else{
			if($err = is_power('admin')){
				$this->error($err, 'wxapp.template/draft');
				return false;
			}
			//把草稿添加到模板库
			$config = ConfigModel::detail();
			$url = 'https://api.weixin.qq.com/wxa/addtotemplate?access_token='.$config['component_access_token'];
			$data = '{"draft_id":'.$draft_id.'}';
			$result = json_decode(http_request($url,$data),true);
			if($result['errcode']!=0){
				$this->error('添加失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg'], 'wxapp.template/draft');
				return false;
			}
			$this->error('添加成功', 'wxapp.template/template');
		}
    }

}
