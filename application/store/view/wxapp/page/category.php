<style>
    .img__category_style {
        width: 100%;
        box-shadow: 0 3px 10px #dcdcdc;
    }
</style>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">分类页模板</div>
                            </div>
                            <div class="wrapper am-container">
                                <div class="left-style am-u-sm-12 am-u-md-12 am-u-lg-4">
                                    <img class="img__category_style" src="<?= 'assets/store/img/category_tpl_'.$wxapp['category_style'].'.jpg'?>">
                                </div>
                                <div class="right-form am-u-sm-12 am-u-md-12 am-u-lg-8">
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label form-require"> 分类页样式 </label>
                                        <div class="am-u-sm-9">
                                            <label class="am-radio-inline">
                                                <input type="radio" name="wxapp[category_style]" value="10"
                                                       data-am-ucheck <?= $wxapp['category_style']==10 ? 'checked' : '' ?> required>
                                                一级分类 (大图)
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" name="wxapp[category_style]" value="20"
                                                       data-am-ucheck <?= $wxapp['category_style']==20 ? 'checked' : '' ?>>
                                                一级分类 (小图)
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" name="wxapp[category_style]" value="30"
                                                       data-am-ucheck <?= $wxapp['category_style']==30 ? 'checked' : '' ?>>
                                                二级分类
                                            </label>
                                            <div class="help__style help-block am-margin-top-xs">
                                                <small class="<?= $wxapp['category_style']==10 ? '' : 'hide' ?>" data-value="10">分类图尺寸：宽750像素 高度不限</small>
                                                <small class="<?= $wxapp['category_style']==20 ? '' : 'hide' ?>" data-value="20">分类图尺寸：宽188像素 高度不限</small>
                                                <small class="<?= $wxapp['category_style']==30 ? '' : 'hide' ?>" data-value="30">分类图尺寸：宽150像素 高150像素</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                            <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                            </button>
                                        </div>
                                    </div>
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

        // 当前版本号
        var version = '1.1.30';
        // 切换分类样式图
        var $imgCategorystyle = $('.img__category_style');
        var $helpStyleSmall = $('.help__style').find('small');
        $("input[name='wxapp[category_style]']").change(function (e) {
            var styleValue = e.currentTarget.value;
            $helpStyleSmall.hide().filter('[data-value=' + styleValue + ']').show();
            $imgCategorystyle.attr('src', 'assets/store/img/category_tpl_' + styleValue + '.jpg?v=' + version);
        });

        /**
         * 表单验证提交
         */
        $('#my-form').superForm();

    });
</script>
