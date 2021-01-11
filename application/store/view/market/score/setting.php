<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">积分设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分名称 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <input type="text" class="tpl-form-input" name="score[name]"
                                           value="<?=$values['name'] ?>" required>
                                    <div class="help-block">
                                        <small>注：修改积分名称后，在买家端的所有页面里，看到的都是自定义的名称</small>
                                    </div>
                                    <div class="help-block">
                                        <small>注：商家使用自定义的积分名称来做品牌运营。如京东把积分称为“京豆”，淘宝把积分称为“淘金币”</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 积分说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea rows="5" name="score[describe]"
                                              placeholder="请输入积分说明/规则"><?=$values['describe'] ?></textarea>
                                </div>
                            </div>

                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">积分赠送</div>
                            </div>
                            <div class="am-form-group am-padding-top">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 是否开启消费送积分 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[is_open]" value="1" data-am-ucheck
                                            <?= $values['is_open']==1 ? 'checked':'' ?> > 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[is_open]" value="0" data-am-ucheck
                                            <?= $values['is_open']==0 ? 'checked':'' ?>> 关闭
                                    </label>
                                    <div class="help-block">
                                        <small>注：如开启则订单完成后赠送用户积分</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分赠送倍数 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group">
                                        <input type="number" name="score[gift_multiple]"
                                               class="am-form-field" min="1"
                                               value="<?= $values['gift_multiple'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">倍</span>
                                    </div>
                                    <div class="help-block">
                                        <small>注：赠送比例请填写数字0~100；订单的运费不参与积分赠送</small>
                                    </div>
                                    <div class="help-block">
                                        <small>例：订单付款金额(100.00元) * 积分赠送比例(10) = 实际赠送的积分(1000积分)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">积分抵扣</div>
                            </div>
                            <div class="am-form-group am-padding-top">
                                <label class="am-u-sm-3  am-u-lg-2 am-form-label form-require"> 是否开启下单积分抵扣 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[discount]" value="1" data-am-ucheck
                                            <?= $values['discount']==1 ? 'checked':'' ?> > 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="score[discount]" value="0" data-am-ucheck
                                            <?= $values['discount']==0 ? 'checked':'' ?>> 关闭
                                    </label>
                                    <div class="help-block">
                                        <small>注：如开启则用户下单时可选择使用积分抵扣订单金额</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 积分抵扣比例 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group">
                                        <span class="am-input-group-label am-input-group-label__left">1个积分可抵扣</span>
                                        <input type="number" class="am-form-field" min="0.01"
                                               name="score[discount_ratio]"
                                               value="<?= $values['discount_ratio'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">元</span>
                                    </div>
                                    <div class="help-block">
                                        <small>例如填写0.01，1积分可抵扣0.01元，100积分则可抵扣1元，1000积分则可抵扣10元</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> 抵扣条件 </label>
                                <div class="am-u-sm-9 am-u-md-6 am-u-lg-5 am-u-end">
                                    <div class="am-input-group am-form-group">
                                        <span class="am-input-group-label am-input-group-label__left">订单满</span>
                                        <input type="number" class="am-form-field" min="0"
                                               name="score[order_price]"
                                               value="<?= $values['order_price'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">元</span>
                                    </div>
                                    <div class="am-input-group am-form-group am-margin-top-sm">
                                        <span class="am-input-group-label am-input-group-label__left">
                                            最高可抵扣金额
                                        </span>
                                        <input type="number" class="am-form-field" min="0" max="100"
                                               name="score[discount_money]"
                                               value="<?= $values['discount_money'] ?>" required>
                                        <span class="am-input-group-label am-input-group-label__right">%</span>
                                    </div>
                                    <div class="help-block">
                                        <small>温馨提示：例如订单金额100元，最高可抵扣10%，此时用户可抵扣10元</small>
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
<script>
    $(function () {

        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>