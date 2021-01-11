<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\www\ppp\PHP/application/index\view\joins\index.php";i:1576497514;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
			<div class="swiper-slide" style="display: block; background: url('assets/index/img/join-back.jpg') no-repeat center center">
				<h1 class="banner-title warp-2">携手并进&nbsp;&nbsp;共创辉煌</h1>
				<p class="banner-info warp-2">扫码点餐代理加盟开放申请啦！</p>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<div class="section">
	<div class="main">
		<div class="title">
			<p class="h1">为什么选择码点餐</p>
			<p>保姆式跟踪培养，为合作伙伴提供一流的发展空间</p>
		</div>
		<div class="select-list">
			<ul>
				<li class="right-none">
					<img src="assets/index/img/select-red1.png" class="red">
					<img src="assets/index/img/select-white1.png" class="white">
					<p class="mrt h1">企业</p>
					<p>中国银联挂牌服务商，浙江省科创企业，纳税A级企业</p>
				</li>
				<li class="right-none">
					<img src="assets/index/img/select-red2.png" class="red">
					<img src="assets/index/img/select-white2.png" class="white">
					<p class="h1">品牌</p>
					<p>公司自身拥有千万级用户，具备先天的传播优势！</p>
				</li>
				<li>
					<img src="assets/index/img/select-red3.png" class="red">
					<img src="assets/index/img/select-white3.png" class="white">
					<p class="h1">产品</p>
					<p>完整的产品线，构建餐饮行业生态系统</p>
				</li>
				<li class="right-none top-none">
					<img src="assets/index/img/select-red4.png" class="red">
					<img src="assets/index/img/select-white4.png" class="white">
					<p class="h1">技术</p>
					<p>十二年技术研发团队，全部出自科班，部份来源于BAT</p>
				</li>
				<li class="right-none top-none">
					<img src="assets/index/img/select-red5.png" class="red">
					<img src="assets/index/img/select-white5.png" class="white">
					<p class="mrt1 h1">服务</p>
					<p> “一对一”顾问式服务，节假日等全年无休</p>
				</li>
				<li class="top-none">
					<img src="assets/index/img/select-red6.png" class="red">
					<img src="assets/index/img/select-white6.png" class="white">
					<p class="h1">回报率</p>
					<p>全新的餐饮行业产业链模式，回报率超乎你想象</p>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="section gray">
	<div class="main clearfix">
		<div class="title" style="margin-bottom: 65px;">
			<p class="h1">八大支持</p>
			<p>我们将为合作伙伴营造一流的发展环境</p>
		</div>
		<div class="support">
			<span class="support-info">
				<p class="h1">产品销售支持</p>
				<p>产品经理实时对接销售，团队提供培训支持</p>
			</span>
			<span class="support-info">
				<p class="h1">区域保护支持</p>
				<p>区域保护系统和价格保护政策避免订单冲突</p>
			</span>
			<span class="support-info">
				<p class="h1">售后运营支持</p>
				<p>专业运营团队保障用户产品只用</p>
			</span>
			<span class="support-info">
				<p class="h1">技术保障支持</p>
				<p>金融级别系统建设，保障业务安全稳定</p>
			</span>
			<span class="support-info">
				<p class="h1">品牌宣传支持</p>
				<p>全国范围线上线下，多渠道全方位宣传</p>
			</span>
			<span class="support-info">
				<p class="h1">产品升级支持</p>
				<p>研发团队专注产品研发持续优化产品</p>
			</span>
			<span class="support-info">
				<p class="h1">高效甩单支持</p>
				<p>总部将客户信息按区域分配，提供甩单支持</p>
			</span>
			<span class="support-info">
				<p class="h1">远程服务支持</p>
				<p>全天候贴心客服服务7*24小时跟踪</p>
			</span>
		</div>
		<img src="assets/index/img/join-img.jpg" class="join-img">
	</div>
