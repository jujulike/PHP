<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\www\ppp\PHP/application/index\view\index\index.php";i:1576497416;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
    <div class="swiper-container swiper-container-horizontal" style="background-color: #35394a; height: 809px;">
        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-4137px, 0px, 0px);">
			<div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" style="display: block; background: url('assets/index/img/banner2.jpg') center center no-repeat; width: 1349px; margin-right: 30px;" data-swiper-slide-index="1">
                <h1 class="banner-title warp-1">便捷、智能就选码点餐</h1>
                <p class="banner-info warp-1">让用餐变得省时、便捷、智能</p>
            </div>
            <div class="swiper-slide swiper-slide-duplicate-active" style="display: block; background: url('assets/index/img/banner1.jpg') center center no-repeat; width: 1349px; margin-right: 30px;" data-swiper-slide-index="0">
                <h1 class="banner-title">扫码点餐覆盖全行业</h1>
                <p class="banner-info">中餐厅、西餐厅、日韩料理、酒吧、咖啡简餐、火锅店、快餐店，小吃烧烤，甜品店等</p>
                <p class="banner-info">支持外卖小程序，零佣金！！！</p>
            </div>
            <div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" style="display: block; background: url('assets/index/img/banner2.jpg') center center no-repeat; width: 1349px; margin-right: 30px;" data-swiper-slide-index="1">
                <h1 class="banner-title warp-1">便捷、智能就选码点餐</h1>
                <p class="banner-info warp-1">让用餐变得省时、便捷、智能</p>
            </div>
			<div class="swiper-slide swiper-slide-duplicate swiper-slide-active" style="display: block; background: url('assets/index/img/banner1.jpg') center center no-repeat; width: 1349px; margin-right: 30px;" data-swiper-slide-index="0">
					<h1 class="banner-title">扫码点餐覆盖全行业</h1>
					<p class="banner-info">中餐厅、西餐厅、日韩料理、酒吧、咖啡简餐、火锅店、快餐店，小吃烧烤，甜品店等</p>
					<p class="banner-info">支持外卖小程序，零佣金！！！</p>
			</div>
		</div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
			<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
			<span class="swiper-pagination-bullet"></span>
		</div>
    </div>
