<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="tips am-margin-top-sm am-margin-bottom-sm">
                                <div class="pre">
                                    <p>
                                        模板消息仅用于微信小程序向用户发送服务通知，因微信限制，每笔支付订单可允许向用户在7天内推送最多3条模板消息。
                                        <a href="index.php?s=/store/setting.help/tplmsg" target="_blank">如何获取模板消息ID？</a>
                                    </p>
                                </div>
                            </div>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">支付成功通知</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    是否开启
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[payment][is_enable]" value="1" data-am-ucheck
                                            <?= $values['payment']['is_enable'] == 1 ? 'checked' : '' ?>
											required>
                                        开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[payment][is_enable]" value="0" data-am-ucheck
                                            <?= $values['payment']['is_enable'] == 0 ? 'checked' : '' ?>>
                                        关闭
                                    </label>
                                </div>
                            </div>
							<?php if($store['wxapp']['app_type']['value']==20):?>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    模板消息ID <span class="tpl-form-line-small-title">Template ID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="tplmsg[payment][template_id]"
                                           value="<?= $values['payment']['template_id'] ?>" required>
                                    <small>
										模板编号AT0009，关键词 (订单编号、商品名称、支付金额、支付时间) 
										<a href="<?= url('wxapp.tplmsg/index')?>">获取模板消息ID</a>
									</small>
                                </div>
                            </div>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">订单发货通知</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    是否开启
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[delivery][is_enable]" value="1" data-am-ucheck
                                            <?= $values['delivery']['is_enable'] == 1 ? 'checked' : '' ?>
											required>
                                        开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[delivery][is_enable]" value="0" data-am-ucheck
                                            <?= $values['delivery']['is_enable'] == 0 ? 'checked' : '' ?>>
                                        关闭
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    模板消息ID <span class="tpl-form-line-small-title">Template ID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="tplmsg[delivery][template_id]"
                                           value="<?= $values['delivery']['template_id'] ?>" required>
                                    <small>
										模板编号AT0007，关键词 (订单编号、物流公司、物流单号、收货地址、收货人、收货人电话、发货时间)
										<a href="<?= url('wxapp.tplmsg/index')?>">获取模板消息ID</a>
									</small>
                                </div>
                            </div>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">售后状态通知</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    是否开启
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[refund][is_enable]" value="1" data-am-ucheck
                                            <?= $values['refund']['is_enable'] == 1 ? 'checked' : '' ?>
											required>
                                        开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[refund][is_enable]" value="0" data-am-ucheck
                                            <?= $values['refund']['is_enable'] == 0 ? 'checked' : '' ?>>
                                        关闭
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    模板消息ID <span class="tpl-form-line-small-title">Template ID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="tplmsg[refund][template_id]"
                                           value="<?= $values['refund']['template_id'] ?>" required>
                                    <small>
										模板编号AT0553，关键词 (售后单号、订单号、售后类型、售后状态、申请原因、申请时间) 
										 <a href="<?= url('wxapp.tplmsg/index')?>">获取模板消息ID</a>
									</small>
                                </div>
                            </div>
							<?php endif; ?>
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

        /**
         * 发送测试短信
         */
        $('.j-sendTestMsg').click(function () {
            var msgType = $(this).data('msg-type')
                , formData = {
                AccessKeyId: $('input[name="sms[engine][aliyun][AccessKeyId]"]').val()
                , AccessKeySecret: $('input[name="sms[engine][aliyun][AccessKeySecret]"]').val()
                , sign: $('input[name="sms[engine][aliyun][sign]"]').val()
                , msg_type: msgType
                , template_code: $('input[name="sms[engine][aliyun][' + msgType + '][template_code]"]').val()
                , accept_phone: $('input[name="sms[engine][aliyun][' + msgType + '][accept_phone]"]').val()
            };
            if (!formData.AccessKeyId.length) {
                layer.msg('请填写 AccessKeyId');
                return false;
            }
            if (!formData.AccessKeySecret.length) {
                layer.msg('请填写 AccessKeySecret');
                return false;
            }
            if (!formData.sign.length) {
                layer.msg('请填写 短信签名');
                return false;
            }
            if (!formData.template_code.length) {
                layer.msg('请填写 模板ID');
                return false;
            }
            if (!formData.accept_phone.length) {
                layer.msg('请填写 接收手机号');
                return false;
            }
            layer.confirm('确定要发送测试短信吗', function (index) {
                var load = layer.load();
                var url = "<?= url('setting/smsTest') ?>";
                $.post(url, formData, function (result) {
                    layer.msg(result.msg);
                    layer.close(load);
                });
                layer.close(index);
            });
        });

    });
</script>
