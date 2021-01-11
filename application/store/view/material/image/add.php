<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加图片素材</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">素材名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" placeholder="请输入素材名称" class="tpl-form-input" name="material[name]" value="" required>
									<input type="hidden" name="material[file_type]" value="10">
                                </div>
                            </div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-u-lg-2 am-form-label am-text-xs form-require">选择素材 </label>
								<div class="am-u-sm-8 am-u-end">
									<div class="am-form-file">
										<button type="button" class="upload-file am-btn am-btn-primary am-btn-xs">
											<i class="am-icon-cloud-upload"></i> 选择图片
										</button>
										<div class="uploader-list am-cf"></div>
									</div>
									<div class="help-block">
                                        <small>文件最大2Mb，支持bmp/png/jpeg/jpg/gif格式</small>
                                    </div>
								</div>
							</div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
									<button type="submit" class="j-submit am-btn am-btn-secondary" >提交</button>
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
		// 选择图片
		$('.upload-file').selectImages({
			name: 'material[url]'
		});
        /**
         * 表单验证提交
         */
        $('#my-form').superForm();
			
    });
</script>