</div>
<div class="section back-img" style="height:544px;">
	<div class="main">
		<div class="title" style="color:#fff;">
			<p class="h1">加盟流程</p>
			<p>只需4步 即可快速开店</p>
		</div>
		<div class="join-list">
			<ul>
				<li>
					<span class="img-box"><img src="assets/index/img/join-icon1.png" alt=""></span>
					<p class="h1">填写信息</p>
					<p>填写申请表格，提交合作</p>
				</li>
				<li>
					<span class="img-box"><img src="assets/index/img/join-icon2.png" alt=""></span>
					<p class="h1">对接经理</p>
					<p>一个工作日内渠道经理和您对接</p>
				</li>
				<li>
					<span class="img-box"><img src="assets/index/img/join-icon3.png" alt=""></span>
					<p class="h1">确认合作</p>
					<p>与码点餐签署合作协议</p>
				</li>
				<li>
					<span class="img-box"><img src="assets/index/img/join-icon4.png" alt=""></span>
					<p class="h1">开展业务</p>
					<p>开通帐号，发展市场</p>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="section gray">
	<div class="main">
		<div class="title"><p class="h1">招商加盟</p><p>紧跟时代，创优产品，伙伴至上，引领行业！</p></div>
		<div class="seller-info clearfix">
			<div class="seller-info-form warp" style="float:right">
				<div class="name-list">
					<div class="item"><span class="star">*</span><span>公司名称 :</span></div>
					<div class="item"><span class="star">*</span><span>联系人称呼 :</span></div>
					<div class="item"><span class="star">*</span><span>移动电话 :</span></div>
				</div>
				<form action="" class="base">
					<input type="text" placeholder="公司名称:" avalon-events="input:_6,compositionstart:_4,compositionend:_5,focus:_2,blur:_3">
					<input type="text" placeholder="联系人称呼:" avalon-events="input:_6,compositionstart:_4,compositionend:_5,focus:_2,blur:_3">
					<input type="text" placeholder="移动电话:" avalon-events="input:_6,compositionstart:_4,compositionend:_5,focus:_2,blur:_3">
					<select data-duplex-changed="@changeProv()" name="province" avalon-events="change:_6">
						<option value="0">请选择省份</option>
						<option value="1" itemvalue="1">北京</option>
						<option value="2" itemvalue="2">天津</option>
						<option value="3" itemvalue="3">河北</option>
						<option value="4" itemvalue="4">山西</option>
						<option value="5" itemvalue="5">内蒙古</option>
						<option value="6" itemvalue="6">辽宁</option>
						<option value="7" itemvalue="7">吉林</option>
						<option value="8" itemvalue="8">黑龙江</option>
						<option value="9" itemvalue="9">上海</option>
						<option value="10" itemvalue="10">江苏</option>
						<option value="11" itemvalue="11">浙江</option>
						<option value="12" itemvalue="12">安徽</option>
						<option value="13" itemvalue="13">福建</option>
						<option value="14" itemvalue="14">江西</option>
						<option value="15" itemvalue="15">山东</option>
						<option value="16" itemvalue="16">河南</option>
						<option value="17" itemvalue="17">湖北</option>
						<option value="18" itemvalue="18">湖南</option>
						<option value="19" itemvalue="19">广东</option>
						<option value="20" itemvalue="20">广西</option>
						<option value="21" itemvalue="21">海南</option>
						<option value="22" itemvalue="22">重庆</option>
						<option value="23" itemvalue="23">四川</option>
						<option value="24" itemvalue="24">贵州</option>
						<option value="25" itemvalue="25">云南</option>
						<option value="26" itemvalue="26">西藏</option>
						<option value="27" itemvalue="27">陕西</option>
						<option value="28" itemvalue="28">甘肃</option>
						<option value="29" itemvalue="29">青海</option>
						<option value="30" itemvalue="30">宁夏</option>
						<option value="31" itemvalue="31">新疆</option>
						<option value="32" itemvalue="32">台湾</option>
						<option value="33" itemvalue="33">香港</option>
						<option value="34" itemvalue="34">澳门</option>
					</select>
					<select data-duplex-changed="@changeCity()" name="city" avalon-events="change:_6">
						<option value="0">请选择城市</option>
						<!--ms-for:($index, item) in @cityList-->
						<!--ms-for-end:-->
					</select>
					<select name="district" avalon-events="change:_6">
						<option value="0">请选择地区</option>
						<!--ms-for:($index, item) in @areaList-->
						<!--ms-for-end:-->
					</select>
				</form>
				<a href="javascript:;" class="entering" avalon-events="click:eclick_0_64submit4041">招商加盟</a>
			</div>
			<div class="seller-info-img" style="float: left;"><img src="assets/index/img/join-img2.jpg"></div>
		</div>
	</div>
