<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">编辑设备</div>
                            </div>
							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">所在位置 </label>
                                <div class="am-u-sm-9 am-u-end" style="line-height: 40px;vertical-align: middle;"><?= $model['place']['text'] ?></div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">云端账号 </label>
                                <div class="am-u-sm-9 am-u-end" style="line-height: 40px;vertical-align: middle;"><?= $model['open_user_id'] ?></div>
                            </div>
							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">设备编号 </label>
                                <div class="am-u-sm-9 am-u-end" style="line-height: 40px;vertical-align: middle;"><?= $model['uuid']['value'] ?></div>
                            </div>
							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">设备状态 </label>
                                <div class="am-u-sm-9 am-u-end" style="line-height: 40px;vertical-align: middle;">
									<span class="<?= $model['uuid']['text'] == '正常' ? 'x-color-green'
                                                : 'x-color-red' ?>">
                                            <?= $model['uuid']['text'] ?>
                                    </span>
								</div>
                            </div>
							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">设备名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="printer[title]"
                                           value="<?= $model['title'] ?>" placeholder="请为设备自定义个名称" required>
                                </div>
                            </div>
							
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
