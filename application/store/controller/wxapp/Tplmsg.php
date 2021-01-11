<?php

namespace app\store\controller\wxapp;

use app\store\controller\Controller;
use app\store\model\Tplmsg as TplmsgModel;

/**
 * 小程序模板消息
 */
class Tplmsg extends Controller
{
    /**
     * 列表
     */
    public function index()
    {
        $model = new TplmsgModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
	
    /**
     * 添加
     */
    public function add()
    {
        $model = new TplmsgModel;
        if (!$this->request->isAjax()) {
            return $this->fetch('add', compact('list'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $tplmsg = $this->postData('tplmsg');
		//判断该类型模板是否存在
		if(TplmsgModel::detail(['tpl_type' => $tplmsg['tpl_type']])){
			return $this->renderError('您添加过了');
		}
		$result = $this->addTpl($tplmsg['tpl_type']);
		if($result['errcode']!=0){
			return $this->renderError('添加失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
		$tplmsg['template_id'] = $result['template_id']; //获取微信端组合的模板消息ID
		if(!$model->add($tplmsg)){
			return $this->renderError('添加失败');
		}
        return $this->renderSuccess('添加成功', url('wxapp.tplmsg/index'));
    }

    /**
     * 删除
     */
    public function delete($tplmsg_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
		$model = TplmsgModel::get($tplmsg_id);
		$template_id = $model['template_id'];
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
		$result = $this->delTpl($template_id);
		if($result['errcode']!=0){
			return $this->renderError('删除失败,错误代码：'.$result['errcode'].'，错误说明：'.$result['errmsg']);
		}
        return $this->renderSuccess('删除成功', url('wxapp.tplmsg/index'));
    }
	
	/**
     * 微信服务端 - 删除帐号下的某个模板
     */
	private function delTpl($template_id)
    {
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/del?access_token='.$access_token;
		$data = '{"template_id":"'.$template_id.'"}';
		return json_decode(http_request($url,$data),true);
    }
	
	/**
     * 微信服务端 - 组合模板并添加到个人模板库
     */
	private function addTpl($tpl_type)
    {
		//如果支付通知
		if($tpl_type==10){
			// 9 => 订单编号，10 => 商品名称，11 => 支付金额，6 => 支付时间
			$data = '{"id":"AT0009","keyword_id_list":[9,10,11,6]}';
		}
		//如果是发货
		if($tpl_type==20){
			// 20 => 订单编号，21 => 物流公司，22 => 物流单号，19 => 收货地址，69 => 收货人，70 => 收货人电话，3 => 发货时间
			$data = '{"id":"AT0007","keyword_id_list":[20,21,22,19,69,70,3]}';
		}
		//如果是售后
		if($tpl_type==30){
			// 16 => 售后单号，1 => 订单号，10 => 售后类型，29 => 售后状态，3 => 申请原因，2 => 申请时间
			$data = '{"id":"AT0553","keyword_id_list":[16,1,10,29,3,2]}';
		}
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/template/add?access_token='.$access_token;
		return json_decode(http_request($url,$data),true);
    }
}
