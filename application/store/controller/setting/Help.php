<?php
namespace app\store\controller\setting;

use app\store\controller\Controller;

/**
 * 站点帮助
 */
class Help extends Controller
{
    public function index()
    {
		
    }

    /**
     * 物流公司
     */
    public function company()
    {
        return $this->fetch('company');
    }
	
	/**
     * 模板消息
     */
    public function tplmsg()
    {
        return $this->fetch('tplmsg');
    }
	
	/**
     * 页面链接
     */
    public function links()
    {
        return $this->fetch('links');
    }

}
