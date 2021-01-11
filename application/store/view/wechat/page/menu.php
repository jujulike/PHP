<link rel="stylesheet" href="assets/store/css/wechat.diy.css">
<div id="app" class="row-content am-cf">
    <div class="widget am-cf" style="min-width:100%;">
        <div class="widget-body">
			<fieldset>
				<div class="widget-head am-cf">
					<div class="widget-title am-fl">微信公众号菜单设置</div>
				</div>
				<!-- diy 工作区 -->
				<div class="work-diy dis-flex flex-x-between">
					<!-- 视图区 -->
					<div class="wechat am-u-sm-2 am-u-md-2 am-u-lg-2">
						<div class="mobile-header">公众号</div>
						<section class="view-body">
							<div class="time-wrapper"><span class="time">9:36</span></div>
						</section>
						<div class="menu-footer">
							<ul class="flex">
								<li v-for="(menu, index) in menus" :class="{active:menu === checkedMenu}">
									<span @click="activeMenu(menu,index,null)"><i class="icon-sub"></i>{{ menu.name || '一级菜单' }}</span>
									<div class="sub-menu">
										<ul v-if="menu.sub_button">
											<li v-for="(child, cindex) in menu.sub_button" :class="{active:child === checkedMenu}">
												<span @click="activeMenu(child,cindex,index)">{{ child.name || '二级菜单' }}</span>
											</li>
											<li v-if="menu.sub_button.length < 5" @click="addChild(menu,index)"><i class="iconfont icon-add1"></i></li>
										</ul>
										<ul v-else>
											<li @click="addChild(menu,index)"><i class="iconfont icon-add1"></i></li>
										</ul>										
									</div>
								</li>
								<li v-if="menus.length < 3" @click="addMenu()"><i class="iconfont icon-add1"></i></li>
							</ul>
						</div>
					</div>
					<!-- 编辑区 -->
					<div class="form-horizontal am-form tpl-form-line-form" v-show="checkedMenuId !== null">
						<div class="wechat-editor">
							<div class="editor-title">
								<span>菜单设置</span>
								<a class="fr" href="javascript:void(0);" @click="delMenu">删除</a>
							</div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">菜单名称 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text" placeholder="请输入菜单名称" v-model="checkedMenu.name">
                                    <div class="help-block am-margin-top-xs">
                                        <small>字数不超过13个汉字或40个字母</small>
                                    </div>
                                </div>
                            </div>
							
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">规则状态 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <select name="" id="" v-model="checkedMenu.type">
                                       <?php /*  <option value="text">文字消息</option>  */ ?>
										<option value="click">关键字</option>
										<option value="view">跳转网页</option>
										<?php /*   <option value="feat">事件功能</option>  */ ?>
										<option value="miniprogram">小程序</option> 
                                    </select>
                                </div>
                            </div>
							<!-- 关键字 -->
							<div class="keywords item am-form-group" :class="{show:checkedMenu.type=='click'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">关键字 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input type="text" placeholder="请输入关键字" class="tpl-form-input" v-model="checkedMenu.key">
									<div class="help-block am-margin-top-xs">
                                        <small>根据关键字可返回事先设置的回复内容</small>
                                    </div>
                                </div>
                            </div>
							<!-- 跳转地址 -->
							<div class="url item am-form-group" :class="{show:checkedMenu.type=='view'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">跳转链接 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input type="text" class="tpl-form-input" v-model="checkedMenu.url" placeholder="请输入跳转链接">
									<div class="help-block am-margin-top-xs">
                                        <small>链接格式：http://baidu.com/xxx/abc.html</small>
                                    </div>
                                </div>
                            </div>
							<!-- 小程序 -->
							<div class="wrchat-app item am-form-group" :class="{show:checkedMenu.type=='miniprogram'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">APPID </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input type="text" placeholder="请输入小程序APPID" class="tpl-form-input" v-model="checkedMenu.appid">
									<div class="help-block am-margin-top-xs">
                                        <small>必须是公众号所绑定的小程序</small>
                                    </div>
                                </div>
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">备用网页URL </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input type="text" placeholder="请输入备用网页URL" class="tpl-form-input" v-model="checkedMenu.url">
									<div class="help-block am-margin-top-xs">
                                        <small>小程序不能正常打开时,可转向此链接。</small>
                                    </div>
									<div class="help-block am-margin-top-xs">
                                        <small>链接格式：http://baidu.com/xxx/abc.html</small>
                                    </div>
                                </div>
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">小程序路径 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input type="text" placeholder="请输入小程序路径" class="tpl-form-input" v-model="checkedMenu.pagepath">
									<div class="help-block am-margin-top-xs">
                                        <small>例如：/pages/index/index </small>
                                    </div>
                                </div>
                            </div>
							<!-- 多客服 -->
							<div class="service item am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">回复内容 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <textarea  cols="60" rows="10"></textarea>
                                </div>
                            </div>
							
							<!-- 文字消息 -->
											<?php /*   <div class="text-box item" :class="{show:checkedMenu.type=='text'}">
														  <p>回复内容</p>
														  <textarea v-model="checkedMenu.content" cols="60" rows="10" placeholder="请输入回复内容"></textarea>
							</div>  */ ?>
							<!-- 事件功能 -->
							<?php /*  <div class="feat-select item" :class="{show:type=='feat'}">
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;">
																	  <input checked="checked" type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>扫码推事件
															  </label>
														  </div>
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;"><input type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>扫码推事件且弹出“消息接收中”提示框
															  </label>
														  </div>
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;"><input type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>弹出系统拍照发图
															  </label>
														  </div>
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;"><input type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>弹出拍照或者相册发图
															  </label>
														  </div>
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;"><input type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>弹出微信相册发图器
															  </label>
														  </div>
														  <div class="radio i-checks" style="display:block">
															  <label class="" style="padding-left: 0;">
																  <div class="iradio_square-green" style="position: relative;">
																	  <div class="iradio_square-green" style="position: relative;"><input type="radio" value="2" name="feat" style="position: absolute; opacity: 0;"></div>
																  </div>
																  <i></i>弹出地理位置选择器
															  </label>
														  </div>
							</div>  */ ?>
							<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading"></div>
							<!-- 表单提交按钮 -->
							<div class="am-form-group">
								<div class="am-u-sm-5 am-u-sm-push-5 am-margin-top-lg">
									<button class="am-btn am-btn-secondary" @click.stop="onSubmit" type="button">保存</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
        </div>
    </div>
</div>
<script src="assets/store/js/vue.min.js"></script>
<script src="assets/store/js/wechat.menu.js"></script>
<script>

    $(function () {
        // 渲染diy页面
		new diyPhone(<?= $menu?>);
    });
</script>

