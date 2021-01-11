<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
						<div class="tips am-margin-bottom-sm am-u-sm-12">
							<div class="pre">
								<p> 
									<input type="hidden" name="register[status]" value="<?= $model['status']['value'] ?>">
									<?= $model['status']['value']==0?'提示：提交信息后等待审核':''?>
									<?= $model['status']['value']==10?'提示：信息审核中，有问题会给您电话联系':''?>
									<?= $model['status']['value']==20?'提示：信息验证中，请在您微信中完成实名验证':''?>
									<?= $model['status']['value']==30?'提示：信息已验证通过':''?>
									<?= $model['status']['value']==40?'提示：信息被驳回，请按要求修改后提交':''?>
								</p>
								<?PHP if($model['status']['value']==40):?>
								<p><?= $model['reject']?></p>
								<?PHP endif; ?>
							</div>
						</div>
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">微信小程序快速注册</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 公司名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="register[legal_name]"
                                           value="<?= $model['legal_name'] ?>" 
										<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">营业执照 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<button type="button"
											class="upload-file-business_license am-btn am-btn-secondary am-radius" 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> >
											<i class="am-icon-cloud-upload"></i> 选择图片
										</button>
										<div class="uploader-list am-cf">
											<div class="file-item">
                                                <img src="<?= $model['businesslicense']['file_path'] ?>">
                                                <input type="hidden" name="register[business_license]"
                                                           value="<?= $model['businesslicense']['file_id'] ?>">
												<?PHP if($model['status']['value']==0 OR $model['status']['value']==40):?>
                                                <i class="iconfont icon-shanchu file-item-delete"></i>
												<?PHP endif; ?>
                                            </div>
										</div>
									</div>
									<div class="help-block am-margin-top-sm">
										<small>大小2M以下</small>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 营业执照代码 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="register[code]"
                                           value="<?= $model['code'] ?>" 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    营业执照代码类型
                                </label>
                                <div class="am-u-sm-9">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="register[code_type]" value="1" data-am-ucheck
                                            <?= $model['code_type']['value']==1 ? 'checked' : '' ?> 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>> 统一社会信用代码
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="register[code_type]" value="2" data-am-ucheck
                                            <?= $model['code_type']['value']==2 ? 'checked' : '' ?> 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>> 组织机构代码
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="register[code_type]" value="3" data-am-ucheck
                                            <?= $model['code_type']['value']==3 ? 'checked' : '' ?> 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>> 营业执照注册号
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 法人姓名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="register[legal_persona_name]"
                                           value="<?= $model['legal_persona_name'] ?>" 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">身份证正面 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<button type="button"
											class="upload-file-front am-btn am-btn-secondary am-radius" 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>>
											<i class="am-icon-cloud-upload"></i> 选择图片
										</button>
										<div class="uploader-list am-cf">
											<div class="file-item">
                                                <img src="<?= $model['front']['file_path'] ?>">
                                                <input type="hidden" name="register[id_front]"
                                                           value="<?= $model['front']['file_id'] ?>">
                                                <?PHP if($model['status']['value']==0 OR $model['status']['value']==40):?>
                                                <i class="iconfont icon-shanchu file-item-delete"></i>
												<?PHP endif; ?>
                                            </div>
										</div>
									</div>
									<div class="help-block am-margin-top-sm">
										<small>大小2M以下</small>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">身份证反面 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<button type="button"
											class="upload-file-behind am-btn am-btn-secondary am-radius" 
											<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>>
											<i class="am-icon-cloud-upload"></i> 选择图片
										</button>
										<div class="uploader-list am-cf">
											<div class="file-item">
                                                <img src="<?= $model['behind']['file_path'] ?>">
                                                <input type="hidden" name="register[id_behind]"
                                                           value="<?= $model['behind']['file_id'] ?>">
                                                <?PHP if($model['status']['value']==0 OR $model['status']['value']==40):?>
                                                <i class="iconfont icon-shanchu file-item-delete"></i>
												<?PHP endif; ?>
                                            </div>
										</div>
									</div>
									<div class="help-block am-margin-top-sm">
										<small>大小2M以下</small>
									</div>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 法人电话 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="register[legal_persona_phone]"
                                           value="<?= $model['legal_persona_phone'] ?>"
										   <?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> required>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 微信账号 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="register[legal_persona_wechat]"
                                           value="<?= $model['legal_persona_wechat'] ?>"
										   <?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?> required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary" 
									<?= ($model['status']['value']==0 OR $model['status']['value']==40)?'':'disabled'?>>提交
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

<!-- 图片文件列表模板 -->
{{include file="layouts/_template/tpl_file_item" /}}

<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}

<script>
    $(function () {
		
		// 选择图片 - 身份证正面
        $('.upload-file-business_license').selectImages({
            name: 'register[business_license]'
        });
		// 选择图片 - 身份证正面
        $('.upload-file-front').selectImages({
            name: 'register[id_front]'
        });
		// 选择图片 - 身份证反面
        $('.upload-file-behind').selectImages({
            name: 'register[id_behind]'
        });

        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
