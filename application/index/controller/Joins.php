<?php
namespace app\index\controller;

/**
 * 招商加盟
 */
class Joins extends Controller
{
    public function index()
    {
		$set['title'] = '招商加盟 — 永久免费的微信小程序|扫码点餐小程序|外卖小程序|商城小程序|同城小程序|微商小程序|定制小程序';
		$set['nav'] = 'joins';
		$this->assign('set', $set);
		return $this->fetch('index');
    }
}
