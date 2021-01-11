<?php

namespace app\store\controller;

use app\common\library\sms\Driver as SmsDriver;
use app\store\model\Setting as SettingModel;

/**
 * 系统设置
 */
class Setting extends Controller
{
    /**
     * 商城设置
     */
    public function store()
    {
        return $this->updateEvent('store');
    }

    /**
     * 交易设置
     */
    public function trade()
    {
        return $this->updateEvent('trade');
    }

    /**
     * 短信通知
     */
    public function sms()
    {
        return $this->updateEvent('sms');
    }
	
	/**
     * 打印设置
     */
    public function printer()
    {
        return $this->updateEvent('printer');
    }
	
	/**
     * 打印设置
     */
    public function call()
    {
        return $this->updateEvent('call');
    }
	
	/**
     * 退货地址
     */
    public function address()
    {
        return $this->updateEvent('address');
    }
	
	/**
     * 模板消息
     */
    public function tplmsg()
    {
        return $this->updateEvent('tplmsg');
    }

    /**
     * 发送短信通知测试
     */
    public function smsTest($AccessKeyId, $AccessKeySecret, $sign, $msg_type, $template_code, $accept_phone)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
        $SmsDriver = new SmsDriver([
            'default' => 'aliyun',
            'engine' => [
                'aliyun' => [
                    'AccessKeyId' => $AccessKeyId,
                    'AccessKeySecret' => $AccessKeySecret,
                    'sign' => $sign,
                    $msg_type => compact('template_code', 'accept_phone'),
                ],
            ],
        ]);
        $templateParams = [];
        if ($msg_type === 'order_pay') {
            $templateParams = ['order_no' => '2018071200000000'];
        }
        if ($SmsDriver->sendSms($msg_type, $templateParams, true)) {
            return $this->renderSuccess('发送成功');
        }
        return $this->renderError('发送失败 ' . $SmsDriver->getError());
    }

    /**
     * 上传设置
     */
    public function storage()
    {
        return $this->updateEvent('storage');
    }

    /**
     * 更新商城设置事件
     */
    private function updateEvent($key)
    {
        if (!$this->request->isAjax()) {
            $values = SettingModel::getItem($key);
            return $this->fetch($key, compact('values'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        $model = new SettingModel;
        if ($model->edit($key,$this->postData($key))) {
            return $this->renderSuccess('更新成功');
        }
        return $this->renderError('更新失败');
    }

}
