<?php
namespace app\admin\controller;

/**
 * 后台首页
 */
class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }
}
