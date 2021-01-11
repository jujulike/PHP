<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加视频素材</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">素材名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" placeholder="请输入素材名称" name="material[name]" value="" required>
									<input type="hidden" name="material[file_type]" value="30">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">素材描述 </label>
                                <div class="am-u-sm-9 am-u-end">
									<textarea class="" rows="5" placeholder="请输入素材描述" name="material[introduction]" required></textarea>
                                </div>
                            </div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-u-lg-2 am-form-label am-text-xs form-require">选择素材 </label>
								<div class="am-u-sm-8 am-u-end">
									<div class="am-form-file">
										<a href="javascript:;" class="up-file am-btn am-btn-primary am-btn-xs">
											<i class="am-icon-cloud-upload" style="color:#ffffff;"> 选择文件</i>
											<input id="file" type="file" name="file" required>
										</a> 
										<div class="show-file am-cf"></div>
									</div>
									<div class="help-block">
                                        <small>文件最大10Mb，只支持MP4格式</small>
                                    </div>
								</div>
							</div>
							<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading"></div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交</button>
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
	
	$("#file").change(function(){ 
		$(".show-file").html("<b>"+$("#file").val()+"</b>");
	});

    $(function () {

        /**
         * 表单验证提交
         */
        $('#my-form').superForm();

    });
</script>
