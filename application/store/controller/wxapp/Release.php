<?php

namespace app\store\controller\wxapp;

use app\store\controller\Controller;
use app\store\model\WxappTpl as WxappTplModel;
use app\store\model\Template as TemplateModel;
use app\store\model\Wxapp as WxappModel;

/**
 * 小程序模板代码发布管理
 */
class Release extends Controller
{
    /**
     * 类目列表
     */
    public function index()
    {
		$wxapp = WxappModel::detail();//获取商户配置信息
		if($wxapp['is_empower']['value']==0){
			//如果没有授权
			$this->error('您还没有绑定小程序', 'wxapp/setting');
            return false;
		}
		$model = new WxappTplModel;
        $list = $model->getList();
		$new_tpl = TemplateModel::getNew($this->store['wxapp']['app_type']['value']);//获取最新版本
		$new_tpl['status'] = 1;//有新版本,请上传
		if(0<sizeof($list)){
			for($n=0;$n<sizeof($list);$n++){
				$list[$n]['desc'] = $this->getAuditStatus($list[$n]['auditid']); //查询指定版本的审核状态
			}
			if($list[0]['template']['template_id']<$new_tpl['template_id']){
				$new_tpl['status'] = 1;//有新版本，请上传
			}
			if($list[0]['template']['template_id']==$new_tpl['template_id']){
				if($list[0]['status']==1){
					//已经上传新版本，并且发布
					$new_tpl['status'] = 0;//没有新版本
				}else{
					//已经上传新版本，但未发布
					$new_tpl['status'] = 2;//没有新版本
					$new_tpl['desc'] = $list[0]['desc'];//审核信息
				}	
			}
		}
		
        return $this->fetch('index', compact('list','new_tpl'));
    }
	
	/**
     * 编辑
     */
    public function edit($wxapp_tpl_id)
    {
        $model = WxappTplModel::detail($wxapp_tpl_id); //获取模板详情
		if($model['status']==0){
			//未发布 - 查询模板状态
			$model['desc'] = $this->getAuditStatus($model['auditid']);
		}
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $data = $this->postData('release');
		if($data['opt']==1){
			//发布小程序模板
			$result = $this->release();
			if($result['errcode']!= 0){
				return $this->renderError('发布失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
			$model['status'] = 1;//发布成功
			$model->edit($model);
			return $this->renderSuccess('发布成功', url('wxapp.release/index'));
		}
		if($data['opt']==2){
			//撤回审核
			$result = $this->undocodeaudit();
			if($result['errcode']!= 0){
				return $this->renderError('撤回失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
			}
			return $this->renderSuccess('撤回成功', url('wxapp.release/index'));
		}
        return $this->renderSuccess('正在返回', url('wxapp.release/index'));
        
    }

    /**
     * 添加与发布
     */
    public function add()
    {
		$model = new WxappTplModel;
		//获取审核时可选择的类目信息
		$result = $this->get_category();
		if($result['errcode']!= 0){
			return $this->renderError('类目获取错误,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
		if(sizeof($result['category_list'])==0){
			return $this->renderError('可用类目为空，请去添加');	
		}
		$category = $result['category_list'];//可用类目列表
		$new_tpl = TemplateModel::getNew($this->store['wxapp']['app_type']['value']);//获取最新版本
        if (!$this->request->isAjax()) {
            return $this->fetch('add', compact('category','new_tpl'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
		$tpl= $this->postData('tpl');//接收传递的类目编号
		$tpl = $category[$tpl['index']];//指定上传到哪个类目
		$wxapp = WxappModel::detail();//获取商户配置信息
		$result = $this->publish($wxapp['wxapp_id'], $wxapp['app_id'], $new_tpl);	//执行上传代码模板
		if($result['errcode']!= 0){
			return $this->renderError('上传代码失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
		$result = $this->audit($tpl);	//	提交审核,传递类目信息
		if($result['errcode']!= 0){
			return $this->renderError('提交审核失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
		$auditid = $result['auditid'];//获取审核编号
		//添加商户发布的模板记录
        $model->template = $new_tpl['template_id'];
		$model->auditid = $auditid;
		$model->wxapp_id = $wxapp['wxapp_id'];
		$model->save();
		$wxapp['template'] = $new_tpl['template_id'];//指定当前已上传新版本
		$wxapp->save();
		return $this->renderSuccess('上传成功，等待审核', url('wxapp.release/index'));
		
    }
	
	/**
     * 第一步：上传小程序模板
     */
	private function publish($wxapp_id, $app_id, $template)
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/commit?access_token='.$access_token;
		$ext = '{"extEnable":true,"extAppid":"'.$app_id.'","directCommit":false,"ext":{"uniacid":"'.$wxapp_id.'"}}';
		$ext_json = json_encode($ext);
		$data = '{"template_id":'.$template['id'].',"ext_json":'.$ext_json.',"user_version":"'.$template['user_version'].'","user_desc":"'.$template['user_desc'].'"}';
		return json_decode(http_request($url,$data),true);		
	}
	
	/**
     * 第二步：提交审核小程序模板
     */
	private function audit($tpl)
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/submit_audit?access_token='.$access_token;
		$data ='{"item_list":[{"address":"pages/index/index","first_class":"'.$tpl['first_class'].'","second_class":"'.$tpl['second_class'].'","first_id":'.$tpl['first_id'].',"second_id":'.$tpl['second_id'].',"title":"首页"}]}';
		return json_decode(http_request($url,$data),true);
	}
	
	/**
     * 获取指定版本的审核状态 - 小程序代码模板
     */
	private function getAuditStatus($auditid){
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/get_auditstatus?access_token='.$access_token;
		$data = '{"auditid":'.$auditid.'}';
		return json_decode(http_request($url,$data),true);
	}
	
	/**
     * 发布已通过审核的小程序
     */
	private function release()
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/release?access_token='.$access_token;
		$data ='{}';
		return json_decode(http_request($url,$data),true);
	}
	
	/**
	* 撤回审核中的小程序
	* 单个帐号每天审核撤回次数最多不超过 1 次，一个月不超过 10 次。
	*/
	public function undocodeaudit()
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/undocodeaudit?access_token='.$access_token;
		return json_decode(curl($url),true);
		//return curl($url);
	}
	
	/**
	* 获取审核时可填写的类目信息
	*/
	public function get_category()
	{
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/get_category?access_token='.$access_token;
		return json_decode(curl($url),true);
		//return curl($url);
	}

}
