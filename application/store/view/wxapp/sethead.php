<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">小程序头像设置</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">小程序头像 </label>
                                <div class="am-u-sm-9 am-u-end">
									<div class="am-form-file">
										<button type="button"
											class="upload-file am-btn am-btn-secondary am-radius">
											<i class="am-icon-cloud-upload"></i> 选择图片
										</button>
										<div class="uploader-list am-cf">
											<div class="file-item">
                                                <img src="<?= $wxapp['head_img'] ? $wxapp['head_img'] : 'assets/store/img/wechatapp.png' ?>" width="72" height="72" alt="">
                                                <input type="hidden" name="wxapp[head_img]"
                                                           value="<?= $wxapp['head_img'] ?>">
                                                <i class="iconfont icon-shanchu file-item-delete"></i>
                                            </div>
										</div>
									</div>
									<div class="help-block am-margin-top-sm">
										<small>大小2M以下</small>
									</div>
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

<!-- 图片文件列表模板 -->
{{include file="layouts/_template/tpl_file_item" /}}

<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}

<script>
    $(function () {
		
		// 选择图片
        $('.upload-file').selectImages({
            name: 'wxapp[head_img]'
        });

        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
