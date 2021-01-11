<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">资料审查</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 公司名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $model['legal_name'] ?>" disabled="disabled">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">营业执照 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<div class="uploader-list am-cf">
											<div class="file-item">
												<a href="<?= $model['businesslicense']['file_path'] ?>" title="点击查看大图" target="_blank">
													<img src="<?= $model['businesslicense']['file_path'] ?>">
												</a>
                                            </div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 营业执照代码 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $model['code'] ?>" disabled="disabled">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    营业执照代码类型
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" data-am-ucheck <?= $model['code_type']==1 ? 'checked' : '' ?> disabled="disabled"> 统一社会信用代码
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" data-am-ucheck <?= $model['code_type']==2 ? 'checked' : '' ?> disabled="disabled"> 组织机构代码
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" data-am-ucheck <?= $model['code_type']==3 ? 'checked' : '' ?> disabled="disabled"> 营业执照注册号
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 法人姓名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $model['legal_persona_name'] ?>" disabled="disabled">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">身份证正面 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<div class="uploader-list am-cf">
											<div class="file-item">
												<a href="<?= $model['front']['file_path'] ?>" title="点击查看大图" target="_blank">
													<img src="<?= $model['front']['file_path'] ?>">
												</a>
                                            </div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">身份证反面 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<div class="uploader-list am-cf">
											<div class="file-item">
												<a href="<?= $model['behind']['file_path'] ?>" title="点击查看大图" target="_blank">
													<img src="<?= $model['behind']['file_path'] ?>">
												</a>
                                            </div>
										</div>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 法人电话 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $model['legal_persona_phone'] ?>" disabled="disabled">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 微信账号 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $model['legal_persona_wechat'] ?>" disabled>
                                </div>
                            </div>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">执行操作</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">操作类型类型</label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="authentication[status]" value="0" data-am-ucheck checked> 无操作
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="authentication[status]" value="20" data-am-ucheck <?= ($model['status']['value']==20 OR $model['status']['value']==30) ? 'disabled':'' ?>> 提交审核
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="authentication[status]" value="40" data-am-ucheck <?= ($model['status']['value']==20 OR $model['status']['value']==30) ? 'disabled':'' ?>> 资料驳回
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
