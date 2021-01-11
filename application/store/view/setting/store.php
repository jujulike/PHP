<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">商城设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require">
                                    商城名称
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[name]"
                                           value="<?= isset($values['name']) ? $values['name'] : '' ?>" required>
                                </div>
                            </div>
							<?php if($store['wxapp']['app_type']['value']==20):?>
							 <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label form-require"> 配送方式 </label>
                                <div class="am-u-sm-9">
                                    <label class="am-checkbox-inline">
                                        <input type="checkbox" name="store[delivery_type][]" value="10" 
										<?php foreach($values['delivery_type'] as $item): if($item==10):?>
											checked
										<?php endif; endforeach;?>
										data-am-ucheck required>
                                            快递配送
									</label>
                                    <label class="am-checkbox-inline">
                                        <input type="checkbox" name="store[delivery_type][]" value="20" 
										<?php foreach($values['delivery_type'] as $item): if($item==20):?>
											checked
										<?php endif; endforeach;?>
										data-am-ucheck required>
                                            上门自提                                        
									</label>
                                    <div class="help-block">
                                        <small>注：配送方式至少选择一个</small>
                                    </div>
                                </div>
								<?php endif; ?>
                            </div>
							<?php if($store['wxapp']['app_type']['value']==20):?>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl"> 物流查询API</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 快递100 Customer </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[kuaidi100][customer]" 
									value="<?= isset($values['kuaidi100']['customer']) ? $values['kuaidi100']['customer'] : '' ?>" >
                                    <small>
										用于查询物流信息，<a href="https://www.kuaidi100.com/openapi/" target="_blank">快递100申请</a>
									</small>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label"> 快递100 Key </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="store[kuaidi100][key]" 
									value="<?= isset($values['kuaidi100']['key']) ? $values['kuaidi100']['key'] : '' ?>" >
                                </div>
                            </div>
							<?php endif; ?>
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
