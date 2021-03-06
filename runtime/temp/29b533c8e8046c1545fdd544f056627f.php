<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"D:\www\ppp\PHP/application/index\view\product\food.php";i:1576497916;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/banner-5.jpg') no-repeat center center">
				<div class="unusual-header-title">
					<div class="title-box">
						<h1>扫码点餐</h1>
						<p>扫一下二维码就可以自助点餐、买单、加菜等,便捷服务可帮助商家降低人工成本</p>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section" style="overflow: hidden; height: 695px;">
	<div class="main">
		<div class="title">
			<p class="h1">愉悦的点餐体验</p>
			<p class="small">扫码即可多人同时点餐，菜单总额实时显示，让点餐又快又省心</p>
		</div>
		<div class="order-img-list">
			<ul>
				<li><img src="assets/index/img/order-img1.png"><p>选择用餐人数</p></li>
				<li><img src="assets/index/img/order-img2.jpg"><p>微信扫码进入点餐</p></li>
				<li><img src="assets/index/img/order-img3.jpg"><p>可进行多人点餐</p></li>
				<li><img src="assets/index/img/order-img4.jpg"><p>选择菜品加入购物车</p></li>
				<li><img src="assets/index/img/order-img5.jpg"><p>已下单的菜单详情</p></li>
			</ul>
		</div>
	</div>
</div>
<div class="section back-img" style="background-image: url('assets/index/img/banner-6.jpg'); z-index: 10; height: 770px;">
	<div class="main" style="position: relative; padding-bottom: 10px; ">
		<div class="title white">
			<p class="h1">开启在线点餐新时代</p>
			<p>全方位解决传统餐饮业成本高，营销扩客难等问题</p>
		</div>
		<div class="item-order-desc clearfix">
			<div class="left fl"><img src="assets/index/img/banner-7.png"></div>
			<div class="right fr">
				<ul>
					<li><img src="assets/index/img/icon-1.png"><h1>降低成本</h1><p>自助点餐、买单、加菜等便捷服务可帮助商家降低人工成本</p></li>
					<li><img src="assets/index/img/icon-2.png"><h1>提高效率</h1><p>在线点餐无需排队，扫码加单方便快捷，提高经营效率</p></li>
					<li><img src="assets/index/img/icon-3.png"><h1>粉丝经营</h1><p>客户点餐后，存储客户信息，可对其进行二次营销，提升二次消费</p></li>
					<li><img src="assets/index/img/icon-4.png"><h1>提高翻台率</h1><p>用户通过点餐小程序在微信自助点餐、支付，不需要排队等待，节省时间</p></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section back-img" style="height:750px;">
	<div class="main">
		<div class="title">
			<p class="h1">河马点餐VS传统点餐</p>
			<p>河马点餐直接扫码点餐，无需要服务员，可以省时又省力</p>
		</div>
		<div class="compared-box">
			<div class="odds">
				<div class="odds-name">扫码点餐</div>
				<ul>
					<li><img src="assets/index/img/true.png">客户到店直接扫码点餐，自动识别台号</li>
					<li><img src="assets/index/img/true.png">无需服务人员，点餐自动到打印</li>
					<li><img src="assets/index/img/true.png">客户到店，无需等待服务员</li>
					<li><img src="assets/index/img/true.png">客户还没到店已经点好了，到店直接食用即可</li>
					<li><img src="assets/index/img/true.png">储存用户数据，实现会员经营</li>
					<li><img src="assets/index/img/true.png">提升50%</li>
					<li><img src="assets/index/img/true.png">发送优惠券，提升客户二次消费</li>
				</ul>
			</div>
			<div class="pieces">
				<img src="assets/index/img/sanjiao.png">
				<ul>
					<li class="back-color-1">顾客体验</li>
					<li class="back-color-2">服务人员</li>
					<li class="back-color-3">时间效率</li>
					<li class="back-color-4">预约点餐</li>
					<li class="back-color-5">用户数据</li>
					<li class="back-color-6">经营效率</li>
					<li class="back-color-7">二次营销</li>
				</ul>
			</div>
			<div class="odds warp">
				<div class="odds-name">传统点餐</div>
				<ul>
					<li><img src="assets/index/img/false.png">需要呼叫服务员，体验糟糕</li>
					<li><img src="assets/index/img/false.png">需服务人员手写订单</li>
					<li><img src="assets/index/img/false.png">需要等待服务员，高峰时间超过半个小时</li>
					<li><img src="assets/index/img/false.png">必须到店才能点餐</li>
					<li><img src="assets/index/img/false.png">没有数据</li>
					<li><img src="assets/index/img/false.png">保存原状</li>
					<li><img src="assets/index/img/false.png">不能二次营销</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section back-img" style="background-image: url('assets/index/img/banner-8.jpg'); z-index: 10; height: 954px;">
	<div class="main" style="position: relative; padding-bottom: 10px; ">
		<div class="title white">
			<p class="h1">河马点餐的功能</p>
			<p>用户可以通过微信支付，也可以直接到收银台付款的方式，轻松买单</p>
		</div>
		<div class="features-list">
			<ul>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-5.png"><p>在线点餐</p></div>
					<div class="right fr">微信在线选餐，一键提交，厨房实时接收订单，到店即可享用，无需排队等待</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-6.png"><p>桌面二维码</p></div>
					<div class="right fr">通过小程序后台创建桌号，生成二维码，商户可将二维码贴在对应的桌子，用户到店后微信扫码便可进入店铺下单</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-7.png"><p>微信加单</p></div>
					<div class="right fr">顾客如需继续加单，可再次扫码进入加单的时候只需要选购商品即可，无需再重新填写信息</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-8.png"><p>方式支付</p></div>
					<div class="right fr">用户可以通过微信支付，也可以直接到收银台付款的方式，轻松买单</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-9.png"><p>会员管理</p></div>
					<div class="right fr">会员信息触手可得，方便查找，高效会员营销推广，各种营销方案尽在手中</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-10.png"><p>数据统计</p></div>
					<div class="right fr">会员统计、订单统计、销售统计，详细的订单数据统计，一目了然</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-11.png"><p>订单管理</p></div>
					<div class="right fr">后台轻松管理订单，方便查看订单号、总额、支付状态等信息</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-12.png"><p>客户维系</p></div>
					<div class="right fr">轻松管理公众号粉丝，可积累客户数据，客户通过扫码关注公众号后台即可生成用户管理数据</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-13.png"><p>多人扫码</p></div>
					<div class="right fr">支持多人同时扫码点餐，不用浪费时间在讨论点餐上，省时又省力。</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-14.png"><p>预付费充值卡</p></div>
					<div class="right fr">充值送营销解决方案除快速帮助商家回笼资金外，还能精准锁定消费者，受到消费者的热捧.</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-15.png"><p>优惠券营销</p></div>
					<div class="right fr">商家可发行满减券.红包等方式获客，从而促进二次消费，红包券可在点餐前后，或支付前后，线上渠道等地领取</div>
				</li>
				<li>
					<div class="left fl"><img src="assets/index/img/icon-16.png"><p>厨房云打印</p></div>
					<div class="right fr">消费者点单，收银台确认，多档口管理，依据配置打印不同菜品信息</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="section">
	<div class="main" style="height:320px;">
		<div class="new-ad clearfix">
			<div class="ad-code fl">
				<img src="assets/index/downApp.png"><p>扫一扫，体验点餐</p>
			</div>
			<div class="ad-right fr">
				<h1>1天不到2元</h1><p>咨询电话：15252131510</p>
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