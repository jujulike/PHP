<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"D:\www\ppp\PHP/application/index\view\device\index.php";i:1576497181;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner-9.jpg') no-repeat center center">
				<div class="unusual-header-title">
					<div class="title-box warp">
						<h1>简单易学，餐饮收款</h1>
						<p>所有功能一目了然。码点餐收银系统让你分分钟上手，开店再也不是难事，一机搞定所有问题！</p>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section">
	<div class="main clearfix" style="width:1135px;">
		<div class="device-box">
			<div class="fl left"><img src="assets/index/img/device-img1.png"></div>
			<div class="fr right pt-60">
				<h1>AIOO点餐收银机</h1>
				<p>双屏高清，搭载码点餐与收银系统，一机就可完成点餐和收银操作，多USB接口，可对接外部扩展设备，适用于全餐饮场景</p>
				<ul>
					<li><img src="assets/index/img/device-icon1.png"><p>快速开机</p></li>
					<li><img src="assets/index/img/device-icon2.png"><p>智能触摸</p></li>
					<li><img src="assets/index/img/device-icon3.png"><p>高清屏幕</p></li>
					<li><img src="assets/index/img/device-icon4.png"><p>外观大气</p></li>
					<li><img src="assets/index/img/device-icon5.png"><p>单核升级双核cpu</p></li>
					<li><img src="assets/index/img/device-icon6.png"><p>1G升级2G内存条</p></li>
					<li><img src="assets/index/img/device-icon7.png"><p>机械硬盘升级32G固态硬盘</p></li>
					<li><img src="assets/index/img/device-icon8.png"><p>新型1037u高配双核主板</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section gray">
	<div class="main clearfix" style="width:1135px; padding-bottom: 20px;">
		<div class="device-box">
			<div class="left fr"><img src="assets/index/img/device-img2.png"></div>
			<div class="right fl pt-60">
				<h1>ADOO点餐收银机</h1>
				<p>集触摸点餐于一体，支持主扫收款，适合于中式快餐店、奶菜店、西点房、点餐后直接收银。体积小，不占收银台。</p>
				<ul>
					<li><img src="assets/index/img/device-icon9.png"><p>10点触摸</p></li>
					<li><img src="assets/index/img/device-icon10.png"><p>80打印机</p></li>
					<li><img src="assets/index/img/device-icon11.png"><p>支持扫码支持</p></li>
					<li><img src="assets/index/img/device-icon12.png"><p>IPS高清屏幕</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="main clearfix" style="width:1135px; height: 816px;overflow: hidden;">
		<div class="device-box">
			<div class="fl left"><img src="assets/index/img/device-img3.png"></div>
			<div class="fr right pt-100">
				<h1>GEOO自助点餐机</h1>
				<p>全触摸式，支持壁挂，支持立式，从点餐到支付一气呵成，适用于肯德鸡，麦当劳，人流量极大的餐厅。可定制刷脸支付。</p>
				<ul>
					<li><img src="assets/index/img/device-icon9.png"><p>10点触摸</p></li>
					<li><img src="assets/index/img/device-icon10.png"><p>80打印机</p></li>
					<li><img src="assets/index/img/device-icon11.png"><p>支持扫码支持</p></li>
					<li><img src="assets/index/img/device-icon13.png"><p>NFC/POS支付</p></li>
					<li><img src="assets/index/img/device-icon14.png"><p>防儿童钥匙锁</p></li>
					<li><img src="assets/index/img/device-icon15.png"><p>IPS高清屏幕</p></li>
					<li style="margin-right: 10px; width:105px;"><img src="assets/index/img/device-icon16.png"><p>用汽车喷涂工艺，进口“阿克苏”喷涂原材料</p></li>
					<li><img src="assets/index/img/device-icon17.png"><p>刷脸支付</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section gray">
	<div class="main clearfix" style="width:1135px; padding-bottom: 20px;">
		<div class="device-box">
			<div class="left fr"><img src="assets/index/img/device-img4.png"></div>
			<div class="right fl pt-60">
				<h1>BF点餐 收银机</h1>
				<p>小巧，双屏触摸式，适合餐厅所有场景，支持外部设备，点餐完成支持微信，支付宝主扫被扫全支付。可安装第三方应用。</p>
				<ul>
					<li><img src="assets/index/img/device-icon9.png"><p>10点触摸</p></li>
					<li><img src="assets/index/img/device-icon10.png"><p>80打印机</p></li>
					<li><img src="assets/index/img/device-icon11.png"><p>支持扫码支持</p></li>
					<li><img src="assets/index/img/device-icon12.png"><p>IPS高清屏幕</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="main clearfix" style="width:1000px;">
		<div class="device-box">
			<div class="left fl"><img src="assets/index/img/device-img5.png"></div>
			<div class="right fr pt-100">
				<h1>GOO点餐POS机</h1>
				<p>手持式点餐POS扫码收银一体机，适合酒店大堂点餐，西式糕点店或没有网络，机器可接外卖后台。</p>
				<ul>
					<li><img src="assets/index/img/device-icon9.png"><p>10点触摸</p></li>
					<li><img src="assets/index/img/device-icon10.png"><p>80打印机</p></li>
					<li><img src="assets/index/img/device-icon11.png"><p>支持扫码支持</p></li>
					<li><img src="assets/index/img/device-icon12.png"><p>IPS高清屏幕</p></li>
				</ul>
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