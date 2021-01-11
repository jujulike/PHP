<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加消息模板</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">模板类型 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[tpl_type]" value="10" data-am-ucheck checked> 支付通知
                                    </label>
									<?php if($store['wxapp']['app_type']['value']==20):?>
									<label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[tpl_type]" value="20" data-am-ucheck> 发货通知
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="tplmsg[tpl_type]" value="30" data-am-ucheck> 售后通知
                                    </label>
									<?php else:?>
									
									<?php endif; ?>
                                </div>
                            </div>
							<!-- 表单提交按钮 -->
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
         */
        $('#my-form').superForm();
    });
</script>
