<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">用户积分流水</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>头像</th>
                                <th>昵称</th>
                                <th>状态</th>
                                <th>数值</th>
                                <th>原由</th>
								<th>时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['score_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['user']['avatarUrl'] ? $item['user']['avatarUrl'] : 'assets/store/img/head-no.png' ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['user']['avatarUrl'] ? $item['user']['avatarUrl'] : 'assets/store/img/head-no.png' ?>" width="72" height="72" alt="">
                                        </a>
                                    </td>
                                    <td class="am-text-middle"><?= $item['user']['nickName'] ?: '--' ?></td>
                                    <td class="am-text-middle">
                                            <span class="<?= $item['status']['value'] == 0 ? 'am-badge am-badge-warning'
                                                : 'am-badge am-badge-secondary' ?>">
                                            <?= $item['status']['text'] ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['values'] ?></td>
									<td class="am-text-middle"><?= $item['reason'] ?></td>
									<td class="am-text-middle"><?= $item['create_time'] ?></td>
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

