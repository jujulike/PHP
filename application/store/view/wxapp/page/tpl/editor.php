				<div id="diy-editor" ref="diy-editor" class="diy-editor form-horizontal"
                     :style="{ visibility: selectedIndex != -1 ? 'visible' : 'hidden' } " v-cloak>

                    <!-- 编辑器: 标题栏 -->
                    <div id="tpl_editor_page" v-if="selectedIndex === 'page'">
                        <div class="editor-title"><span>{{ diyData.page.name }}</span></div>
                        <form class="am-form tpl-form-line-form">
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">页面名称 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text"
                                           v-model="diyData.page.params.name">
                                    <div class="help-block am-margin-top-xs">
                                        <small>页面名称仅用于后台查找</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">页面标题 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text"
                                           v-model="diyData.page.params.title">
                                    <div class="help-block am-margin-top-xs">
                                        <small>小程序端顶部显示的标题</small>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">分享标题 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="tpl-form-input" type="text"
                                           v-model="diyData.page.params.share_title">
                                    <div class="help-block am-margin-top-xs">
                                        <small>小程序端转发时显示的标题</small>
                                    </div>
                                </div>
                            </div>
							<div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">分享图片 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.params.share_image"
                                                 @click="onEditorSelectImage(curItem.params, 'share_image')"
                                                 style="height: 60px;" alt="">
                                        </div>
                                        <div class="help-block">
                                            <small>建议尺寸：500×400</small>
                                        </div>
                                    </div>
                                </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">标题栏文字 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" value="black"
                                               v-model="diyData.page.style.titleTextColor">
                                        黑色
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" value="white"
                                               v-model="diyData.page.style.titleTextColor">
                                        白色
                                    </label>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label am-text-xs">标题栏背景 </label>
                                <div class="am-u-sm-8 am-u-end">
                                    <input class="" type="color"
                                           v-model="diyData.page.style.titleBackgroundColor">
                                    <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                            @click.stop="onEditorResetColor(diyData.page.style, 'titleBackgroundColor', '#ffffff')">
                                        重置
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <template v-if="diyData.items.length && curItem">

                        <!--编辑器: 在线客服-->
                        <div id="tpl_editor_service" v-if="curItem.type == 'service'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 底边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.bottom" min="0" max="100">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.bottom }}</span>%
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 右边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.right" min="0" max="100">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.right }}</span>%
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 不透明度 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.opacity" min="0" max="100">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.opacity }}</span>%
                                        </div>
                                    </div>
                                </div>
                                <hr data-am-widget="divider" class="am-divider am-divider-dashed">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 客服类型 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="chat"
                                                   v-model="curItem.params.type"> 在线聊天
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="phone"
                                                   v-model="curItem.params.type"> 拨打电话
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group" v-show="curItem.params.type == 'phone'">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 电话号码 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" placeholder="请输入电话号码"
                                               v-model="curItem.params.phone_num">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 客服图标 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.params.image"
                                                 style="height: 45px;" title="点击更换图片" alt=""
                                                 @click="onEditorSelectImage(curItem.params, 'image')">
                                        </div>
                                        <div class="help-block">
                                            <small>建议尺寸：90×90</small>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 编辑器: 图片轮播 -->
                        <div id="tpl_editor_banner" v-if="curItem.type == 'banner'">
                            <div class="editor-title"><span>{{curItem.name}}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">指示点形状 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="round"
                                                   v-model="curItem.style.btnShape"> 圆形
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="square"
                                                   v-model="curItem.style.btnShape"> 正方形
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="rectangle"
                                                   v-model="curItem.style.btnShape"> 长方形
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">指示点颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.btnColor">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'btnColor', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 切换时间 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="number"
                                               v-model="curItem.params.interval">
                                        <div class="help-block">
                                            <small>轮播图自动切换的间隔时间，单位：毫秒</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-items">
                                    <draggable :list="curItem.data"
                                               :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                        <div class="form-item"
                                             v-for="(banner, index) in curItem.data">
                                            <i class="iconfont icon-shanchu item-delete"
                                               @click="onEditorDeleleData(index, selectedIndex)"></i>
                                            <div class="item-inner">
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <div class="data-image">
                                                            <img :src="banner.imgUrl" alt=""
                                                                 @click="onEditorSelectImage(banner, 'imgUrl')">
                                                        </div>
                                                        <div class="help-block">
                                                            <small>建议尺寸750x360</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">链接地址 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="number" value=""
                                                               v-model='banner.linkUrl'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                </div>
                                <div class="j-data-add form-item-add" @click="onEditorAddData">
                                    <i class="fa fa-plus"></i> 添加一个
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 单图组-->
                        <div id="tpl_editor_imageSingle" v-if="curItem.type == 'imageSingle'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">左右边距 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingLeft" min="0"
                                               max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingLeft }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片圆角 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.borderRadius" min="0"
                                               max="100">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.borderRadius }}</span>px 
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="form-items">
                                    <draggable :list="curItem.data"
                                               :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                        <div class="form-item drag" v-for="(imageSingle, index) in curItem.data">
                                            <i class="iconfont icon-shanchu item-delete"
                                               @click="onEditorDeleleData(index,selectedIndex)"></i>
                                            <div class="item-inner">
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <div class="data-image">
                                                            <img :src="imageSingle.imgUrl" alt=""
                                                                 @click="onEditorSelectImage(imageSingle, 'imgUrl')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">链接地址 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="text" value="" v-model='imageSingle.linkUrl'>
														<small>填写“#”可调起点餐操作 - 应用于点餐小程序</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                </div>
                                <div class="j-data-add form-item-add" @click="onEditorAddData">
                                    <i class="fa fa-plus"></i> 添加一个
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 图片橱窗-->
                        <div id="tpl_editor_window" v-if="curItem.type == 'window'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">左右边距 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingLeft" min="0"
                                               max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingLeft }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片圆角 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.borderRadius" min="0"
                                               max="100">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.borderRadius }}</span>px 
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">布局方式 </label>
                                    <div class="j-switch-help am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="2"
                                                   v-model="curItem.style.layout"> 堆积两列
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="3"
                                                   v-model="curItem.style.layout"> 堆积三列
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="4"
                                                   v-model="curItem.style.layout"> 堆积四列
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="-1"
                                                   v-model="curItem.style.layout"> 橱窗样式
                                            <small class="help am-hide">
                                                最多显示四张图片，超出隐藏
                                            </small>
                                        </label>
                                        <div class="help-block am-margin-top-xs" data-default="请确保所有图片的尺寸/比例相同。">
                                            <small>请确保所有图片的尺寸/比例相同。</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-items">
                                    <draggable :list="curItem.data"
                                               :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                        <div class="form-item drag" v-for="(item, index) in curItem.data">
                                            <i class="iconfont icon-shanchu item-delete"
                                               @click="onEditorDeleleData(index,selectedIndex)">
                                            </i>
                                            <div class="item-inner">
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <div class="data-image">
                                                            <img :src="item.imgUrl" alt=""
                                                                 @click="onEditorSelectImage(item, 'imgUrl')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">链接地址 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="text" v-model="item.linkUrl">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                </div>
                                <div class="j-data-add form-item-add" @click="onEditorAddData">
                                    <i class="fa fa-plus"></i> 添加一个
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 视频组-->
                        <div id="tpl_editor_video" v-if="curItem.type == 'video'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">视频高度 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.height" min="50" max="500">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.height }}</span>px
                                            (像素)
                                        </div>
                                        <div class="help-block am-margin-top-xs">
                                            <small>滑块可用左右方向键精确调整</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group am-padding-top">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">视频封面 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.params.poster" alt=""
                                                 @click="onEditorSelectImage(curItem.params, 'poster')">
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">视频地址 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="url"
                                               v-model="curItem.params.videoUrl">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">自动播放 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="0"
                                                   v-model="curItem.params.autoplay"> 否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="1"
                                                   v-model="curItem.params.autoplay"> 是
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 文章组-->
                        <div id="tpl_editor_article" v-if="curItem.type == 'article'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文章分类 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <select v-model="curItem.params.auto.category"
                                                data-am-selected="{btnSize: 'sm',  placeholder:'全部分类', maxHeight: 400}">
                                            <option value="0"> -- 全部分类 --</option>
                                            <template v-for="item in opts.articleCatgory">
                                                <option :value="item.category_id"> {{ item.name }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示数量 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="number" min="1"
                                               v-model="curItem.params.auto.showNum">
                                        <div class="help-block am-padding-top-xs">
                                            <small>文章数据请到 <a href="index.php?s=/store/content.article/index" target="_blank">内容管理
                                                    - 文章列表</a>
                                                中管理
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 编辑器: 头条快报 -->
                        <div id="tpl_editor_special" v-if="curItem.type == 'special'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文章分类 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <select v-model="curItem.params.auto.category"
                                                data-am-selected="{btnSize: 'sm',  placeholder:'全部分类', maxHeight: 400}">
                                            <option value="0"> -- 全部分类 --</option>
                                            <template v-for="item in opts.articleCatgory">
                                                <option :value="item.category_id"> {{ item.name }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示数量 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="number" min="1"
                                               v-model="curItem.params.auto.showNum">
                                        <div class="help-block am-padding-top-xs">
                                            <small>文章数据请到 <a href="index.php?s=/store/content.article/index" target="_blank">内容管理
                                                    - 文章列表</a>
                                                中管理
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <hr data-am-widget="divider" class="am-divider am-divider-dashed">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs form-require">图片 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.style.image" style="height: 38px;" alt=""
                                                 @click="onEditorSelectImage(curItem.style, 'image')">
                                        </div>
                                        <div class="help-block am-padding-top-xs">
                                            <small>建议尺寸140×38</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs form-require"> 显示类型 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="1" v-model="curItem.style.display">
                                            单行
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="2" v-model="curItem.style.display">
                                            两行 </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 搜索栏-->
                        <div id="tpl_editor_search" v-if="curItem.type == 'search'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">提示文字 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="text"
                                               v-model="curItem.params.placeholder">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">搜索框样式 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="square"
                                                   v-model="curItem.style.searchStyle"> 方形
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="radius"
                                                   v-model="curItem.style.searchStyle"> 圆角
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="round"
                                                   v-model="curItem.style.searchStyle"> 圆弧
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字对齐 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="left"
                                                   v-model="curItem.style.textAlign">
                                            居左
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="center"
                                                   v-model="curItem.style.textAlign">
                                            居中
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="right"
                                                   v-model="curItem.style.textAlign">
                                            居右
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 公告组-->
                        <div id="tpl_editor_notice" v-if="curItem.type == 'notice'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.textColor">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'textColor', '#000000')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">公告图标 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.params.icon"
                                                 @click="onEditorSelectImage(curItem.params, 'icon')"
                                                 style="height: 30px;" alt="">
                                        </div>
                                        <div class="help-block">
                                            <small>建议尺寸：32×32</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">公告内容</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="text"
                                               v-model="curItem.params.text">
                                    </div>
                                </div>
                            </form>
                        </div>
						
						<!--编辑器: 新品推荐-->
                        <div id="tpl_editor_newest" v-if="curItem.type == 'newest'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.textColor">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'textColor', '#000000')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片标题 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <div class="data-image">
                                            <img :src="curItem.params.icon"
                                                 @click="onEditorSelectImage(curItem.params, 'icon')"
                                                 style="height:29px;" alt="">
                                        </div>
                                        <div class="help-block">
                                            <small>建议尺寸：750×100</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字标题</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="text"
                                               v-model="curItem.params.text">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs"> 标题类型 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="text"
                                                   v-model="curItem.params.type"> 文字标题
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="image"
                                                   v-model="curItem.params.type"> 图片标题
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 导航组-->
                        <div id="tpl_editor_navBar" v-if="curItem.type == 'navBar'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">每行数量 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="3"
                                                   v-model="curItem.style.rowsNum"> 3个
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="4"
                                                   v-model="curItem.style.rowsNum"> 4个
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="5"
                                                   v-model="curItem.style.rowsNum"> 5个
                                        </label>
                                    </div>
                                </div>
                                <div class="form-items">
                                    <draggable :list="curItem.data"
                                               :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                        <div class="form-item drag" v-for="(navBar, index) in curItem.data">
                                            <i class="iconfont icon-shanchu item-delete"
                                               @click="onEditorDeleleData(index, selectedIndex)"></i>
                                            <div class="item-inner">
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">图片 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <div class="data-image">
                                                            <img :src="navBar.imgUrl" alt=""
                                                                 @click="onEditorSelectImage(navBar, 'imgUrl')">
                                                        </div>
                                                        <div class="help-block">
                                                            <small>建议尺寸100x100</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字内容 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="text" v-model="navBar.text">
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">文字颜色 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="color" v-model="navBar.color">
                                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                                @click.stop="onEditorResetColor(navBar, 'color', '#666666')">
                                                            重置
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="am-form-group">
                                                    <label class="am-u-sm-3 am-form-label am-text-xs">链接地址 </label>
                                                    <div class="am-u-sm-8 am-u-end">
                                                        <input type="text" v-model="navBar.linkUrl">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </draggable>
                                </div>
                                <div class="j-data-add form-item-add" @click="onEditorAddData">
                                    <i class="fa fa-plus"></i> 添加一个
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 商品组-->
                        <div id="tpl_editor_goods" v-if="curItem.type == 'goods'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <!--商品数据-->
                                <div class="j-switch-box" data-item-class="switch-source">
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label am-text-xs">商品来源 </label>
                                        <div class="am-u-sm-8 am-u-end">
                                            <label class="am-radio-inline">
                                                <input type="radio" value="auto" v-model="curItem.params.source"> 自动获取
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" value="choice" v-model="curItem.params.source"> 手动选择
                                            </label>
                                        </div>
                                    </div>
                                    <!--手动选择-->
                                    <div class="switch-source __choice " v-show="curItem.params.source == 'choice'">
                                        <div class="form-items __goods am-cf">
                                            <draggable :list="curItem.data" :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                                <div v-for="(goods,index) in curItem.data" class="form-item drag">
                                                    <i class="iconfont icon-shanchu item-delete" data-no-confirm="true" @click="onEditorDeleleData(index, selectedIndex)"></i>
                                                    <div class="item-inner">
                                                        <div class="data-image">
                                                            <img :src="goods.image" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </draggable>
                                        </div>
                                        <div class="j-selectGoods form-item-add" @click.stop="onSelectGoods(curItem)">
                                            <i class="fa fa-plus"></i> 选择商品
                                        </div>
                                    </div>
                                    <!-- 自动获取 -->
                                    <div class="switch-source"
                                         v-show="curItem.params.source == 'auto'">
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">商品分类 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <select v-model="curItem.params.auto.category" data-am-selected="{btnSize: 'sm',  placeholder:'全部分类', maxHeight: 400}">
                                                    <option value="0"> -- 全部分类 --</option>
                                                    <template v-for="first in opts.catgory">
                                                        <option :value="first.category_id"> {{ first.name }}</option>
                                                        <template v-if="first.child">
                                                            <option v-for="two in first.child" :value="two.category_id">
                                                                　{{ two.name }}
                                                            </option>
                                                        </template>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs"> 商品排序 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="all" v-model="curItem.params.auto.goodsSort">
                                                    综合
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="sales" v-model="curItem.params.auto.goodsSort">
                                                    销量 </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="price" v-model="curItem.params.auto.goodsSort">
                                                    价格 
												</label>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs"> 显示数量 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <input class="tpl-form-input" type="number" min="1"
                                                       v-model="curItem.params.auto.showNum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--分割线-->
                                <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>
                                <!--组件样式-->
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'background', '#f3f3f3')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示类型 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="list" v-model="curItem.style.display"> 列表平铺
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="slide" v-model="curItem.style.display" :disabled="curItem.style.column == 1"> 横向滑动
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">分列数量 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="1" v-model="curItem.style.column" :disabled="curItem.style.display == 'slide'"> 单列
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="2" v-model="curItem.style.column"> 两列
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="3" v-model="curItem.style.column"> 三列
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示内容 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" v-model="curItem.style.show.goodsName"> 商品名称
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" v-model="curItem.style.show.goodsPrice"> 商品价格
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" v-model="curItem.style.show.linePrice"> 划线价格
                                        </label>
                                        <label class="am-checkbox-inline" v-show="curItem.style.column == 1">
                                            <input type="checkbox" v-model="curItem.style.show.sellingPoint"> 商品卖点
                                        </label>
                                        <label class="am-checkbox-inline" v-show="curItem.style.column == 1">
                                            <input type="checkbox" v-model="curItem.style.show.goodsSales"> 商品销量
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 编辑器: 优惠券组 -->
                        <div id="tpl_editor_coupon" v-if="curItem.type == 'coupon'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px
                                            (像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示数量 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="tpl-form-input" type="range"
                                               v-model="curItem.params.limit" min="1" max="5">
                                        <div class="display-value">
                                            最多<span class="value">{{ curItem.params.limit }}</span>个
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 编辑器: 拼团商品组 -->
                        <div id="tpl_editor_sharingGoods" v-if="curItem.type == 'sharingGoods'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <!--商品数据-->
                                <div class="j-switch-box" data-item-class="switch-source">
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label am-text-xs">商品来源 </label>
                                        <div class="am-u-sm-8 am-u-end">
                                            <label class="am-radio-inline">
                                                <input type="radio" value="auto" v-model="curItem.params.source"> 自动获取
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" value="choice" v-model="curItem.params.source"> 手动选择
                                            </label>
                                        </div>
                                    </div>
                                    <!--手动选择-->
                                    <div class="switch-source __choice" v-show="curItem.params.source == 'choice'">
                                        <div class="form-items __goods am-cf">
                                            <draggable :list="curItem.data"
                                                       :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                                <div v-for="(goods, index) in curItem.data"
                                                     class="form-item drag">
                                                    <i class="iconfont icon-shanchu item-delete" data-no-confirm="true"
                                                       @click="onEditorDeleleData(index,selectedIndex)"></i>
                                                    <div class="item-inner">
                                                        <div class="data-image">
                                                            <img :src="goods.image" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </draggable>
                                        </div>
                                        <div class="j-selectGoods form-item-add" @click.stop="onSelectGoods(curItem)">
                                            <i class="fa fa-plus"></i> 选择商品
                                        </div>
                                    </div>
                                    <!--自动获取-->
                                    <div class="switch-source __auto" v-show="curItem.params.source !== 'choice'">
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">商品分类 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <select v-model="curItem.params.auto.category"
                                                        data-am-selected="{btnSize: 'sm',  placeholder:'全部分类', maxHeight: 400}">
                                                    <option value="0"> -- 全部分类 --</option>
                                                    <template v-for="first in opts.sharingCatgory">
                                                        <option :value="first.category_id"> {{ first.name }}</option>
                                                        <template v-if="first.child">
                                                            <option v-for="two in first.child" :value="two.category_id">
                                                                　{{ two.name }}
                                                            </option>
                                                        </template>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">商品排序 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="all"
                                                           v-model="curItem.params.auto.goodsSort">
                                                    综合
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="sales"
                                                           v-model="curItem.params.auto.goodsSort">
                                                    销量
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="price"
                                                           v-model="curItem.params.auto.goodsSort">
                                                    价格
                                                </label>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">显示数量 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <input class="tpl-form-input" type="number" min="1"
                                                       v-model="curItem.params.auto.showNum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--分割线-->
                                <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>
                                <!--组件样式-->
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color"
                                               v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs"
                                                @click.stop="onEditorResetColor(curItem.style, 'background', '#f3f3f3')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示内容 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" value="1"
                                                   v-model="curItem.style.show.sellingPoint"> 商品卖点
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" value="1"
                                                   v-model="curItem.style.show.sharingPrice"> 拼团价格
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox"
                                                   v-model="curItem.style.show.linePrice"> 划线价格
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- 编辑器: 拼团砍价组 -->
                        <div id="tpl_editor_bargainGoods" v-if="curItem.type == 'bargainGoods'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <!--商品数据-->
                                <div class="j-switch-box" data-item-class="switch-source">
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label am-text-xs">商品来源 </label>
                                        <div class="am-u-sm-8 am-u-end">
                                            <label class="am-radio-inline">
                                                <input type="radio" value="auto" v-model="curItem.params.source"> 自动获取
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" value="choice" v-model="curItem.params.source"> 手动选择
                                            </label>
                                        </div>
                                    </div>
                                    <!--手动选择-->
                                    <div class="switch-source __choice" v-show="curItem.params.source == 'choice'">
                                        <div class="form-items __goods am-cf">
                                            <draggable :list="curItem.data"
                                                       :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                                <div v-for="(goods, index) in curItem.data"
                                                     class="form-item drag">
                                                    <i class="iconfont icon-shanchu item-delete" data-no-confirm="true"
                                                       @click="onEditorDeleleData(index,selectedIndex)"></i>
                                                    <div class="item-inner">
                                                        <div class="data-image">
                                                            <img :src="goods.goods_image" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </draggable>
                                        </div>
                                        <div class="j-selectGoods form-item-add" @click.stop="onSelectGoods(curItem)">
                                            <i class="fa fa-plus"></i> 选择商品
                                        </div>
                                    </div>
                                    <!--自动获取-->
                                    <div class="switch-source __auto" v-show="curItem.params.source !== 'choice'">
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">商品排序 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="all" v-model="curItem.params.auto.goodsSort">
                                                    综合
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="sales"
                                                           v-model="curItem.params.auto.goodsSort">
                                                    销量
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="price" v-model="curItem.params.auto.goodsSort">
                                                    价格
                                                </label>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs">显示数量 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <input class="tpl-form-input" type="number" min="1" v-model="curItem.params.auto.showNum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 分割线 -->
                                <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>
                                <!-- 组件样式 -->
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'background', '#f3f3f3')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">显示内容 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" value="1" v-model="curItem.style.show.goodsName"> 商品名称
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" value="1" v-model="curItem.style.show.peoples"> 正在砍价
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" value="1" v-model="curItem.style.show.floorPrice"> 砍价底价
                                        </label>
                                        <label class="am-checkbox-inline">
                                            <input type="checkbox" v-model="curItem.style.show.originalPrice"> 商品原价
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 辅助空白-->
                        <div id="tpl_editor_blank" v-if="curItem.type == 'blank'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">组件高度 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range" v-model="curItem.style.height" min="1" max="200">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.height }}</span>px(像素)
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 辅助线-->
                        <div id="tpl_editor_guide" v-if="curItem.type == 'guide'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">线条样式 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <label class="am-radio-inline">
                                            <input type="radio" value="solid" v-model='curItem.style.lineStyle'>
                                            实线
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="dashed" v-model='curItem.style.lineStyle'> 虚线
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" value="dotted" v-model='curItem.style.lineStyle'> 点状
                                        </label>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">线条颜色 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="" type="color" v-model="curItem.style.lineColor">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'lineColor', '#000000')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">线条高度 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range" v-model="curItem.style.lineHeight" min="1" max="20">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.lineHeight }}</span>px(像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-4 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range" v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px(像素)
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 富文本-->
                        <div id="tpl_editor_richText" v-if="curItem.type == 'richText'">
                            <div class="editor-title"><span>{{curItem.name}}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">上下边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range" v-model="curItem.style.paddingTop" min="0" max="50">
                                        <div class="display-value">
                                            <span class="value">{{ curItem.style.paddingTop }}</span>px(像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">左右边距 </label>
                                    <div class="am-u-sm-8 am-u-end">
                                        <input class="tpl-form-input" type="range" min="0" max="50" v-model="curItem.style.paddingLeft">
                                        <div class="display-value">
                                            <span class="value">{{curItem.style.paddingLeft}}</span>px(像素)
                                        </div>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-text-xs">背景颜色 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input class="" type="color" v-model="curItem.style.background">
                                        <button type="button" class="btn-resetColor am-btn am-btn-xs" @click.stop="onEditorResetColor(curItem.style, 'background', '#ffffff')">
                                            重置
                                        </button>
                                    </div>
                                </div>
                                <div class="am-form-group am-padding-top-sm">
                                    <textarea id="ume-editor" name="editorValue"></textarea>
                                </div>
                            </form>
                        </div>

                        <!--编辑器: 线下门店-->
                        <div id="tpl_editor_shop" v-if="curItem.type == 'shop'">
                            <div class="editor-title"><span>{{ curItem.name }}</span></div>
                            <form class="am-form tpl-form-line-form">
                                <!--商品数据-->
                                <div class="j-switch-box" data-item-class="switch-source">
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label am-text-xs">商品来源 </label>
                                        <div class="am-u-sm-8 am-u-end">
                                            <label class="am-radio-inline">
                                                <input type="radio" value="auto" v-model="curItem.params.source"> 自动获取
                                            </label>
                                            <label class="am-radio-inline">
                                                <input type="radio" value="choice" v-model="curItem.params.source"> 手动选择
                                            </label>
                                        </div>
                                    </div>
                                    <!--手动选择-->
                                    <div class="switch-source __choice"
                                         v-show="curItem.params.source == 'choice'">
                                        <div class="form-items __goods am-cf">
                                            <draggable :list="curItem.data"
                                                       :options="{ animation: 120, filter: 'input', preventOnFilter: false }">
                                                <div v-for="(shop, index) in curItem.data"
                                                     class="form-item drag">
                                                    <i class="iconfont icon-shanchu item-delete" data-no-confirm="true"
                                                       @click="onEditorDeleleData(index, selectedIndex)"></i>
                                                    <div class="item-inner">
                                                        <div class="data-image"><img :src="shop.logo_image" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </draggable>
                                        </div>
                                        <div class="j-selectShop form-item-add" @click.stop="onSelectShop(curItem)">
                                            <span>选择门店</span>
                                        </div>
                                    </div>
                                    <!-- 自动获取 -->
                                    <div class="switch-source"
                                         v-show="curItem.params.source == 'auto'">
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label am-text-xs"> 展示数量 </label>
                                            <div class="am-u-sm-8 am-u-end">
                                                <input class="tpl-form-input" type="number" min="1"
                                                       v-model="curItem.params.auto.showNum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </template>
                </div>