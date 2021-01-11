<?php

namespace app\index\controller;

use think\Config;
use think\Session;
use think\Cookie;
use app\index\model\Config as ConfigModel;

/**
 * 用户控制器基类
 */
class Controller extends \think\Controller
{
    protected $store;			//用户登录信息
    protected $store_user_id;	//用户ID
    protected $controller = '';	//当前控制器名称
    protected $action = '';		//当前方法名称
    protected $routeUri = '';	//当前路由uri
    protected $group = '';		//当前路由：分组名称
	
	/* 登录验证白名单 */
    protected $allowAllAction = [
        'index/index',	// 首页
		'about/index',	// 关于我们
		'cases/index',	// 案例展示
		'device/index',	// 智能设备
		'joins/index',	// 招商加盟
		'login/index',	// 用户登录
		'down/index',	// 下载
		'product/food',	// 点餐
		'product/take',	// 外卖
		'regist/index',	// 用户注册
    ];

    /**
     * 后台初始化
     */
    public function _initialize()
    {
        $this->store = Session::get('hema_store');	// 用户登录信息
        $this->store_user_id = $this->getStoreUserId();	// 用户ID
        $this->getRouteinfo();	// 当前路由信息
        $this->checkLogin();	// 验证登录
        $this->layout();		// 全局layout
    }

    /**
     * 全局layout模板输出
     */
    private function layout()
    {
        // 输出到view
        $this->assign([
            'base_url' => base_url(), 	// 当前域名
            'web' => ConfigModel::detail(),	// 当前商城设置
            //'store_url' => url('/index'),              // 后台模块url
            'group' => $this->group,
            //'menus' => $this->menus(),                     // 菜单
            'store' => $this->store,                       // 商家登录信息
        ]);
    }

    /**
     * 解析当前路由参数 （分组名称、控制器名称、方法名）
     */
    protected function getRouteinfo()
    {
        // 控制器名称
        $this->controller = toUnderScore($this->request->controller());
        // 方法名称
        $this->action = $this->request->action();
        // 控制器分组 (用于定义所属模块)
        $groupstr = strstr($this->controller, '.', true);
        $this->group = $groupstr !== false ? $groupstr : $this->controller;
        // 当前uri
        $this->routeUri = $this->controller . '/' . $this->action;
    }
	
	/**
     * 验证登录状态
     */
    private function checkLogin()
    {
        // 验证当前请求是否在白名单
        if (in_array($this->routeUri, $this->allowAllAction)) {
            return true;
        }
		// 验证登录状态
        if (empty($this->store)
            || (int)$this->store['is_login'] !== 1
        ) {
			$this->error('您还没有登录', '/login.php');
            return false;
        }
        return true;
    }
	
	/**
     * 获取当前store_user_id
     */
    protected function getStoreUserId()
    {
        return $this->store['user']['store_user_id'];
    }

    /**
     * 返回封装后的 API 数据到客户端
     */
    protected function renderJson($code = 1, $msg = '', $url = '', $data = [])
    {
        return compact('code', 'msg', 'url', 'data');
    }

    /**
     * 返回操作成功json
     */
    protected function renderSuccess($msg = 'success', $url = '', $data = [])
    {
        return $this->renderJson(1, $msg, $url, $data);
    }

    /**
     * 返回操作失败json
     */
    protected function renderError($msg = 'error', $url = '', $data = [])
    {
        return $this->renderJson(0, $msg, $url, $data);
    }

    /**
     * 获取post数据 (数组)
     */
    protected function postData($key)
    {
        return $this->request->post($key . '/a');
    }

}
