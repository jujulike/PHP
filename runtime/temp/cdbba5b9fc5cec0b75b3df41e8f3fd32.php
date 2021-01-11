<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"D:\www\ppp\PHP/application/index\view\product\take.php";i:1576498497;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $set['title']?></title>
	<meta name="author" content="<?= $web['web_name']?>">
	<meta name="keywords" content="<?= $web['web_keywords']?>">
	<meta name="description" content="<?= $web['web_description']?>">
	<link rel="icon" href="assets/icon.png" type="image/x-icon">
	<link rel="stylesheet" href="assets/index/css/swiper.min.css">
	<link rel="stylesheet" href="assets/index/css/main.css">
	<link rel="stylesheet" href="assets/layui/css/layui.css">
	<script type="text/javascript" src="assets/index/js/hm.js"></script>
	<script type="text/javascript" src="assets/index/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="assets/index/js/query-city.js"></script>
	<script type="text/javascript" src="assets/layui/layui.js"></script>
	<script type="text/javascript" src="assets/index/js/comon.js"></script>
</head>
<body>
<script>
layui.use('element', function(){
  var element = layui.element;
});
</script>
<div class="section header-bg" id="header-bg">
	<ul class="layui-nav" lay-filter="">
		<li class="nav-logo"><img src="assets/index/index-logo.png"></li>
				<li class="layui-nav-item <?= $set['nav']==='index'?'layui-this':''?>"><a href="index.php">首页</a></li>
				<li class="layui-nav-item <?= $set['nav']==='product'?'layui-this':''?>">
					<a href="javascript:;">产品</a>
					<dl class="layui-nav-child"> <!-- 二级菜单 -->
					  <dd><a href="food.php">扫码点餐</a></dd>
					  <dd><a href="take.php">外卖小程序</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item <?= $set['nav']==='joins'?'layui-this':''?>"><a href="joins.php">招商加盟</a></li>
				<li class="layui-nav-item <?= $set['nav']==='device'?'layui-this':''?>"><a href="device.php">智能设备</a></li>
				<li class="layui-nav-item <?= $set['nav']==='cases'?'layui-this':''?>"><a href="cases.php">案例体验</a></li>
				<li class="layui-nav-item <?= $set['nav']==='down'?'layui-this':''?>"><a href="down.php">下载</a></li>
				<li class="layui-nav-item <?= $set['nav']==='about'?'layui-this':''?>"><a href="about.php">关于我们</a></li>
			</ul>
			<?php if($store['is_login']):?>
				<ul class="layui-nav layui-layout-right">
				  <li class="layui-nav-item">
					<a href="javascript:;">
					  <img src="assets/index/head.jpg" class="layui-nav-img">
					  <?= $store['user']['user_name']?>
					</a>
					<dl class="layui-nav-child">
						<dd><a href="user.php">应用列表</a></dd>
						<dd><a href="">基本资料</a></dd>
						<dd><a href="<?= url('user/renew')?>">修改密码</a></dd>
					</dl>
				  </li>
				  <li class="layui-nav-item"><a href="<?= url('login/logout')?>">退出</a></li>
				</ul>
			<?php else:?>
				<div class="nav-login layui-btn-container layui-layout-right">
				<a href="login.php" class="layui-btn layui-btn-normal layui-btn-sm"> 登 陆 </a>
				<a href="regist.php" class="layui-btn layui-btn-normal layui-btn-sm"> 注 册 </a>
				<a href="admin.php"  target="_blank" class="layui-btn layui-btn-normal layui-btn-sm"> 演 示 </a>
				</div>
			<?php endif;?>