</div>
<div class="section">
    <div class="main">
        <div class="title">
            <p class="h1">改变，从码点餐开始</p>
            <p>智慧餐饮-让天下不再有难经营的餐厅</p>
        </div>
        <div class="item-list">
            <ul>
                <li>
                    <span><img src="assets/index/img/function-icon1.png"></span>
                    <p class="h1">扫码点餐</p>
                    <p>多人同时点单，可支持就餐前或就餐后在线支付与收银台支付</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon2.png" class="mr1"></span>
                    <p class="h1">全渠道收银台</p>
                    <p>一码多付，支持微信、支付宝、云闪付等扫码收银、POS、刷脸支付</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon3.png" class="mr2"></span>
                    <p class="h1">外卖小程序</p>
                    <p>自营外卖小程序，零佣金抽取，脱离外卖平台高达20%的佣金</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon4.png"></span>
                    <p class="h1">智能会员营销</p>
                    <p>支付后领取、主动发现金立减券、优惠券，会员折扣充值等各类营销玩法</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon5.png" class="mr2"></span>
                    <p class="h1">排队取号系统</p>
                    <p>支持线上取号，到店取号、提升用户体验，节约 顾客时间</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon6.png" class="mr3"></span>
                    <p class="h1">预约订座系统</p>
                    <p>线上预约订座、轻松常握顾客行为数据，利用营销转化N次消费</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon7.png" class="mr2"></span>
                    <p class="h1">厨房云打印</p>
                    <p>消费者点单，收银台确认，多档口管理，依据配置打印不同菜品信息</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon8.png"></span>
                    <p class="h1">智能设备</p>
                    <p>根据餐厅需求，各类智能化硬件解决一切餐厅服务到支付的应用场景。</p>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section back-img" style="background-image: url('assets/index/img/banner-item-back.jpg'); z-index: 10;">
    <div class="main" style="position: relative; padding-bottom: 10px; padding-top: 50px;">
        <div class="title white">
            <p class="h1">扫码点餐，不一样的就餐体验！</p>
            <p>降低人工成本60%，翻台速度提升30%</p>
        </div>
    </div>
    <div class="swiper-box">
        <div class="swiper-container-item swiper-container-horizontal">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide-active" style="width: 277.5px; margin-right: 30px;">
                    <div class="img-box">
                        <img src="assets/index/img/banner-item1.png">
                    </div>
                    <a href="javascript:;">火锅料理</a>
                </div>
                <div class="swiper-slide swiper-slide-next" style="width: 277.5px; margin-right: 30px;">
                    <div class="img-box">
                        <img src="assets/index/img/banner-item2.png">
                    </div>
                    <a href="javascript:;">特色中餐</a>
                </div>
                <div class="swiper-slide" style="width: 277.5px; margin-right: 30px;">
                    <div class="img-box">
                        <img src="assets/index/img/banner-item3.png">
                    </div>
                    <a href="javascript:;">高档西餐</a>
                </div>
                <div class="swiper-slide" style="width: 277.5px; margin-right: 30px;">
                    <div class="img-box">
                        <img src="assets/index/img/banner-item4.png">
                    </div>
                    <a href="javascript:;">咖啡简餐</a>
                </div>
                <div class="swiper-slide" style="width: 277.5px; margin-right: 30px;">
                    <div class="img-box">
                        <img src="assets/index/img/banner-item1.png">
                    </div>
                    <a href="javascript:;">火锅料理</a>
                </div>
            </div>
        </div>
        <div class="swiper-button-prev swiper-button-disabled"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<div class="section">
    <div class="main">
        <div class="bind">
            <img src="assets/index/img/bind-back1.png" class="bing-back clearfix ">
            <div class="info">
                <h1>扫码点餐-覆盖餐饮全行业</h1>
                <p>• 无需服务员，顾客自助扫桌台码下单</p>
                <p>• 率先行业支持先支付就餐、就餐后支付、收银台支付三种模式</p>
                <p>• 强大的支付即关注、支付领会员、卡券等营销功能</p>
                <p>• 依托微信巨头，紧抓餐饮小程序营销的第一波红利</p>
                <p>• 软硬件一体化管理方案，完整解决您的各个环节的需求</p>
                <p>• 帮助商户解决效率、流量、资金、经营、粘性、五大难题</p>
                <p>• 大数据分析，是提高智能新型餐厅价值的关键所在</p>
                <p>• 码点餐是一款真正会营销的餐饮SAAS管理平台</p>
            </div>
            <div class="clearfix "></div>
        </div>
    </div>
</div>
<div class="section" style=" height:860px; background:url('assets/index/img/down-img-3.jpg')no-repeat center center;background-size: cover;background-attachment: fixed;">
    <div class="main" style="padding-top:50px;">
        <div class="title white">
            <p class="h1">自营外卖小程序，分享微信10亿用户流量红利</p>
            <p>搭建真正属于自已的零佣金外卖小程序，节省饿了么、美团外卖等高达20%的巨额分佣。</p>
        </div>
        <div class="trait-list">
            <ul>
                <li>零佣金</li>
                <li>成本少</li>
                <li>赚钱快</li>
                <li>转化高</li>
            </ul>
        </div>
        <div class="img-list">
            <img src="assets/index/img/down-img-4.png">
            <img src="assets/index/img/down-img-5.png" class="img-2">
            <img src="assets/index/img/down-img-6.png" class="img-3">
            <img src="assets/index/img/down-img-7.png" class="img-4">
            <img src="assets/index/img/down-img-8.png" class="img-5">
        </div>
    </div>
