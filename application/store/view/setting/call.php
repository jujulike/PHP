<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
														
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">催单上菜</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">是否开启</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[reminder][is_open]" value="1" data-am-ucheck
                                            <?= $values['reminder']['is_open'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[reminder][is_open]" value="0" data-am-ucheck
                                            <?= $values['reminder']['is_open'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">显示标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="call[reminder][title]"
                                          placeholder="请输入显示标题" value="<?= $values['reminder']['title'] ?>" required>
                                </div>
                            </div>
							
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">上茶水服务</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">是否开启</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[tea][is_open]" value="1" data-am-ucheck
                                            <?= $values['tea']['is_open'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[tea][is_open]" value="0" data-am-ucheck
                                            <?= $values['tea']['is_open'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">显示标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="call[tea][title]"
                                          placeholder="请输入显示标题" value="<?= $values['tea']['title'] ?>" required>
                                </div>
                            </div>
							
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">叫服务员服务</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">是否开启</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[water][is_open]" value="1" data-am-ucheck
                                            <?= $values['water']['is_open'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[water][is_open]" value="0" data-am-ucheck
                                            <?= $values['water']['is_open'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">显示标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="call[water][title]"
                                          placeholder="请输入显示标题" value="<?= $values['water']['title'] ?>" required>
                                </div>
                            </div>
							
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">帮打包服务</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">是否开启</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[pack][is_open]" value="1" data-am-ucheck
                                            <?= $values['pack']['is_open'] ? 'checked' : '' ?>> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="call[pack][is_open]" value="0" data-am-ucheck
                                            <?= $values['pack']['is_open'] ? '' : 'checked' ?>> 关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">显示标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="call[pack][title]"
                                          placeholder="请输入显示标题" value="<?= $values['pack']['title'] ?>" required>
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
