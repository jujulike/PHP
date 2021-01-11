<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">关键字回复</div>
                </div>
                <div class="widget-body am-fr">
					<div class="am-u-sm-12 am-u-md-3">
						<div class="am-form-group">
							<div class="am-btn-group am-btn-group-xs">
								<a class="am-btn am-btn-default am-btn-success" href="<?= url('wechat.keyword/add') ?>">
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
                                <th>记录ID</th>
                                <th>关键字</th>
                                <th>回复类型</th>
                                <th>当前状态</th>
                                <th>添加时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$list->isEmpty()): foreach ($list as $item): ?>
                                <tr>
                                    <td class="am-text-middle"><?= $item['keyword_id'] ?></td>
                                    <td class="am-text-middle">
                                        <p class="item-title"><?= $item['keyword'] ?></p>
                                    </td>
                                    <td class="am-text-middle">
										<?= $item['type']=='text'?'文字消息':''?>
										<?= $item['type']=='image'?'图片消息':''?>
										<?= $item['type']=='voice'?'语音消息':''?>
										<?= $item['type']=='video'?'视频消息':''?>
										<?= $item['type']=='music'?'音乐消息':''?>
										<?= $item['type']=='news'?'图文消息':''?>
									</td>
                                    <td class="am-text-middle">
                                            <span class="j-state am-badge x-cur-p  <?= $item['is_open']?' am-badge-success':' am-badge-warning' ?>" 
                                                 data-id="<?= $item['keyword_id'] ?>" 
												 data-state="<?= $item['is_open'] ?>">
                                            <?= $item['is_open']?'开启':'关闭' ?>
                                            </span>
                                    </td>
                                    <td class="am-text-middle"><?= $item['create_time'] ?></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url('wechat.keyword/edit',
                                                ['keyword_id' => $item['keyword_id']]) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="item-delete tpl-table-black-operation-del"
                                               data-id="<?= $item['keyword_id'] ?>">
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
		
		// 状态
        $('.j-state').click(function () {
            // 验证权限
            if (!"1") {
                return false;
            }
            var data = $(this).data();
            layer.confirm('确定要' + (parseInt(data.state) === 1 ? '关闭' : '开启') + '？'
                , {title: '友情提示'}
                , function (index) {
                    $.post("<?= url('wechat.keyword/isOpen')?>"
                        , {keyword_id: data.id}
                        , function (result) {
                            result.code === 1 ? $.show_success(result.msg, result.url)
                                : $.show_error(result.msg);
                        });
                    layer.close(index);
                });

        });
        // 删除元素
        var url = "<?= url('wechat.keyword/delete') ?>";
        $('.item-delete').delete('keyword_id', url);

    });
</script>

