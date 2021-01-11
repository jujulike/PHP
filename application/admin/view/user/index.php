<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">用户列表</div>
                </div>
                <div class="widget-body am-fr">
					<div class="tips am-margin-bottom-sm am-u-sm-12">
                        <div class="pre">
                            <p> 重置密码：自动设置为123456</p>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>用户ID</th>
                                <th>用户账号</th>
                                <th>应用数量</th>
                                <th>企业认证</th>
                                <th>注册时间</th>
								<th>管理操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['store_user_id'] ?></td>
                                    <td class="am-text-middle">
										<p>
											<?= $item['user_name'] ?>
										</p>
									</td>
                                    <td class="am-text-middle">--</td>
                                    <td class="am-text-middle">--</td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
									<td class="am-text-middle">
										<div class="tpl-table-black-operation">
                                            <a href="<?= url('user/resetPwd',['user_name' => $item['user_name']]) ?>">
                                                重置密码
                                            </a>
											<a class="tpl-table-black-operation-del" 
												href="<?= url('user/storeLogin',['user_name' => $item['user_name']])?>" target="_blank">
                                                管理登录
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

