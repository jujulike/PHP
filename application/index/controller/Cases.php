<?php
namespace app\index\controller;

/**
 * 案例展示
 */
class Cases extends Controller
{
    public function index()
    {
		$set['title'] = '案例体验 — 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'cases';
		$this->assign('set', $set);
		return $this->fetch('index');
    }
}
