<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">小程序模板代码列表</div>
                </div>
                <div class="widget-body am-fr">
					<div class="tips am-margin-bottom-sm am-u-sm-12">
                        <div class="pre">
							<?php if($new_tpl['status']==0):?>
                            <p>当前已是最新版本，版本号：<?= $new_tpl['user_version'] ?></p>
							<?php endif;?>
							<?php if($new_tpl['status']==1):?>
                            <p>您有新版本需要升级，新版本号：<?= $new_tpl['user_version'] ?></p>
							<?php endif;?>
							<?php if($new_tpl['status']==2):?>
                            <p>您的新版本已上传，新版本号：<?= $new_tpl['user_version'] ?>，当前状态：
								<?= $new_tpl['desc']['status']===0 ?'审核成功，等待发布':'' ?>
								<?= $new_tpl['desc']['status']===1 ?'审核被拒绝，请重新发布':'' ?>
								<?= $new_tpl['desc']['status']===2 ?'审核中，请等待':'' ?>
								<?= $new_tpl['desc']['status']===3 ?'已撤回,请重新发布':'' ?>
								<?= $new_tpl['desc']['status']===4 ?'审核延后，请等待':'' ?>
							</p>
							<?php endif;?>
                        </div>
                    </div>
					<?php if($new_tpl['status']==1 OR (isset($new_tpl['desc']) AND ($new_tpl['desc']['status']===1 OR $new_tpl['desc']['status']===3 ))): ?>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius"
                                       href="<?= url('wxapp.release/add') ?>">
                                        <span class="am-icon-plus"></span> 发布新版本
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                            <tr>
                                <th>列表ID</th>
								<th>模板ID</th>
                                <th>版本</th>
                                <th>描述</th>
								<th>状态</th>
								<th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle">
										<p><?= $item['wxapp_tpl_id'] ?></p>
									</td>
									<td class="am-text-middle"><?= $item['template']['id'] ?></td>
                                    <td class="am-text-middle"><?= $item['template']['user_version'] ?></td>
                                    <td class="am-text-middle"><?= $item['template']['user_desc'] ?></td>
									<td class="am-text-middle">
										<?= $item['status']==1 ?'已发布':'' ?>
										<?= ($item['status']==0 AND $item['desc']['status']===0)?'审核成功，等待发布':'' ?>
										<?= ($item['status']==0 AND $item['desc']['status']===1)?'审核被拒绝，请重新发布':'' ?>
										<?= ($item['status']==0 AND $item['desc']['status']===2)?'审核中，请等待':'' ?>
										<?= ($item['status']==0 AND $item['desc']['status']===3)?'已撤回，请重新发布':'' ?>
										<?= ($item['status']==0 AND $item['desc']['status']===4)?'审核延后，请等待':'' ?>
									</td>
									<td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wxapp.release/edit',
                                                ['wxapp_tpl_id' => $item['wxapp_tpl_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 查看详情
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6" class="am-text-center">您还未发布小程序代码模板</td>
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

