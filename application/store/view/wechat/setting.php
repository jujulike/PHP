<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
						<?php if($wxapp['is_empower']['value']== 0): ?>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">绑定微信公众号</div>
                            </div>
							<div class="widget-body am-cf">
								<div style="background:#eeeeee;margin-left:100px;border-radius:10px;padding:20px;" class="am-u-sm-6 am-u-md-6 am-u-lg-3">
									<div style="text-align:center;">我已有微信公众号</div>
									<div style="margin-top:20px;text-align:center;">
										<a class="am-btn am-btn-default am-btn-success" href="/authorize.php">
                                            一键绑定
                                        </a>
									</div>
								</div>
								<div style="background:#eeeeee;margin-left:100px;border-radius:10px;padding:20px;" class="am-u-sm-6 am-u-md-6 am-u-lg-3">
									<div style="text-align:center;">我还没有微信公众号</div>
									<div style="margin-top:20px;text-align:center;">
										<a class="am-btn am-btn-default am-btn-success" href="https://mp.weixin.qq.com" target="_blank">
                                            我去注册
                                        </a>
									</div>
								</div>
								<div style="" class="am-u-sm-6 am-u-md-6 am-u-lg-3">
									
								</div>
								
							</div>
						<?php else:?>
							<div class="widget-head am-cf">
                                <div class="widget-title am-fl">公众号信息</div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">公众号头像 </label>
                                <div class="am-u-sm-9">
                                    <a href="<?= $wxapp['head_img'] ? $wxapp['head_img'] : 'assets/store/img/wechatapp.png' ?>" title="点击查看大图" target="_blank">
                                        <img style="border-radius: 50%;" src="<?= $wxapp['head_img'] ? $wxapp['head_img'] : 'assets/store/img/wechatapp.png' ?>" width="72" height="72" alt="">
                                    </a>
									
									<a href="<?= url('wxapp/qrCode',['wxapp_id' => $wxapp['wxapp_id']])?>" title="点击查看大图" target="_blank">
                                        <img style="border-radius: 50%;margin-left:50px;" src="assets/store/img/code.png" width="72" height="72" alt="">
                                    </a>
									<div class="help-block am-margin-top-sm">
										<small>
										<?php if($infor['errcode']==0): ?>
											每月可修改<?= $infor['head_image_info']['modify_quota']?>次，
											本月还可修改<?= $infor['head_image_info']['modify_quota']-$infor['head_image_info']['modify_used_count']?>次。
											<a href="<?= url('wxapp/sethead') ?>">修改</a>
										<?php else:?>
											非本平台注册的公众号，不可修改，请自行登录到官方平台设置 
											<a href="https://mp.weixin.qq.com/" target="_blank">登录</a>
										<?php endif; ?>
										</small>
									</div>
                                </div>
								
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">公众号名称 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $wxapp['app_name'] ?>" disabled="disabled">
									<?php if(empty($wxapp['app_name'])):?>
										<?php if($infor['errcode']==0): ?>
										<small>友情提醒：名称设置后不可修改<a href="<?= url('wxapp/setnickname') ?>">设置</a></small>
										<?php else:?>
											非本平台注册的公众号，不可修改，请自行登录到官方平台设置 
											<a href="https://mp.weixin.qq.com/" target="_blank">登录</a>
									<?php endif;endif; ?>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    AppID <span class="tpl-form-line-small-title">小程序ID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $store['user']['status']>0?'********':$wxapp['app_id'] ?>" disabled="disabled">
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">功能介绍 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $wxapp['signature'] ?>" disabled="disabled">
										<small>
										<?php if($infor['errcode']==0): ?>
											每月可修改<?= $infor['signature_info']['modify_quota']?>次，
											本月还可修改<?= $infor['signature_info']['modify_quota']-$infor['signature_info']['modify_used_count']?>次。
											<a href="<?= url('wxapp/signature') ?>">修改</a>
										<?php else:?>
											非本平台注册的公众号，不可修改，请自行登录到官方平台设置 
											<a href="https://mp.weixin.qq.com/" target="_blank">登录</a>
										<?php endif; ?>
										</small>									
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">服务器域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $wxapp['serve_domain'] ?>" disabled="disabled">
									<?php if(empty($wxapp['serve_domain'])):?>
										<small>服务器域名必须设置，否则无法正常使用。<a href="<?= url('wxapp/servedomain') ?>">我要设置</a></small>
									<?php endif; ?>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">服务类目 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="" disabled="disabled">
									<textarea resize="" rows="5" disabled ><?= $wxapp['category']['text']?></textarea>
									<small>每月可操作<?= $wxapp['category']['limit']?>次，本月还可操作<?= $wxapp['category']['quota']?>次，最多可以设置<?= $wxapp['category']['category_limit']?>个类目数量。<a href="<?= url('wxapp.category/index') ?>">设置</a></small>
                                </div>
                            </div>
							<!--
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">业务域名 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" value="<?= $wxapp['api_domain'] ?>" disabled="disabled">
									<?php if(empty($wxapp['api_domain'])):?>
										<small>业务域名必须设置，否则无法正常使用小程序。<a href="<?= url('wxapp/setdomain') ?>">我要设置</a></small>
									<?php endif; ?>
                                </div>
                            </div>
							-->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">微信支付设置</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付商户号 <span class="tpl-form-line-small-title">MCHID</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="wxapp[mchid]"
                                           value="<?= $store['user']['status']>0?'********':$wxapp['mchid'] ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    微信支付密钥 <span class="tpl-form-line-small-title">APIKEY</span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" name="wxapp[apikey]"
                                           value="<?= $store['user']['status']>0?'********':$wxapp['apikey'] ?>">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
						<?php endif; ?>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
