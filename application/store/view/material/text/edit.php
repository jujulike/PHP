<link rel="stylesheet" href="assets/store/css/wechat.diy.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<div id="app" class="row-content am-cf">
    <div class="widget am-cf" style="min-width:100%;">
        <div class="widget-body">
			<fieldset>
				<form class="form-horizontal am-form tpl-form-line-form" id="signupForm">
					<div class="widget-head am-cf">
						<div class="widget-title am-fl">添加图文素材</div>
					</div>
					<div class="am-form-group">
						<label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">素材集名称 </label>
						<div class="am-u-sm-9 am-u-end">
							<input type="text" class="tpl-form-input" v-model="newList[0].name"  placeholder="请输入素材集名称" >
						</div>
					</div>
					<!-- diy 工作区 -->
					<div class="work-diy dis-flex flex-x-between">
						<!-- 视图区 -->
						<div class="list-editor am-u-sm-2 am-u-md-2 am-u-lg-2">
							<div class="editor-title"><span>文章列表</span></div>	
							<div v-for="(item,index) in newList">
								<div v-if="index == 0">
									<div  class="transition" :class="action==index ? 'active' :''" @click="isShow(index)">
										<img :src="item.url" style="width: 100%;height: 100%;"/>
									</div>
									<div @click="isShow(index)"><span v-text="item.title"></span></div>
								</div>
								<div v-else class="news-item-title transition" :class="action==index ? 'active' :''" style="margin-bottom: 20px" @click="isShow(index)">
									<div class="news_articel_item other">
										<div class="right-text" v-text="item.title"></div>
										<img class="left-image" :src="item.url"/>
									</div>
								</div>
							</div>
						</div>
						<!-- 编辑区 -->					
						<div class="wechat-editor">
							<div class="editor-title"><span>文章内容编辑</span></div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">标题 </label>
								<div class="am-u-sm-8 am-u-end">
									<input class="tpl-form-input" type="text" name="title" maxlength="64" v-model="newListIndex.title"  placeholder="请在这里输入标题">
								</div>
							</div>	
							<div class="am-form-group">
								<label class="am-u-sm-3 am-form-label am-text-xs">作者 </label>
								<div class="am-u-sm-8 am-u-end">
									<input class="tpl-form-input" type="text" name="author" maxlength="8" v-model="newListIndex.author"  placeholder="请输入作者">
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">封面 </label>
								<div class="am-u-sm-8 am-u-end">
									<button type="button" class="am-btn am-btn-primary am-btn-xs" @click="addImage">
										<i class="am-icon-cloud-upload"></i> 选择封面
									</button>
									<div class="help-block">
                                        <small>文件最大2Mb，支持bmp/png/jpeg/jpg/gif格式</small>
                                    </div>
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">摘要 </label>
								<div class="am-u-sm-8 am-u-end">
									<textarea class="" rows="3" placeholder="请输入摘要内容" v-model="newListIndex.digest"></textarea>
								</div>
							</div>
							<div class="am-form-group">
								<label class="am-u-sm-3 am-form-label am-text-xs form-require">正文 </label>
								<div class="am-u-sm-8 am-u-end">
									<div class="help-block">
                                        <small>正文内的图片只支持JPG格式，且最大1M</small>
                                    </div>
									<textarea id="container" type="text/plain">{{newListIndex.content}}</textarea>
								</div>
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
				</form>
			</fieldset>
        </div>
    </div>
</div>
{{include file="layouts/_template/file_library" /}}
<script src="assets/store/js/vue.min.js"></script>
<script src="assets/store/js/wechat.material.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script>
	function getContent() {
        return (UM.getEditor('container').getContent());
    };
    function hasContent() {
        return (UM.getEditor('container').hasContents());
    };
    function setContent(content) {
        return (UM.getEditor('container').setContent(content));
    };
	$(function () {
		// 富文本编辑器
        UM.getEditor('container', {
            initialFrameWidth: 375 + 15,
            initialFrameHeight: 600
        });
		new diyPhone(<?= $material?>);
    });
    
</script>
