<link rel="stylesheet" href="assets/store/css/wechat.diy.css">
<div id="app" class="row-content am-cf">
    <div class="widget am-cf" style="min-width:100%;">
        <div class="widget-body">
			<fieldset>
				<div class="widget-head am-cf">
					<div class="widget-title am-fl">设置被关注回复</div>
				</div>
				<!-- diy 工作区 -->
				<div class="work-diy dis-flex flex-x-between">
					<!-- 视图区 -->
					<div class="wechat am-u-sm-2 am-u-md-2 am-u-lg-2">
						<div class="mobile-header">公众号</div>
						<section class="view-body">
							<div class="time-wrapper"><span class="time">9:36</span></div>
							<div class="view-item clearfix" :class="{show:values.type=='text'}">
								<div class="avatar fl"><img src="/assets/store/img/head.gif" /></div>
								<div class="box-content fl">
									{{values.dataGroup.text.content}}
								</div>
							</div>
							<!--
							<div class="view-item news-box" :class="{show:values.type=='news'}" v-if="values.dataGroup.news.length >0">
								<div class="vn-content" v-if="values.dataGroup.news.length ==1">
									<div class="vn-title">{{values.dataGroup.news[0].title}}</div>
									<div class="vn-time">{{values.dataGroup.news[0].date}}</div>
									<div class="vn-picture" :style="{backgroundImage: 'url('+values.dataGroup.news[0].image+')'}"></div>
									<div class="vn-picture-info">{{values.dataGroup.news[0].description}}</div>
									<div class="vn-more">
										<a :href="values.dataGroup.news[0].url">阅读原文</a>
									</div>
								</div> 
								<div class="vn-content" v-else>
									<div class="con-item-box">
										<div class="vn-picture" :style="{backgroundImage: 'url('+values.dataGroup.news[0].image+')'}"></div>
										<div class="first-title">{{values.dataGroup.news[0].title}}</div>
									</div>
									<div class="con-item-list clearfix" v-for="(newinfos,index) in values.dataGroup.news" v-if="index>0">
										<div class="list-tit-info fl">{{newinfos.title}}</div>
										<div class="list-pic fr" :style="{backgroundImage: 'url('+newinfos.image+')'}"></div>
									</div>
								</div>
							</div>
							-->
							<div class="view-item clearfix" :class="{show:values.type=='image'}">
								<div class="avatar fl"><img src="/assets/store/img/head.gif" /></div>
								<div class="box-content fl">
									<img class="picbox" :src="values.dataGroup.image.url" alt="" />
								</div>
							</div>
						</section>
					</div>
					<!-- 编辑区 -->
					<div class="form-horizontal am-form tpl-form-line-form">
						<div class="wechat-editor">
							<div class="editor-title">
								<span>设置被关注回复</span>
							</div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">是否开启 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" v-model="values.is_open" value="1"> 开启
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" v-model="values.is_open" value="0"> 关闭
                                    </label>
                                </div>
                            </div>
							<div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">消息类型 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <select v-model="values.type">
										<option value="text">文字消息</option>
                                        <option value="image">图片消息</option>
                                        <option value="voice">语音消息</option>
										<option value="video">视频消息</option>
										<option value="music">音乐消息</option>
										<option value="news">图文消息</option>
                                    </select>
                                </div>
                            </div>
							<!-- 文字 -->
							<div class="item am-form-group" :class="{show:values.type=='text'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">回复内容 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <textarea v-model="values.dataGroup.text.content" rows="5" placeholder="请输入回复内容"></textarea>
                                </div>
                            </div>
							<!-- 图片 -->
							<div class="item am-form-group" :class="{show:values.type=='image'}">
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">回复图片 </label>
								<div class="am-u-sm-8 am-u-end">
									<button type="button" class="am-btn am-btn-primary am-btn-xs" @click="addImage">
										<i class="am-icon-cloud-upload"></i> 选择图片
									</button>
									<div class="help-block">
                                        <small>文件最大2Mb，支持bmp/png/jpeg/jpg/gif格式</small>
                                    </div>
								</div>
							</div>
							<!-- 语音 -->
							<div class="item am-form-group" :class="{show:values.type=='voice'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">MEDIA_ID </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text" v-model="values.dataGroup.voice.media_id">
                                    <div class="help-block am-margin-top-xs">
                                        <small><a href="<?= url('material.voice/index') ?>">点此上传语音素材，或获取 MEDIA_ID</a></small>
                                    </div>
                                </div>
                            </div>
							<!-- 视屏 -->
							<div class="item am-form-group" :class="{show:values.type=='video'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">视频标题 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text" v-model="values.dataGroup.video.title">
                                </div>
                            </div>
							<div class="item am-form-group" :class="{show:values.type=='video'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">MEDIA_ID </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text" v-model="values.dataGroup.video.media_id">
                                    <div class="help-block am-margin-top-xs">
                                        <small><a href="<?= url('material.video/index') ?>">点此上传视频素材，或获取 MEDIA_ID</a></small>
                                    </div>
                                </div>
                            </div>
							<div class="item am-form-group" :class="{show:values.type=='video'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">视频描述 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <textarea rows="3" placeholder="请输入内容"  v-model="values.dataGroup.video.description"></textarea>
                                </div>
                            </div>
							<!-- 图文 -->
							<div class="item am-form-group" :class="{show:values.type=='news'}">
                                <label class="am-u-sm-3 am-form-label am-text-xs form-require">MEDIA_ID </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text" v-model="values.dataGroup.news.media_id">
                                    <div class="help-block am-margin-top-xs">
                                        <small><a href="<?= url('material.text/index') ?>">点此上传图文素材，或获取 MEDIA_ID</a></small>
                                    </div>
                                </div>
                            </div>
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
{{include file="layouts/_template/file_library" /}}
<script src="assets/store/js/vue.min.js"></script>
<script src="assets/store/js/wechat.reply.js"></script>
<script>
    $(function () {
        // 渲染diy页面
		new diyPhone(<?= $values?>);
    });
</script>
