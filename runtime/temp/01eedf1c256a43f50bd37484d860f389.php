<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:\www\ppp\PHP/application/store\view\goods\index.php";i:1576398827;s:56:"D:\www\ppp\PHP\application\store\view\layouts\layout.php";i:1576159280;}*/ ?>
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
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">出售中的商品</div>
                </div>
                <div class="widget-body am-fr">
					<!-- 工具栏 -->
                    <div class="page_toolbar am-margin-bottom-xs am-cf">
                        <form class="toolbar-form" action="">
                            <input type="hidden" name="s" value="/store/goods/index">
                            <div class="am-u-sm-12 am-u-md-3">
                                <div class="am-form-group">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-success" href="<?= url('goods/add') ?>">
                                            <span class="am-icon-plus"></span> 新增
                                        </a>
                                    </div>
									<div class="am-btn-group am-btn-group-xs">
										<a class="am-btn am-btn am-btn-secondary am-radius" href="<?= url('goods/thumbnail') ?>">
                                            一键生成缩略图
                                        </a>
                                    </div>
								</div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-9">
                                <div class="am fr">
                                    <div class="am-form-group am-fl">
                                        <select name="category_id" data-am-selected="{searchBox: 1, btnSize: 'sm',  placeholder: '商品分类', maxHeight: 400}">
                                            <option value=""></option>
											<?php if (isset($catgory)): foreach ($catgory as $first): ?>
												<option value="<?= $first['category_id'] ?>"><?= $first['name'] ?></option>
												<?php if (isset($first['child'])): foreach ($first['child'] as $two): ?>
													<option value="<?= $two['category_id'] ?>"><?= $two['name'] ?></option>
													<?php if (isset($two['child'])): foreach ($two['child'] as $three): ?>
														<option value="<?= $three['category_id'] ?>"><?= $three['name'] ?></option>
													<?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <select name="status" data-am-selected="{btnSize: 'sm', placeholder: '商品状态'}">
                                            <option value=""></option>
                                            <option value="10" >上架</option>
                                            <option value="20" >下架</option>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <div class="am-input-group am-input-group-sm tpl-form-border-form">
                                            <input type="text" class="am-form-field" name="search" placeholder="请输入商品名称" value="">
                                            <div class="am-input-group-btn">
                                                <button class="am-btn am-btn-default am-icon-search" type="submit"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>商品ID</th>
                                <th>商品图片</th>
                                <th>商品名称</th>
                                <th>商品分类</th>
                                <th>实际销量</th>
                                <th>商品排序</th>
                                <th>商品状态</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['goods_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['image'][0]['file_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= './uploads/'.$item['goods_id'].'.jpg' ?>" width="50" height="50" alt="商品图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['goods_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['category']['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['sales_actual'] ?></td>
                                    <td class="am-text-middle"><?= $item['goods_sort'] ?></td>
                                    <td class="am-text-middle">
                                            <span class="j-state am-badge x-cur-p  <?= $item['goods_status']['value'] == 10 ? ' am-badge-success'
                                                : ' am-badge-warning' ?>" 
                                                 data-id="<?= $item['goods_id'] ?>"
                                                 data-state="<?= $item['goods_status']['value'] ?>">
                                            <?= $item['goods_status']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('goods/edit',
                                                ['goods_id' => $item['goods_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['goods_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
											<a class="tpl-table-black-operation-green" 
												href="<?= url('goods/copy',['goods_id' => $item['goods_id']]) ?>">
                                                一键复制
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
		
		// 商品状态
        $('.j-state').click(function () {
            // 验证权限
            if (!"1") {
                return false;
            }
            var data = $(this).data();
            layer.confirm('确定要' + (parseInt(data.state) === 10 ? '下架' : '上架') + '该商品吗？'
                , {title: '友情提示'}
                , function (index) {
                    $.post("index.php?s=/store/goods/state"
                        , {
                            goods_id: data.id,
                            state: Number(!(parseInt(data.state) === 10))
                        }
                        , function (result) {
                            result.code === 1 ? $.show_success(result.msg, result.url)
                                : $.show_error(result.msg);
                        });
                    layer.close(index);
                });

        });
        // 删除元素
        var url = "<?= url('goods/delete') ?>";
        $('.item-delete').delete('goods_id', url);

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
