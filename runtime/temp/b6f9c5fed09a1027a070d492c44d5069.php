<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"D:\www\ppp\PHP/application/admin\view\setting\index.php";i:1576480879;s:56:"D:\www\ppp\PHP\application\admin\view\layouts\layout.php";i:1576379636;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>河马微信第三方平台SaaS系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/icon.png"/>
    <meta name="apple-mobile-web-app-title" content="河马微信第三方平台SaaS系统"/>
    <link rel="stylesheet" href="assets/store/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/store/css/wechat.app.css"/>
    <link rel="stylesheet" href="assets/store/css/iconfont.css">
    <script src="assets/store/css/iconfont.js"></script>
    <script src="assets/store/js/jquery.min.js"></script>
    <script>
        BASE_URL = '<?= isset($base_url) ? $base_url : '' ?>';
        STORE_URL = '<?= isset($admin_url) ? $admin_url : '' ?>';
    </script>
</head>

<body data-type="">
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header class="tpl-header">
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">
            <!-- 侧边切换 -->
            <div class="am-fl tpl-header-button switch-button">
                <i class="iconfont icon-menufold"></i>
            </div>
            <!-- 刷新页面 -->
            <div class="am-fl tpl-header-button refresh-button">
                <i class="iconfont icon-refresh"></i>
            </div>
            <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="#">欢迎你，<span><?= $admin['user']['user_name'] ?></span>
                        </a>
                    </li>
                    <!-- 退出 -->
                    <li class="am-text-sm">
                        <a href="<?= url('passport/logout') ?>">
                            <i class="iconfont icon-tuichu"></i> 退出
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <?php $menus = $menus ?: []; $group = $group ?: 0; ?>
        <!-- 一级菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-heading">系统管理</li>
            <?php foreach ($menus as $key => $item): ?>
                <li class="sidebar-nav-link">
                    <a href="<?= isset($item['index']) ? url($item['index']) : 'javascript:void(0);' ?>"
                       class="<?= $item['active'] ? 'active' : '' ?>">
                        <?php if (isset($item['is_svg']) && $item['is_svg'] === true): ?>
                            <svg class="icon sidebar-nav-link-logo" aria-hidden="true">
                                <use xlink:href="#<?= $item['icon'] ?>"></use>
                            </svg>
                        <?php else: ?>
                            <i class="iconfont sidebar-nav-link-logo <?= $item['icon'] ?>"
                               style="<?= isset($item['color']) ? "color:{$item['color']};" : '' ?>"></i>
                        <?php endif; ?>
                        <?= $item['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- 子级菜单-->
        <?php $second = isset($menus[$group]['submenu']) ? $menus[$group]['submenu'] : []; if (!empty($second)) : ?>
            <ul class="left-sidebar-second">
                <li class="sidebar-second-title"><?= $menus[$group]['name'] ?></li>
                <li class="sidebar-second-item">
                    <?php foreach ($second as $item) : if (!isset($item['submenu'])): ?>
                            <!-- 二级菜单-->
                            <a href="<?= url($item['index']) ?>" class="<?= $item['active'] ? 'active' : '' ?>">
                                <?= $item['name']; ?>
                            </a>
                        <?php else: ?>
                            <!-- 三级菜单-->
                            <div class="sidebar-third-item">
                                <a href="javascript:void(0);"
                                   class="sidebar-nav-sub-title <?= $item['active'] ? 'active' : '' ?>">
                                    <i class="iconfont icon-caret"></i>
                                    <?= $item['name']; ?>
                                </a>
                                <ul class="sidebar-third-nav-sub">
                                    <?php foreach ($item['submenu'] as $third) : ?>
                                        <li>
                                            <a class="<?= $third['active'] ? 'active' : '' ?>"
                                               href="<?= url($third['index']) ?>">
                                                <?= $third['name']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; endforeach; ?>
                </li>
            </ul>
        <?php endif; ?>
    </div>

    <!-- 内容区域 start -->
    <div class="tpl-content-wrapper <?= empty($second) ? 'no-sidebar-second' : '' ?>">
        <div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">基本信息设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 网站名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_name]"
                                           value="<?= $model['web_name'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 网站域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_domain]"
                                           value="<?= $model['web_domain'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 联系电话 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[component_phone]"
                                           value="<?= $model['component_phone'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 备案 ICP </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_icp]"
                                           value="<?= $model['web_icp'] ?>">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 站点描述 </label>
                                <div class="am-u-sm-9">
									<input type="text" class="tpl-form-input" name="config[web_description]"
                                           value="<?= $model['web_description'] ?>">
                                </div>
                            </div>							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 关键字 </label>
                                <div class="am-u-sm-9">
									<textarea class="" rows="4" placeholder="请输入关键字"
                                              name="config[web_keywords]"><?= $model['web_keywords'] ?></textarea>
                                </div>
                            </div>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">第三方参数设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> AppID </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[app_id]"
                                           value="<?= $admin['user']['status']>0?'********':$model['app_id'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> AppSecret </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[app_secret]"
                                           value="<?= $admin['user']['status']>0?'********':$model['app_secret'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> EncodingAesKey </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[encoding_aes_key]"
                                           value="<?= $admin['user']['status']>0?'********':$model['encoding_aes_key'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> Token </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[token]"
                                           value="<?= $model['token'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 业务域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[api_domain]"
                                           value="<?= $model['api_domain'] ?>" required>
                                </div>
                            </div>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">微信支付设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付商户号 <span class="tpl-form-line-small-title">MCHID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[mchid]"
                                           value="<?= $admin['user']['status']>0?'********':$model['mchid']?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付密钥 <span class="tpl-form-line-small-title">APIKEY</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[apikey]"
                                           value="<?= $admin['user']['status']>0?'********':$model['apikey']?>">
                                </div>
                            </div>
							
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
		
        /**
         * 表单验证提交
         */
        $('#my-form').superForm();

    });
</script>

    </div>
    <!-- 内容区域 end -->
</div>
<script src="assets/layer/layer.js"></script>
<script src="assets/store/js/jquery.form.min.js"></script>
<script src="assets/store/js/amazeui.min.js"></script>
<script src="assets/store/js/webuploader.html5only.js"></script>
<script src="assets/store/js/art-template.js"></script>
<script src="assets/store/js/wechat.app.js"></script>
<script src="assets/store/js/file.library.js"></script>
</body>

</html>
