<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">模板列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>模板ID</th>
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
                                    <td class="am-text-middle"><?= $item['template_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['user_version'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['user_desc'] ?></td>
									<td class="am-text-middle"><?= $item['developer'] ?></td>
                                    <td class="am-text-middle"><?= date("Y-m-d H:i:s",$item['create_time']) ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['template_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
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
        var url = "<?= url('wxapp.template/deleteTemplate') ?>";
        $('.item-delete').delete('template_id', url);

    });
</script>

