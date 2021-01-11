<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:52:"D:\www\ppp\PHP/application/index\view\user\index.php";i:1576205494;s:56:"D:\www\ppp\PHP\application\index\view\layouts\layout.php";i:1576483397;}*/ ?>
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
        <link rel="stylesheet" href="assets/store/css/amazeui.min.css"/>
<link rel="stylesheet" href="assets/store/css/wechat.app.css"/>
<script src="assets/layer/layer.js"></script>
<script src="assets/store/js/jquery.form.min.js"></script>
<script src="assets/store/js/amazeui.min.js"></script>
<script src="assets/store/js/wechat.app.js"></script>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">小程序列表</div>
                </div>
                <div class="widget-body am-fr">
					<!-- 工具栏 -->
                    <div class="page_toolbar am-margin-bottom-xs am-cf">
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-form-group">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success" href="<?= url('user/addWxapp') ?>">
                                        <span class="am-icon-plus"></span> 创建
                                    </a>
                                </div>
							</div>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>头像</th>
                                <th>名称</th>
                                <th>类型</th>
                                <th>状态</th>
                                <th>版本</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['wxapp_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['head_img']?$item['head_img']:'./assets/store/img/wechatapp.png' ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['head_img']?$item['head_img']:'./assets/store/img/wechatapp.png' ?>" width="50" height="50" alt="小程序图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['app_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['app_type']['text'] ?></td>
                                    <td class="am-text-middle"><?= $item['is_empower']['text'] ?></td>
                                    <td class="am-text-middle"><?= $item['edition'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('user/wxappLogin',
                                                ['wxapp_id' => $item['wxapp_id']]) ?>" target="_blank">
                                                <i class="am-icon-pencil"></i> 管理
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['wxapp_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="9" class="am-text-center">暂无记录</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
					
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('user/delete') ?>";
        $('.item-delete').delete('wxapp_id', url);

    });
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