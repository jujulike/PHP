<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\www\ppp\PHP/application/store\view\market\score\setting.php";i:1572623300;s:56:"D:\www\ppp\PHP\application\store\view\layouts\layout.php";i:1576159280;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title><?= $setting['store']['values']['name'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" href="assets/icon.png" type="image/x-icon">
    <meta name="apple-mobile-web-app-title" content="<?= $setting['store']['values']['name'] ?>"/>
    <link rel="stylesheet" href="assets/store/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/store/css/wechat.app.css"/>
    <link rel="stylesheet" href="//at.alicdn.com/t/font_783249_eny6sz92d8f.css">
    <script src="assets/store/js/jquery.min.js"></script>
    <script src="//at.alicdn.com/t/font_783249_e5yrsf08rap.js"></script>
    <script>
        BASE_URL = '<?= isset($base_url) ? $base_url : '' ?>';
        STORE_URL = '<?= isset($store_url) ? $store_url : '' ?>';
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
                        <a href="">欢迎你，<span><?= $store['user']['user_name'] ?></span>
                        </a>
                    </li>
					<!-- 消息 -->
                    <li class="am-text-sm">
                        <a href="<?= url() ?>">
                            <i class="iconfont icon-xiaoxi1"></i> 消息
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
            <li class="sidebar-nav-heading"><?= $store['wxapp']['app_type']['text'].'管理' ?></li>
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
                                <div class="widget-title am-fl">积分设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分名称 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <input type="text" class="tpl-form-input" name="score[name]"
                                           value="<?=$values['name'] ?>" required>
                                    <div class="help-block">
                                        <small>注：修改积分名称后，在买家端的所有页面里，看到的都是自定义的名称</small>
                                    </div>
                                    <div class="help-block">
                                        <small>注：商家使用自定义的积分名称来做品牌运营。如京东把积分称为“京豆”，淘宝把积分称为“淘金币”</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 积分说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea rows="5" name="score[describe]"
                                              placeholder="请输入积分说明/规则"><?=$values['describe'] ?></textarea>
                                </div>
                            </div>

                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">积分赠送</div>
                            </div>
                            <div class="am-form-group am-padding-top">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 是否开启消费送积分 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[is_open]" value="1" data-am-ucheck
                                            <?= $values['is_open']==1 ? 'checked':'' ?> > 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[is_open]" value="0" data-am-ucheck
                                            <?= $values['is_open']==0 ? 'checked':'' ?>> 关闭
                                    </label>
                                    <div class="help-block">
                                        <small>注：如开启则订单完成后赠送用户积分</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分赠送倍数 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group">
                                        <input type="number" name="score[gift_multiple]"
                                               class="am-form-field" min="1"
                                               value="<?= $values['gift_multiple'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">倍</span>
                                    </div>
                                    <div class="help-block">
                                        <small>注：赠送比例请填写数字0~100；订单的运费不参与积分赠送</small>
                                    </div>
                                    <div class="help-block">
                                        <small>例：订单付款金额(100.00元) * 积分赠送比例(10) = 实际赠送的积分(1000积分)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">积分抵扣</div>
                            </div>
                            <div class="am-form-group am-padding-top">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 是否开启下单积分抵扣 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[discount]" value="1" data-am-ucheck
                                            <?= $values['discount']==1 ? 'checked':'' ?> > 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[discount]" value="0" data-am-ucheck
                                            <?= $values['discount']==0 ? 'checked':'' ?>> 关闭
                                    </label>
                                    <div class="help-block">
                                        <small>注：如开启则用户下单时可选择使用积分抵扣订单金额</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分抵扣比例 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group">
                                        <span class="am-input-group-label am-input-group-label__left">1个积分可抵扣</span>
                                        <input type="number" class="am-form-field" min="0.01"
                                               name="score[discount_ratio]"
                                               value="<?= $values['discount_ratio'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">元</span>
                                    </div>
                                    <div class="help-block">
                                        <small>例如填写0.01，1积分可抵扣0.01元，100积分则可抵扣1元，1000积分则可抵扣10元</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 抵扣条件 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group am-form-group">
                                        <span class="am-input-group-label am-input-group-label__left">订单满</span>
                                        <input type="number" class="am-form-field" min="0"
                                               name="score[order_price]"
                                               value="<?= $values['order_price'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">元</span>
                                    </div>
                                    <div class="am-input-group am-form-group am-margin-top-sm">
                                        <span class="am-input-group-label am-input-group-label__left">
                                            最高可抵扣金额
                                        </span>
                                        <input type="number" class="am-form-field" min="0" max="100"
                                               name="score[discount_money]"
                                               value="<?= $values['discount_money'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">%</span>
                                    </div>
                                    <div class="help-block">
                                        <small>温馨提示：例如订单金额100元，最高可抵扣10%，此时用户可抵扣10元</small>
                                    </div>
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
         * @type {*}
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
