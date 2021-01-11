<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">设备列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius"
                                       href="<?= url('food.printer/add') ?>">
                                        <span class="am-icon-plus"></span> 新增
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                            <tr>
                                <th>编号ID</th>
								<th>所在位置</th>
                                <th>设备名称</th>
								<th>云端账号</th>
								<th>设备编号</th>
								<th>设备状态</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
									<td class="am-text-middle">
                                        <p class="item-title"><?= $item['printer_id'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['place']['text'] ?></td>
                                    <td class="am-text-middle"><?= $item['title'] ?></td>
									<td class="am-text-middle"><?= $item['open_user_id'] ?></td>
									<td class="am-text-middle"><?= $item['uuid']['value'] ?></td>
									<td class="am-text-middle">
                                            <span class="<?= $item['uuid']['text'] == '正常' ? 'x-color-green'
                                                : 'x-color-red' ?>">
                                            <?= $item['uuid']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('food.printer/edit',
                                                ['printer_id' => $item['printer_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['printer_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="4" class="am-text-center">暂无记录</td>
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
        var url = "<?= url('food.printer/delete') ?>";
        $('.item-delete').delete('printer_id', url);

    });
</script>