</div>
<!-- 内容区域 start -->
<div>
        <div class="section">
	<div class="swiper-container" style="background-color: #35394a; height: 500px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner-10.jpg') no-repeat center center">
				<h1 class="banner-title warp-5">搭建真正属于自已的<em>零佣金</em>外卖小程序</h1>
				<p class="banner-info warp-5">面向实体餐饮门店，简单高效的门店经营和在线营销工具</p>
				<a href="#" class="btn-takeaway red">免费试用</a>
				<a href="#" class="btn-takeaway white">商家登录</a>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section">
	<div class="main" style="width:1000px;">
		<div class="title">
			<p class="h1">外卖接单神器，快捷高效</p>
			<p class="small">自己的外卖平台，再不用多个平台跳转，统计分析更准确</p>
		</div>
		<div class="device-box mg-top clearfix">
			<div class="left fl"><img src="assets/index/img/banner-11.png"></div>
			<div class="right fr pt-20 tal">
				<h1>拥有自己的外卖平台</h1>
				<p>顾客点单，商家接单支持在线支付，货到付款商家后台自主管理店铺信息，专门负责餐厅所有外卖订单含第三方订单接收、管理，再有不用多个平台跳转，统计分析更准确！</p>
				<ul class="tac big">
					<li><img src="assets/index/img/wm-icon1.png"><p>自定义配送区域</p></li>
					<li><img src="assets/index/img/wm-icon2.png"><p>支持第三方配送</p></li>
					<li><img src="assets/index/img/wm-icon3.png"><p>支持活动促销</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section back-img" style="background-image: url('assets/index/img/banner-12.jpg'); z-index: 10; height: 743px;">
	<div class="main" style="position: relative; padding-bottom: 10px; ">
		<div class="title white">
			<p class="h1">为什么要做外卖小程序</p>
			<p>客户是自己的，流量是自己的，小程序也是自己的，实现回头客经营</p>
		</div>
		<div class="takeaway-table">
			<table>
				<tbody>
					<tr>
						<th class="small"></th>
						<th class="fwb"><img src="assets/index/img/true2.png"> 外卖小程序</th>
						<th class="fwb"><img src="assets/index/img/false2.png"> 第三方平台</th>
					</tr>
					<tr>
						<td class="fwb">竞争情况</td>
						<td>客户直接进入自己的小程序，不会跳到其他竞争对手页面</td>
						<td>通过平台检索功能即可对拼，竞争惨烈</td>
					</tr>
					<tr>
						<td class="fwb">客户私有化</td>
						<td>客户是自己的，流量是自己的、小程序也是自己的，实现回头客经营</td>
						<td>客户、流量都是平台的，客户随时跑到其他店铺消费</td>
					</tr>
					<tr>
						<td class="fwb">入口方面</td>
						<td>外卖小程序拥有独立店铺二维码，小程序码、太阳码，附近的小程序、公众号关联等，多端入口，全网营销</td>
						<td>平台入口，没有其他入口，你自己的老客户也成了平台的客户</td>
					</tr>
					<tr>
						<td class="fwb">营销方式</td>
						<td>外卖的特色化营销，让菜品保准化，让营销丰富化，让买单便捷化，如：满减活动、优惠券、充值送优惠</td>
						<td>平台营销，如果还做优惠活动基本要亏本做</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="section gray">
	<div class="main">
		<div class="title">
			<p class="h1">码点餐外卖功能</p>
			<p>实时监控配送情况，灵活手动调度订单，高效完成配送</p>
		</div>
		<div class="function-list">
			<ul>
				<li>
					<img src="assets/index/img/wake-icon4.png">
					<h1>实时接单</h1>
					<p>商家实时接单，通过订单调度中心，实时监控配送情况，灵活手动调度订单，高效完成配送</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon5.png">
					<h1>支付方式</h1>
					<p>用户可通过线上微信支付，线下货到付款的方式，轻松完成小程序外卖下单，不一样的下单体验</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon6.png">
					<h1>会员管理</h1>
					<p>会员信息触手可得，方便查找，高效会员营销推广，各种营销方案尽在手中</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon7.png">
					<h1>数据统计</h1>
					<p>会员统计、订单统计、销售统计、详细的订单数据统计，一目了然</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon8.png">
					<h1>订单管理</h1>
					<p>后台轻松管理订单，方便查看订单号、总额、支付状态等信息</p>
					</li>
				<li>
					<img src="assets/index/img/wake-icon9.png">
					<h1>客户维系</h1>
					<p>轻松管理公众号粉丝，可积累的客户数据，客户通过关注注册，后台即可生成用户管理数据</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon10.png">
					<h1>营销工具</h1>
					<p>优惠券、满减活动、限时抢购、充值送优惠等可随意组合，在吸粉引流的同时刺激客户直接消费</p>
				</li>
				<li>
					<img src="assets/index/img/wake-icon11.png">
					<h1>多样配送</h1>
					<p>可选择商家自主配送，上门自提，第三方配送，提高配送效率，降低配送成本</p>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="section">
	<div class="main" style="height:320px;">
		<div class="new-ad clearfix">
			<div class="ad-code fl">
				<img src="assets/index/downApp.png">
				<p>扫一扫，下载App</p>
			</div>
			<div class="ad-right fr">
				<h1>1天不到3元</h1>
				<p>咨询电话：15252131510</p>
				<a href="#">免费试用</a>
			</div>
		</div>
	</div>
</div>
</div>
<!-- 内容区域 end -->
<div class="section foot">
    <div class="bottom-info">
        <h1>扫码点餐加盟代理开放招商中</h1>
        <a href="joins.php">申请加盟</a>
    </div>
</div>
<div class="section">
    <div class="foot-nav-box">
        <div class="foot-nav">
            <div class="nav-list">
                <p>客服热线：<?= $web['component_phone']?> &nbsp;&nbsp;周一到周日：9:00-17:30 &nbsp;&nbsp;总部：<?= $web['web_address']?></p>
                <a href="joins.php">加盟代理</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="food.php">点餐小程序</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="take.php">外卖小程序</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="shop.php">商城小程序</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="city.php">同城小程序</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="shop.php">微商小程序</a>&nbsp;&nbsp;&nbsp;丨&nbsp;&nbsp;&nbsp;
				<a target="_blank" href="joins.php">定制小程序</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p style="margin-bottom: 0;">《中华人民共和国增值电信业务经营许可证》 <?= $web['web_icp']?>&nbsp;&nbsp; ©2016-2019 &nbsp;<?= $web['web_domain']?>&nbsp;<?= $web['web_name']?>&nbsp;版权所有  </p>
            </div>
            <div class="downApp">
                <img src="assets/index/downApp.png">
                <p>体验扫码点餐</p>
            </div>
        </div>
    </div>
</div>
<script src="assets/index/js/swiper.min.js"></script>
<script src="assets/index/js/common.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        autoplay: true,
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });
    var swipers = new Swiper('.swiper-container-item', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
</body>
</html>