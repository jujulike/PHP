<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">编辑类目</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">类目名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="rules[name]" value="<?= $model['text'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">上级类目 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="rules[parent]"
                                            data-am-selected="{searchBox: 1, btnSize: 'sm'}">
                                        <option value="#"> 顶级类目</option>
                                        <?php if (isset($list)): foreach ($list as $first): ?>
                                            <option value="<?= $first['id'] ?>" 
												<?= $model['parent'] == $first['id'] ? 'selected' : '' ?>>
												 <?= $first['text'] ?>
											</option>
												<?php if (isset($first['child'])): foreach ($first['child'] as $two): ?>
												    <option value="<?= $two['id'] ?>"
														<?= $model['parent'] == $two['id'] ? 'selected' : '' ?>>
														 &nbsp;&nbsp;&nbsp;├ &nbsp;<?= $two['text'] ?></option>
												<?php endforeach; endif; ?>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">类目排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="rules[sort]"
                                           value="<?= $model['sort'] ?>" required>
                                    <small>数字越小越靠前</small>
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
