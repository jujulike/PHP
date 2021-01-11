<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">设置小程序昵称</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">昵称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="wxapp[app_name]"
                                           value="<?= $wxapp['app_name'] ?>" required>
										<small>小程序名称由中文、数字、英文及部分特殊符号组成。长度在4-30个字符之间，一个中文字等于2个字符。</small>
										<small>小程序发布前，昵称可修改2次，发布后只可通过认证方式改名。</small>
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
