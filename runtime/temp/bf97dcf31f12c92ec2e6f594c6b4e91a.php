<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\www\ppp\PHP/application/index\view\cases\index.php";i:1576497087;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
        <link rel="stylesheet" href="assets/index/css/animate.min.css">
<div class="section down-app" style="background-image: url('assets/index/img/down-banner1.jpg');overflow: hidden;">
    <div class="main" style="height:100%;padding: 0; position: relative;">
        <div class="down-left fl wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
            <img src="assets/index/img/down-banner1-img.png">
        </div>
        <div class="down-right fr wow bounceInRight animated" style="visibility: visible; animation-name: bounceInRight;">
            <div class="right-info">
                <h1>顾客自主扫码点餐</h1>
                <img src="assets/index/downApp.png">
                <p>扫一扫，立刻体验</p>
            </div>
        </div>
    </div>
</div>
<div class="section down-app wow slideInLeft animated" style="background-image: url('assets/index/img/down-banner2.jpg'); overflow: hidden; visibility: visible; animation-name: slideInLeft;">
    <div class="main" style="height:100%;padding: 0; position: relative;">
        <div class="down-left warp">
            <div class="right-info warp">
                <h1>自营外卖小程序</h1>
                <em> 属于商家自有的外卖平台，从点餐到配送，打通外卖各个环节，为餐饮商户提供完整的解决方案和一体化的营销管理；顾客通过微信打开小程序或您店铺的的公众号点外卖，
                    平台零抽佣，节省您在外卖平台高达20%的巨额抽成，支持自行配送或第三方配送。
                </em>
            </div>
        </div>
        <div class="down-right warp">
            <img src="assets/index/img/down-banner2-img.png">
        </div>
    </div>
</div>
<div class="section down-app" style="background-image: url('assets/index/img/down-banner3.jpg');overflow: hidden;">
    <div class="main" style="height:100%;padding: 0; position: relative;">
        <div class="down-left fl warp-2 wow slideInLeft animated" style="bottom: 35px; visibility: visible; animation-name: slideInLeft;">
            <img src="assets/index/img/down-banner3-img.png">
        </div>
        <img src="assets/index/img/down-banner3-code1.png" class="Unknown warp">
        <div class="down-right fr  wow bounceInRight animated" style="visibility: visible; animation-name: bounceInRight;">
            <div class="right-info warp">
                <h1>外卖小程序赋能餐饮

                </h1>
                <em>2017年8月，微信小程序悄然增添新功能，在“附近的小程序”栏目里新增“美食”筛选栏，这一功能更新，直接为餐饮开辟了一条绿色通道。小程序成为餐企摆脱平台绑架的新“神器”。2018年12月，随着微信7.0的上线，微信在二级入口中新增“附近的餐厅”，面对这强劲的连接入口，有餐饮人预测，这将是超越以往任何时代的超级流量红利。
                </em>
            </div>
        </div>
    </div>
</div>
<div class="section down-app" style="background-image: url('assets/index/img/down-banner4.jpg');overflow: hidden;">
    <div class="main" style="height:100%;padding: 0; position: relative;">
        <div class="down-left warp  wow bounceInUp animated" style="visibility: visible; animation-name: bounceInUp;">
            <div class="right-info warp">
                <h1>全渠道发展会员

                </h1>
                <em>线上&amp;线下多渠道鼓励用户领取会员卡，帮助商家快速沉淀会员，解决传统营销方式单一、难以沉淀粉丝和会员留存困难的问题。
                </em>
            </div>
        </div>
        <div class="down-right warp wow bounceInDown animated" style="bottom: 170px; visibility: visible; animation-name: bounceInDown;">
            <img src="assets/index/img/down-banner4-img.png">
        </div>
    </div>
</div>
<div class="section down-app" style="background-image: url('assets/index/img/down-banner5.jpg');overflow: hidden;">
    <div class="main" style="height:100%;padding: 0; position: relative;">
        <div class="down-left fl warp-2 wow fadeInUp animated" style="bottom: -23px; left: -179px; visibility: visible; animation-name: fadeInUp;">
            <img src="assets/index/img/down-banner5-img.png">
        </div>
        <div class="down-right fr wow flipInY animated" style="right: 200px; visibility: visible; animation-name: flipInY;">
            <div class="right-info warp-2">
                <h1>拉新、沉淀、复购、
                </h1>
                <em>裂变吸粉、用户激活、提高复购率、提升营业额，精准营销提升效益.
                </em>
            </div>
        </div>
    </div>
</div>
<script src="assets/index/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
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