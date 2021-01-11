<?php
namespace app\index\controller;

/**
 * 产品
 */
class Product extends Controller
{
	//点餐
    public function food()
    {
		$set['title'] = '扫码点餐 — 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'product';
		$this->assign('set', $set);
		return $this->fetch('food');
    }
	
	//外卖
    public function take()
    {
		$set['title'] = '外卖小程序 — 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'product';
		$this->assign('set', $set);return $this->fetch('take');
    }
}
