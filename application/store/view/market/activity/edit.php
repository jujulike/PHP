<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">修改优惠活动</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="activity[name]"
                                           value="<?= $model['name']?>" required>
                                    <small>例如：满100减10</small>
                                </div>
                            </div>
                            <div class="am-form-group" data-x-switch>
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动类型 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="activity[activity_type]" value="10" 
										<?= $model['activity_type']['value']==10?'checked':'' ?> disabled >
                                        满减
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="activity[activity_type]" value="20"
											<?= $model['activity_type']['value']==20?'checked':'' ?> disabled>
                                        首单立减
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">减免金额 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" min="0.01" class="tpl-form-input" name="activity[reduce_price]"
                                           value="<?= $model['reduce_price']?>" placeholder="请输入减免金额" required>
									<small>设置说明：最小0.01</small>
                                </div>
                            </div>
							<?php if($model['activity_type']['value']==10):?>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">最低消费 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" min="0" class="tpl-form-input" name="activity[min_price]"
                                           value="<?= $model['min_price']?>" placeholder="请输入最低消费金额" required>
									<small>设置说明：0=不限制最低消费</small>
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