<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">打印设置</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    是否开启小票打印
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="printer[is_open]" value="1" data-am-ucheck
                                            <?= $values['is_open'] == 1 ? 'checked' : '' ?> required>
                                        开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="printer[is_open]" value="0" data-am-ucheck
                                            <?= $values['is_open'] == 0 ? 'checked' : '' ?> >
                                        关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    打印模式
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="printer[p_model]" value="0" data-am-ucheck
                                            <?= $values['p_model'] == 0 ? 'checked' : '' ?> required>
                                        吧台打印
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="printer[p_model]" value="1" data-am-ucheck
                                            <?= $values['p_model'] == 1 ? 'checked' : '' ?> >
                                        后厨打印
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="printer[p_model]" value="2" data-am-ucheck
                                            <?= $values['p_model'] == 2 ? 'checked' : '' ?> >
                                        两者都打印
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 打印份数 </label>
                                <div class="am-u-sm-9">
                                    <input type="number" class="tpl-form-input" name="printer[p_n]"
                                           min="1" value="<?= $values['p_n'] ?>" required>
									<small>最小值为1，表示1份</small>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 票据抬头 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="printer[title]"
                                           value="<?= $values['title'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    打印条件
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="printer[pay_p]" value="1" data-am-ucheck
                                            <?= $values['pay_p'] == 1 ? 'checked' : '' ?> required>
                                        支付后打印
                                    </label>
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
