<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
						<div class="tips am-margin-bottom-sm am-u-sm-12">
							<div class="pre">
								<p>提醒：单个帐号每天审核撤回次数最多不超过 1 次，一个月不超过 10 次。</p>
							</div>
						</div>
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">查看详情</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">模板ID </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $model['template']['id'] ?>" disabled >
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">版本号 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $model['template']['user_version'] ?>" disabled >
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">描述 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $model['template']['user_desc'] ?>" disabled >
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">状态 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" <?= $model['status']==1 ? 'checked' : '' ?> disabled>
                                        已发布
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" <?= ($model['status']==0 AND $model['desc']['status']===0) ? 'checked' : '' ?> disabled>
                                        审核成功
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" <?= ($model['status']==0 AND $model['desc']['status']===1) ? 'checked' : '' ?> disabled>
                                        审核被拒绝
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" <?= ($model['status']==0 AND $model['desc']['status']===2) ? 'checked' : '' ?> disabled>
                                        审核中
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" <?= ($model['status']==0 AND $model['desc']['status']===3) ? 'checked' : '' ?> disabled>
                                        已撤回
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" <?= ($model['status']==0 AND $model['desc']['status']===4) ? 'checked' : '' ?> disabled>
                                        审核延后
                                    </label>
                                    
                                </div>
                            </div>
							<?php if($model['status']==0 AND $model['desc']['status']===1):?>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">拒绝原因 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $model['desc']['reason']?>" disabled>
                                </div>
                            </div>
							<?php endif; ?>
							<?php if($model['status']==0 AND $model['desc']['status']===4):?>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">延后原因 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $model['desc']['reason'] ?>" disabled >
                                </div>
                            </div>
							<?php endif; ?>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">管理操作</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">操作动作 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="release[opt]" value="0" checked >
                                        无操作
                                    </label>
									<? if($model['status']==0): ?>
									<label class="am-radio-inline">
                                        <input type="radio" name="release[opt]" value="1" <?= $model['desc']['status']!==0 ? 'disabled' : '' ?>>
                                        发布
                                    </label>
									<label class="am-radio-inline">
                                        <input type="radio" name="release[opt]" value="2" <?= ($model['desc']['status']===2 OR $model['desc']['status']===4) ? '' : 'disabled' ?>>
                                        撤回
                                    </label> 
									<? endif; ?>                                   
                                </div>
                            </div>
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
    $(function () {
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>
