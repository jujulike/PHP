<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">基本信息设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 网站名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_name]"
                                           value="<?= $model['web_name'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 网站域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_domain]"
                                           value="<?= $model['web_domain'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 联系电话 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[component_phone]"
                                           value="<?= $model['component_phone'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 备案 ICP </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[web_icp]"
                                           value="<?= $model['web_icp'] ?>">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 站点描述 </label>
                                <div class="am-u-sm-9">
									<input type="text" class="tpl-form-input" name="config[web_description]"
                                           value="<?= $model['web_description'] ?>">
                                </div>
                            </div>							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 关键字 </label>
                                <div class="am-u-sm-9">
									<textarea class="" rows="4" placeholder="请输入关键字"
                                              name="config[web_keywords]"><?= $model['web_keywords'] ?></textarea>
                                </div>
                            </div>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">第三方参数设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> AppID </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[app_id]"
                                           value="<?= $admin['user']['status']>0?'********':$model['app_id'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> AppSecret </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[app_secret]"
                                           value="<?= $admin['user']['status']>0?'********':$model['app_secret'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> EncodingAesKey </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[encoding_aes_key]"
                                           value="<?= $admin['user']['status']>0?'********':$model['encoding_aes_key'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> Token </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[token]"
                                           value="<?= $model['token'] ?>" required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 业务域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[api_domain]"
                                           value="<?= $model['api_domain'] ?>" required>
                                </div>
                            </div>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">微信支付设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付商户号 <span class="tpl-form-line-small-title">MCHID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[mchid]"
                                           value="<?= $admin['user']['status']>0?'********':$model['mchid']?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付密钥 <span class="tpl-form-line-small-title">APIKEY</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="config[apikey]"
                                           value="<?= $admin['user']['status']>0?'********':$model['apikey']?>">
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
