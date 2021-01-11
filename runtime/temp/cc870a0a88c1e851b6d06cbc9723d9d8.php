<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:52:"D:\www\ppp\PHP/application/index\view\down\index.php";i:1576498554;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
	<div class="swiper-container" style="background-color: #35394a; height: 701px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner-4.jpg') no-repeat center center">
				<h1 class="banner-title warp-4">下载河马点餐PC端</h1>
				<p class="banner-info warp-4">乐享移动点餐、快捷、高端，随时随<br>地让您的点餐体验高大上</p>
				<div class="down-btn-box">
					<a href="#" class="down-btn">
						<img src="assets/index/img/a.png" class="img a">
						<img src="assets/index/img/b.png" class="img b">
                        XP下载
                    </a>
					<a href="#" class="down-btn">
						<img src="assets/index/img/a.png" class="img a">
						<img src="assets/index/img/b.png" class="img b">
                        win7以上下载
                    </a>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section" style="overflow: hidden; height: 790px;">
	<div class="main">
		<div class="title">
			<p class="h1">高端门店该有的一切</p>
			<p class="small">
				河马点餐收银系统多平台统一设计，采用扁平化界面并重新设计功能布局， 为您快速提升收银效率。
                收银从此成为一种享受！将从软件到硬件，随时随地的掌握门店消息，这一切使用无线连接 ，你
                的前台从未如此优雅。
            </p>
			<img src="assets/index/img/pc-1.png" class="img">
		</div>
	</div>
</div>
<div class="section" style="overflow: hidden; max-height: 720px;">
	<img src="assets/index/img/pc-2.jpg" class="imgWarp">
</div>
<div class="section gray" style="height:544px;">
	<div class="main">
		<div class="title" style="color:#fff;">
			<p class="h1">管理功能</p>
			<p>打造门店全新运营模式让生意简单，高效，智能，不用到店就能掌握店 内营业情况。</p>
		</div>
		<div class="management-list">
			<ul>
				<li>
					<img src="assets/index/img/pc-icon1.png" alt="">
					<p class="h1">点餐</p>
					<p>开台、拼桌、换桌、点菜、退菜、催菜、稍后上菜、撤单、存单、取单等。</p>
				</li>
				<li>
					<img src="assets/index/img/pc-icon2.png" alt="">
					<p class="h1">结账</p>
					<p>现金、微信支付、支付宝支付、店内优惠、会员优惠等</p>
				</li>
				<li>
					<img src="assets/index/img/pc-icon3.png" alt="">
					<p class="h1">外卖</p>
					<p>外卖菜品与店内菜品打通，手动接单，自动接单自由切换，厨房自动打印出票，外卖自动接单、外卖订单查询等</p>
				</li>
				<li>
					<img src="assets/index/img/pc-icon4.png" alt="">
					<p class="h1">管理</p>
					<p>交班、日结、昨日结账、近30天的营业额、订单查询、打印菜品销售报表等。</p>
				</li>
				<li>
					<img src="assets/index/img/pc-icon5.png" alt="">
					<p class="h1">一店多收银台</p>
					<p>支持快餐多通道，正餐多区域同步点餐结账</p>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="section back-img" style="background-image: url('assets/index/img/pc-3.jpg'); z-index: 10;">
	<div class="main" style="position: relative; padding-bottom: 10px; padding-top: 30px;">
		<div class="title white" style="margin-top: 160px">
			<p class="h1" style="font-size: 45px;">在家也能掌握门店消息</p>
			<p class="" style="font-size: 27px; line-height:50px; font-weight:100">
				降低人工成本60%在家就能管理门店，随时随地查看 销售单据、库存信息和值班<br> 
				人员，甚至设计一个节日促销活动。店里的访客变成了回头客。
			</p>
		</div>
	</div>
</div>
<div class="section white">
	<div class="main">
		<div class="title white">
			<p class="h1" style="font-size: 40px; color: #333;">让你的餐饮变得更加简捷!</p>
		</div>
		<div class="down-btn-box warp">
			<a href="javascript:downPc(&#39;WinXP&#39;);" class="down-btn">
				<img src="assets/index/img/a.png" class="a img">
				<img src="assets/index/img/b.png" class="b img">
                XP下载
            </a>
			<a href="#" class="down-btn">
				<img src="assets/index/img/a.png" class="a img">
				<img src="assets/index/img/b.png" class="b img">
                win7以上下载
            </a>
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