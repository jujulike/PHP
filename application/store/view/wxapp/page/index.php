<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">页面列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius"
                                       href="<?= url('wxapp.page/add') ?>">
                                        <span class="am-icon-plus"></span> 新增
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
                                <th>页面ID</th>
                                <th>页面名称</th>
                                <th>页面类型</th>
                                <th>添加时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['page_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['page_data']['array']['page']['params']['name'] ?></p>
                                    </td>
                                    <td class="am-text-middle">
                                            <span class="<?= $item['page_type']['value'] == 10 ? 'am-badge am-badge-warning'
                                                : 'am-badge am-badge-secondary' ?>">
                                            <?= $item['page_type']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
									<td class="am-text-middle"><?= $item['update_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.page/edit',
                                                ['page_id' => $item['page_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
											<?php if ($item['page_type']['value'] == 20) : ?>
												<a href="javascript:;" class="item-delete tpl-table-black-operation-del"
													data-id="<?= $item['page_id'] ?>">
													<i class="am-icon-trash"></i> 删除
												</a>
												<a href="javascript:;" class="j-setHome tpl-table-black-operation-green"
													data-id="<?= $item['page_id'] ?>">
													<i class="iconfont icon-home"></i> 设为首页
												</a>
											<?php endif ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" class="am-text-center">暂无记录</td>
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
        var url = "<?= url('wxapp.page/delete') ?>";
        $('.item-delete').delete('page_id', url);
		
		 // 设为首页
        $('.j-setHome').click(function () {
            var pageId = $(this).attr('data-id');
            layer.confirm('确定要将此页面设置为默认首页吗？', function (index) {
                $.post("index.php?s=/store/wxapp.page/sethome", {page_id: pageId}, function (result) {
                    result.code === 1 ? $.show_success(result.msg, result.url)
                        : $.show_error(result.msg);
                });
                layer.close(index);
            });
        });

    });
</script>

