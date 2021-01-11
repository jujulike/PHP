<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">对对机云端配置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    对对机开发者 <span class="tpl-form-line-small-title">APPID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[ddj_appid]"
                                           value="<?= $admin['user']['status']>0?'********':$model['ddj_appid']?>" required>
									<small>我还没有开发者账号 <a href="http://www.mstching.com/home/open"  target="_blank">注册</a></small>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    对对机开发者 <span class="tpl-form-line-small-title">SECRET</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[ddj_appsecret]"
                                           value="<?= $admin['user']['status']>0?'********':$model['ddj_appsecret']?>" required>
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
         */
        $('#my-form').superForm();

    });
</script>