</div>
<div class="section gray">
    <div class="main">
        <div class="title">
            <p class="h1">码点餐.十二年技术积累助力餐饮商家</p>
            <p>面向实体餐饮门店，简单高效的门店经营和在线营销工具</p>
        </div>
        <div class="item-lists">
            <ul class="warp">
                <li>
                    <span><img src="assets/index/img/function-icon9.png"></span>
                    <p class="h1">全天候客服</p>
                    <p>一对一跟踪服务</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon10.png"></span>
                    <p class="h1">操作简单</p>
                    <p>傻瓜化操作</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon11.png"></span>
                    <p class="h1">功能强大</p>
                    <p>各种营销功能免费用</p>
                </li>
                <li>
                    <span><img src="assets/index/img/function-icon12.png"></span>
                    <p class="h1">免费跌代</p>
                    <p>系统免费跌代升级</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="RightFrame">
	<a href="javascript:;">
		<div class="SmallBox">
			<div class="Pic">
				<img src="assets/index/img/Right-pic-TX.png"/>
				<span></span>
			</div>
			<div class="Botton">
				<em></em>招商合作
			</div>
		</div>
	</a>
	<div class="MorePeople" style="width: 330px;">
		<div class="title">
			招商咨询
		</div>
		<ul id="bfzszx">
			<li class="nan">
				<div class="pic">
					陈
				</div>
				<div class="name">
					陈经理
				</div>
				<div class="Botton">
					<a href="#"><em></em>咨询</a>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="DuihuaTankuang" style="display: none;">
	<div class="HeadXx">
		<div class="LeftWord">
			<ul>
				<li><em class="MZ"></em>姓名：<span class="zs_name"> </span></li>
				<li><em class="SJ"></em>手机：<span class="zs_phone"> </span></li>
				<li><em class="QQ"></em>Q Q：<span class="zs_qq"> </span></li>
			</ul>
		</div>
		<div class="RightPic">
			<img src="assets/index/img/RightPic-erweima.png"/>
			<div class="PicErweima">
				<img src="assets/index/img/PicErweima.png" style="width: 114px;height: 114px;"/>
			</div>
		</div>
	</div>
	<div class="BottomButton">
		<a href="#"><em></em>立即咨询</a>
	</div>
	<a class="close_black" href="javascript:close_zsjlDetail();">
		<img src="assets/index/img/close_black.png"/>
	</a>
</div>
<script type="text/javascript">
	var ta=[{
		name:'阿达',
		zw:'售前服务',
		phone:'15252131510',
		qq:'19966591',
		weixin:'',
		sex:1,
		weixinPic:'fxtc08.png',
	},{
		name:'徐杰',
		zw:'售后服务',
		//phone:'13868398919',
		phone:'15252131510',
		qq:'19966591',
		weixin:'',
		sex:1,
		weixinPic:'fxtc08.png',
	},{
		name:'徐洁',
		zw:'技术支持',
		phone:'15252131510',
		qq:'19966591',
		sex:1,
		weixin:'',
		weixinPic:'fxtc08.png',
	},{
		name:'陈利武',
		zw:'招商加盟',
		phone:'15252131510',
		qq:'19966591',
		sex:1,
		weixin:'',
		weixinPic:'fxtc08.png',
	}];
	var htmla = '';
	$(ta).each(function(index,bean){
		if (index>0){
			if ( Math.random()*100 >=50 ){
				htmla += liHtml(bean);
			}else {
				htmla = liHtml(bean)+htmla;
			}
		}
	});
	htmla = liHtml(ta[0])+htmla;
	$('#bfzszx').html(htmla);
	function liHtml(bean) {
		var html='';
		var sName = bean.name.substring(bean.name.length-1,bean.name.length);
		if (bean.sex==0){
			html+='<li class="nv">';
			html+='<div class="pic nv">'+sName+'</div>';
		}else {
			html+='<li class="nan">';
			html+='<div class="pic">'+sName+'</div>';
		}
		html+='<div class="name">'+bean.zw+'</div>';
		html+='<div class="Botton">';
		html+='<a href="javascript:zsjlDetail(\''+bean.phone+'\');"><em></em>咨询</a>';
		html+='</div></li>';
		return html;
	}
	function zsjlDetail(tPhone) {
		var tBean ;
		$(ta).each(function(index,bean){
			if (bean.phone == tPhone){
				tBean = bean;
			}
		});
		$('.DuihuaTankuang .zs_name').html(tBean.name);
		$('.DuihuaTankuang .zs_phone').html(tBean.phone);
		$('.DuihuaTankuang .zs_qq').html(tBean.qq);
		$('.DuihuaTankuang .PicErweima img').attr('src','assets/index/'+tBean.weixinPic);
		$('.DuihuaTankuang .BottomButton a').attr('href','http://wpa.qq.com/msgrd?v=3&uin='+tBean.qq+'&site=qq&menu=yes');
		$('.DuihuaTankuang').show();
	}
	function close_zsjlDetail() {
		$('.DuihuaTankuang').hide();
	}
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