<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">管理员列表</div>
                </div>
                <div class="widget-body am-fr">
					<div class="am-u-sm-12 am-u-md-3">
						<div class="am-form-group">
							<div class="am-btn-group am-btn-group-xs">
								<a class="am-btn am-btn-default am-btn-success" href="<?= url('role.user/add') ?>">
									<span class="am-icon-plus"></span> 新增
								</a>
							</div>
						</div>
					</div> 
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>管理员ID</th>
                                <th>用户名</th>
                                <th>姓名</th>
								<th>角色</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
								<?php if($admin['user']['role']==0):?>
								<tr>
                                    <td class="am-text-middle"><?= $store['store_user_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $store['user_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"> - - </td>
                                    <td class="am-text-middle">超级管理员</td>
                                    <td class="am-text-middle"><?= $store['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('role.user/renew') ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                        </div>
                                    </td>
                                </tr>
								<?php endif;?>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['role_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['user_name'] ?></p>
                                    </td>
                                    <td class="am-text-middle"><?= $item['real_name'] ?></td>
                                    <td class="am-text-middle"><?= $item['category']['name'] ?></td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('role.user/edit',
                                                ['role_id' => $item['role_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['role_id'] ?>">
                                                <i class="am-icon-trash"></i> 删除
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
        // 删除
        var url = "<?= url('role.user/delete') ?>";
        $('.item-delete').delete('role_id', url);

    });
</script>

