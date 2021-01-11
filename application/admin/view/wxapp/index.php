<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">小程序列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                            <tr>
                                <th>编号ID</th>
                                <th>小程序LOGO</th>
                                <th>小程序名称</th>
								<th>商户ID</th>
                                <th>联系电话</th>
								<th>应用类型</th>
                                <th>是否授权</th>
                                <th>创建时间</th>
                                <th>管理操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['wxapp_id'] ?></td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['head_img']?$item['head_img']:'./assets/store/img/wechatapp.png' ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['head_img']?$item['head_img']:'./assets/store/img/wechatapp.png' ?>" width="50" height="50" alt="小程序图片">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['app_name']?$item['app_name']:'--' ?></p>
                                    </td>
									<td class="am-text-middle"><?= $item['store_user_id'] ?></td>
                                    <td class="am-text-middle"><?= $item['phone']?$item['phone']:'--' ?></td>
                                    <td class="am-text-middle"><?= $item['app_type']['text'] ?></td>
                                    <td class="am-text-middle">
										<span class="<?= $item['is_empower']['value'] === 0 ? 'x-color-red'
                                                : 'x-color-green' ?>">
                                            <?= $item['is_empower']['text'] ?>
                                         </span>
									</td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
											<a href="<?= url('wxapp/appLogin',['wxapp_id' => $item['wxapp_id']])?>" target="_blank">
                                                管理登录
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['wxapp_id'] ?>">
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

        // 删除元素
        var url = "<?= url('wxapp/delete') ?>";
        $('.item-delete').delete('wxapp_id', url);

    });
</script>