</div>		
<script type="text/javascript" src="assets/index/js/cityData.js"></script>
<script>
    var app = avalon.define({
        $id: "app",
        provList: [],
        cityList: [],
        areaList: [],
        prov: 0,
        city: 0,
        area: 0,
        name: '',
        wechat: '',
        phone: '',
        companyName: '',
        qq: '',
        init: function() {
           /* var settings = {
                type: "get",
                url: "js/mdcweb01/area.json",
                dataType: 'json'
            };
            var success = function(res) {
                app.provList = res.provList;
            };
            var error = function(msg) {
                console.log(msg)
            };
            settings.success = success;
            settings.error = error;
            $.ajax(settings);*/
            app.provList = cityData;
        },
        changeProv: function() {
            if (app.prov != 0) {
                app.cityList = app.provList[app.prov - 1].sub;
            }
            app.city = 0;
            app.area = 0;
            app.areaList = [];
        },
        changeCity: function() {
            if (app.city != 0) {
                app.areaList = app.cityList[app.city - 1].sub;
            }
            app.area = 0;
        },
        submit: function() {
            let mobile = /^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\d{8}$/;
            if (app.name == "" || app.companyName == "" || app.phone == "" ) {
                alert('请填写正确的信息');
            } else {
                if (mobile.test(app.phone)) {
                    //此处 ajax提交表单
                    applyAgenterOrder();
                } else {
                    alert('请填写正确的手机号')
                }
            }

        }
    });
    app.init();

    function applyAgenterOrder() {
        var companyName =app.companyName;
        var contactName =app.name;
        var phoneNum =app.phone;
        var provinceId =  $("select[name=province]").find("option[value="+app.prov+"]").attr("itemValue");
        var cityId =  $("select[name=city]").find("option[value="+app.city+"]").attr("itemValue");
        var districtId =$("select[name=district]").find("option[value="+app.area+"]").attr("itemValue");
        console.log(companyName,contactName,phoneNum,provinceId,cityId,districtId);

        $.ajax({
            url : "https://163.gg/web/Index_applyAgenterOrder",
            data : {
                companyName : companyName,
                contactName : contactName,
                phoneNum : phoneNum,
                provinceId:provinceId,
                cityId:cityId,
                districtId:districtId,
                applyProjectType:30
            },
            dataType :"JSONP",
            jsonp:"callback",
            jsonpCallback:"jsonpCallback",
            cache : false,
            type : "POST",
            success : function(dat){
                /*   if(dat.code==1){
                      alert(dat.msg);
                      $('input[name=companyName]').val('');
                      $('input[name=contactName]').val('');
                      $('input[name=phoneNum]').val('');
                      cityChange(provinceQuery,cityQuery,districtQuery);
                  }else if(dat.code==0){
                      alert(dat.msg);
                  } */
            }
        });
    }
    function jsonpCallback(dat){
        if(dat.code==1){
            alert(dat.msg);
            $('input[name=companyName]').val('');
            $('input[name=contactName]').val('');
            $('input[name=phoneNum]').val('');
            cityChange(provinceQuery,cityQuery,districtQuery);
        }else if(dat.code==0){
            alert(dat.msg);
        }
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