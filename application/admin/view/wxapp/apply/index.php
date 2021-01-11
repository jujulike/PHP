<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">商户申请认证列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>信息ID</th>
                                <th>企业名称</th>
                                <th>法人姓名</th>
                                <th>联系电话</th>
								<th>应用ID</th>
                                <th>状态</th>
								<th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['authentication_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['legal_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['legal_persona_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['legal_persona_phone'] ?></td>
                                    <td class="am-text-middle"><?= $item['wxapp_id'] ?></td>
									<td class="am-text-middle">
										<span class="<?= $item['status']['value'] == 10 ? 'x-color-green'
                                                : $item['status']['value'] == 30 ? 'x-color-red' :'' ?>">
                                            <?= $item['status']['text'] ?>
                                         </span>
									</td>
                                    <td class="am-text-middle"><?= $item['update_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.apply/detail',
                                                ['authentication_id' => $item['authentication_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 审查
                                            </a>
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

