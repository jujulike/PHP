<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">草稿列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>草稿ID</th>
                                <th>版本号</th>
                                <th>描述</th>
								<th>开发者</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (sizeof($list)>0): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['draft_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['user_version'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['user_desc'] ?></td>
									<td class="am-text-middle"><?= $item['developer'] ?></td>
                                    <td class="am-text-middle"><?= date("Y-m-d H:i:s",$item['create_time']) ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
											<a href="<?= url('wxapp.template/draft',
                                                ['draft_id' => $item['draft_id']]) ?>">
                                                <i class="am-icon-plus"></i> 添加到模板库
                                            </a>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        // 删除元素
        var url = "<?= url('wxapp.template/add') ?>";
        $('.item-delete').delete('draft_id', url);

    });
</script>

