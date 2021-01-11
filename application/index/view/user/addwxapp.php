<link rel="stylesheet" href="assets/store/css/amazeui.min.css"/>
<link rel="stylesheet" href="assets/store/css/wechat.app.css"/>
<script src="assets/layer/layer.js"></script>
<script src="assets/store/js/jquery.form.min.js"></script>
<script src="assets/store/js/amazeui.min.js"></script>
<script src="assets/store/js/wechat.app.js"></script>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">创建小程序</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">创建类型 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="wxapp[app_type]" value="10" data-am-ucheck checked>
										点餐
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="wxapp[app_type]" value="20" data-am-ucheck>
										商城
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="wxapp[app_type]" value="1" data-am-ucheck>
										公众号
                                    </label>
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
