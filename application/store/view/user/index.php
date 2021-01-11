<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">用户列表</div>
                </div>
                <div class="widget-body am-fr">
					<!-- 工具栏 -->
                    <div class="page_toolbar am-margin-bottom-xs am-cf">
                        <form class="toolbar-form" action="" method="POST">
                            <input type="hidden" name="s" value="/store/user/index">
                            <div class="am-u-sm-12 am-u-md-9 am-u-sm-push-3">
                                <div class="am fr">
                                    <div class="am-form-group am-fl">
                                        <select name="user_grade_id" data-am-selected="{btnSize: 'sm', placeholder: '请选择会员等级'}">
                                            <option value=""></option>
											<?php if (!$grade->isEmpty()): ?>
												<option value="-1">全部</option>
												<option value="0">未开通</option>
											<?php foreach ($grade as $item): ?>
												<option value="<?= $item['user_grade_id'] ?>"><?= $item['name'] ?></option>
											<?php endforeach; endif;?>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <select name="gender" data-am-selected="{btnSize: 'sm', placeholder: '请选择性别'}">
                                            <option value=""></option>
                                            <option value="-1">全部</option>
                                            <option value="1">男</option>
                                            <option value="2">女</option>
                                            <option value="0">未知</option>
                                        </select>
                                    </div>
                                    <div class="am-form-group am-fl">
                                        <div class="am-input-group am-input-group-sm tpl-form-border-form">
                                            <input type="text" class="am-form-field" name="search" placeholder="请输入微信昵称、ID、手机号！" value="">
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
                                <th>用户ID</th>
                                <th>微信头像</th>
                                <th>微信昵称</th>
								<th>钱包余额</th>
                                <th>会员积分</th>
                                <th>会员等级</th>
                                <th>消费金额</th>
                                <th>性别</th>
                                <th>国家</th>
                                <th>省份</th>
                                <th>城市</th>
                                <th>注册时间</th>
								<th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['user_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['avatarUrl'] ? $item['avatarUrl'] : 'assets/store/img/head-no.png' ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['avatarUrl'] ? $item['avatarUrl'] : 'assets/store/img/head-no.png' ?>" width="72" height="72" alt="">
                                        </a>
                                    </td>
                                    <td class="am-text-middle"><?= $item['nickName'] ?: '--' ?></td>
									<td class="am-text-middle"><?= $item['wallet'] ?></td>
									<td class="am-text-middle"><?= $item['score'] ?></td>
									<td class="am-text-middle"><?= $item['mobile']?$item['grade']['name']:'暂未开通' ?></td>
									<td class="am-text-middle"><?= $item['pay'] ?></td>
                                    <td class="am-text-middle"><?= $item['gender'] ?></td>
                                    <td class="am-text-middle"><?= $item['country'] ?: '--' ?></td>
                                    <td class="am-text-middle"><?= $item['province'] ?: '--' ?></td>
                                    <td class="am-text-middle"><?= $item['city'] ?: '--' ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
									<td class="am-text-middle">
										<div class="tpl-table-black-operation">
                                            <a class="j-recharge tpl-table-black-operation-default"
                                                href="javascript:void(0);"
                                                title="用户充值"
                                                data-id="<?= $item['user_id'] ?>"
                                                data-balance="<?= $item['wallet'] ?>"
                                                data-points="<?= $item['score'] ?>"
                                            >
												<i class="iconfont icon-qiandai"></i>
                                                充值
                                            </a>
                                            <a class="j-detail tpl-table-black-operation-default"
                                                href="javascript:void(0);"
                                                data-id="<?= $item['user_id'] ?>"
												data-open_id="<?= $item['open_id'] ?>"
												data-mobile="<?= $item['mobile'] ?>"
												data-update_time="<?= $item['update_time'] ?>"
                                                title="用户详情"
											>
                                                <i class="iconfont icon-grade-o"></i>
                                                详情
                                            </a>
                                            <a class="j-delete tpl-table-black-operation-default"
                                                href="javascript:void(0);"
                                                data-id="<?= $item['user_id'] ?>" title="删除用户"
											>
                                                <i class="am-icon-trash"></i> 
												删除
                                            </a>
                                            <div class="j-opSelect operation-select am-dropdown">
                                                <button type="button" class="am-dropdown-toggle am-btn am-btn-sm am-btn-secondary">
                                                    <span>更多</span>
                                                    <span class="am-icon-caret-down"></span>
                                                </button>
                                                <ul class="am-dropdown-content" data-id="<?= $item['user_id'] ?>">
                                                    <li>
                                                        <a class="am-dropdown-item" target="_blank" 
															href="index.php?s=/store/order/all_list/user_id/<?= $item['user_id'] ?>">
															用户订单
														</a>
                                                    </li>
                                                    <li>
                                                        <a class="am-dropdown-item" target="_blank"
                                                            href="index.php?s=/store/user.recharge/order/user_id/<?= $item['user_id'] ?>">
															充值记录
														</a>
                                                    </li>
                                                    <li>
                                                        <a class="am-dropdown-item" target="_blank"
                                                            href="index.php?s=/store/user.balance/log/user_id/<?= $item['user_id'] ?>">
															余额明细
														</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
									</td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="8" class="am-text-center">暂无记录</td>
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

<!-- 模板：用户充值 -->
<script id="tpl-recharge" type="text/template">
    <div class="am-padding-xs am-padding-top-sm">
        <form id="my-form" class="am-form tpl-form-line-form" method="post" action="">
            <div class="j-tabs am-tabs">

                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="#tab1">充值余额</a></li>
                    <li><a href="#tab2">充值积分</a></li>
                </ul>

                <div class="am-tabs-bd am-padding-xs">

                    <div class="am-tab-panel am-padding-0 am-active" id="tab1">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                当前余额
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <div class="am-form--static">{{ balance }}</div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                充值方式
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[balance][mode]"
                                           value="inc" data-am-ucheck checked>
                                    增加
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[balance][mode]" value="dec" data-am-ucheck>
                                    减少
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[balance][mode]" value="final" data-am-ucheck>
                                    最终金额
                                </label>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label form-require">
                                变更金额
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <input type="number" min="0" class="tpl-form-input"
                                       placeholder="请输入要变更的金额" name="recharge[balance][money]" value="" required>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                管理员备注
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <textarea rows="2" name="recharge[balance][remark]" placeholder="请输入管理员备注"
                                          class="am-field-valid"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="am-tab-panel am-padding-0" id="tab2">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                当前积分
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <div class="am-form--static">{{ points }}</div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                充值方式
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[points][mode]"
                                           value="inc" data-am-ucheck checked>
                                    增加
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[points][mode]" value="dec" data-am-ucheck>
                                    减少
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" name="recharge[points][mode]" value="final" data-am-ucheck>
                                    最终积分
                                </label>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label form-require">
                                变更数量
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <input type="number" min="0" class="tpl-form-input"
                                       placeholder="请输入要变更的数量" name="recharge[points][value]" value="" required>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">
                                管理员备注
                            </label>
                            <div class="am-u-sm-8 am-u-end">
                                <textarea rows="2" name="recharge[points][remark]" placeholder="请输入管理员备注"
                                          class="am-field-valid"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</script>

<script>
    $(function () {

        /**
         * 账户充值
         */
        $('.j-recharge').on('click', function () {
            var $tabs, data = $(this).data();
            $.showModal({
                title: '用户充值'
                , area: '460px'
                , content: template('tpl-recharge', data)
                , uCheck: true
                , success: function ($content) {
                    $tabs = $content.find('.j-tabs');
                    $tabs.tabs({noSwipe: 1});
                }
                , yes: function ($content) {
                    $content.find('form').myAjaxSubmit({
                        url: 'index.php?s=/store/user/recharge',
                        data: {
                            user_id: data.id,
                            source: $tabs.data('amui.tabs').activeIndex
                        }
                    });
                    return true;
                }
            });
        });

        /**
         * 会员信息详情
        */
        $('.j-detail').on('click', function () {
            var data = $(this).data();
            $.showModal({
                title: '会员信息详情'
                , area: '460px'
                , content: template('tpl-detail', data)
                , uCheck: true
                , success: function ($content) {
                }
                , yes: function ($content) {
                    $content.find('form').myAjaxSubmit({
                        url: '',
                        data:''
                    });
                    return true;
                }
            });
        });
		

        /**
         * 注册操作事件
         * @type {jQuery|HTMLElement}
         */
        var $dropdown = $('.j-opSelect');
        $dropdown.dropdown();
        $dropdown.on('click', 'li a', function () {
            var $this = $(this);
            var id = $this.parent().parent().data('id');
            var type = $this.data('type');
            if (type === 'delete') {
                layer.confirm('删除后不可恢复，确定要删除吗？', function (index) {
                    $.post("index.php?s=/store/apps.dealer.user/delete", {dealer_id: id}, function (result) {
                        result.code === 1 ? $.show_success(result.msg, result.url)
                            : $.show_error(result.msg);
                    });
                    layer.close(index);
                });
            }
            $dropdown.dropdown('close');
        });

        // 删除元素
        var url = "index.php?s=/store/user/delete";
        $('.j-delete').delete('user_id', url, '删除后不可恢复，确定要删除吗？');
		
		/**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();
		
    });
</script>

<!-- 模板：会员信息详情 -->
<script id="tpl-detail" type="text/template">
    <div class="am-padding-xs am-padding-top">
        <div class="am-tab-panel am-padding-0 am-active">
            <div>用户编号：{{ id }}</div>
			<div>微信编号：{{ open_id }}</div>
			<div>手机号码：{{ mobile }}</div>
			<div>推 荐 人 ：{{ recommender }}</div>
			<div>佣金收入：{{ commission }}</div>
			<div>更新时间：{{ update_time }}</div>
        </div>
    </div>
</script>


