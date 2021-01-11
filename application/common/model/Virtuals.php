<?php
namespace app\common\model;

/**
 * 虚拟用户模型
 */
class Virtuals extends BaseModel
{
    protected $name = 'virtuals';
	
    /**
     * 头像
     */
    public function getAvatarurlAttr($value)
    {
		$virtuals_id = rand(10001,10150);//生成10001到10150之间的随机数
        return base_url().'assets/head/'.$virtuals_id.'.jpg';
    }
	
	/**
     * 在做什么
     */
    public function getDoingAttr($value)
    {
        $status = [
			0=>'浏览商品',
			1=>'进行了下单',
			2=>'加入购物车',
			3=>'进行了收藏',
			4=>'推荐给好友',
			5=>'转发到群',
			6=>'付款买单',
			7=>'进行了充值',
			8=>'开通了会员'
		];
		$value = rand(0,8);
		$time = rand(1,30);
        return $time.'分钟前,'.$status[$value];
    }
	
    /**
     * 获取随机虚拟用户
     */
    public function getList()
    {
		$n = 5;//获取数量
		$list = array();
		for($i=0;$i<$n;$i++){
			$m = rand(10001,10150);//生成10001到10150之间的随机数
			$list[$i] = $this->useGlobalScope(false)->find($m);
		}
        return $list;
    }

}
