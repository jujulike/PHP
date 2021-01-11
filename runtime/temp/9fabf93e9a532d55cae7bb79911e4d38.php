<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\www\ppp\PHP/application/index\view\about\index.php";i:1576496662;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
	<div class="swiper-container" style="background-color: #35394a;height: 500px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner3.jpg') no-repeat center center">
				<h1 class="banner-title warp-3">ABOUT US</h1>
				<p class="banner-info warp-3">一家诚信做事、高求品质，寻求共赢的软件服务企业</p>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section gray">
	<div class="main" style="position: relative;">
		<div class="title">
			<p class="h1">关于我们</p>
			<p>做餐饮，用河马点餐</p>
		</div>
		<div class="about-info">
			<div class="across"></div>
			<em>河马点餐</em>
			<p>河马点餐为河马科技旗下餐饮SAAS服务平台，“河马点餐”致力于让传统餐饮企业快速实现移动互联网化，助力于传统餐厅整体运营效率提升，运营成本降低，用户用餐满意度提高。码点餐融合了移动互联网、大数据分析、云存储服务、O20等前沿科技。传统餐厅进行“河马点餐”后，用户的用餐体验将大幅改善，满意度大幅提升！整体运营效率将大幅提升，运营成本明显降低！传统餐厅商户通过“河马点餐”点餐系统，可以在收银系统实时显示所有餐台的点餐情况、所点菜品、结算情况，大量减少了服务员送菜单以及等待顾客选餐的时间浪费，也减少了服务员介绍菜品的时间，让新品和主推菜品可以标准化的展示给所用用餐客人，大大提高点餐和服务的效率，降低餐厅整体运营成本。</p>
			<div class="acrosss">
				<img src="iles/acrss.png" alt="">
			</div>
			<p class="phone">
				客服热线：<?= $web['component_phone']?><br>
				地址：<?= $web['web_address']?>
			</p>
		</div>
		<img src="assets/index/img/about-img1.jpg" class="about-img1">
		<div class="clearfix"></div>
	</div>
</div>
<div class="section">
	<div class="main" style="position: relative;">
		<div class="title">
			<p class="h1">我们的位置</p>
			<p>欢迎光临公司实地考察</p>
		</div>
		<div id="container" class="amap-container" style="position: relative; background: rgb(252, 249, 242);">
			<div class="amap-maps">
				<div class="amap-drags">
					<div class="amap-layers" style="transform: translateZ(0px);">
						<canvas class="amap-layer" width="1200" height="450" style="width: 1200px; height: 450px;"></canvas>
						<div class="amap-markers">
							<div class="amap-marker" style="top: 176px; left: 546px; z-index: 100; transform: rotate(0deg); transform-origin: 13px 30px; display: block;">
								<div class="amap-icon" style="position: absolute; overflow: inherit; opacity: 1;">
									<img src="assets/index/img/poi-marker-default.png" style="top: 0px; left: 0px;">
								</div>
							</div>
						</div>
					</div>
					<div class="amap-overlays"></div>
				</div>
			</div>
			<div style="display: none;"></div>
			<div class="amap-controls"></div>
			<a class="amap-logo" href="http://gaode.com/" target="_blank" style="display: block;"><img src="assets/index/img/logo@1x.png"></a>
			<div class="amap-copyright" style="display: none; visibility: visible;"> © 2019 AutoNavi <span class="amap-mcode">- GS(2018)1709号</span>
		</div>
	</div>
</div>
</div>
		
<script src="assets/index/js/avalon.js"></script>
<script type="text/javascript" src="assets/index/js/maps.js"></script>
<script type="text/javascript">
    var marker, map = new AMap.Map("container", {
        zoom:11,//级别
        viewMode:'3D',//使用3D视图
        resizeEnable: true,
        center: [117.207934,34.274073],//中心点坐标
        zoom: 13
    });
    // 实例化点标记
    function addMarker() {
        marker = new AMap.Marker({
            icon: "//a.amap.com/jsapi_demos/static/demo-center/icons/poi-marker-default.png",
            position: [117.207934,34.274073],
            offset: new AMap.Pixel(-13, -30)
        });
        marker.setMap(map);
    }
    addMarker();
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