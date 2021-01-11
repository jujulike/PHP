<!-- 内容区域 start -->
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<link rel="stylesheet" href="assets/store/css/wechat.diy.css">
<div class="row-content am-cf">
    <div class="widget am-cf">
        <div class="widget-body">
            <!-- diy 工作区 -->
            <div id="app" class="work-diy dis-flex flex-x-between">
                <!-- 工具栏 -->
                <div id="diy-menu" class="diy-menu">
                    <div class="menu-title"><span>组件库</span></div>
                    <div class="navs">
                        <div class="navs-group">
                            <div class="title">媒体组件</div>
                            <div class="navs-components am-cf">
                                <nav class="special" @click="onAddItem('banner')">
                                    <p class="item-icon"><i class="iconfont icon-tupianlunbo"></i></p>
                                    <p>图片轮播</p>
                                </nav>
                                <nav class="special" @click="onAddItem('imageSingle')">
                                    <p class="item-icon"><i class="iconfont icon-tupian1"></i></p>
                                    <p>单图组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('window')">
                                    <p class="item-icon"><i class="iconfont icon-newbilayout"></i></p>
                                    <p>图片橱窗</p>
                                </nav>
                                <nav class="special" @click="onAddItem('video')">
                                    <p class="item-icon"><i class="iconfont icon-shipin7"></i></p>
                                    <p>视频组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('article')">
                                    <p class="item-icon"><i class="iconfont icon-zixun"></i></p>
                                    <p>文章组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('special')">
                                    <p class="item-icon"><i class="iconfont icon-toutiao"></i></p>
                                    <p>头条快报</p>
                                </nav>
                            </div>
                            <div class="title">商城组件</div>
                            <div class="navs-components am-cf">
                                <nav class="special" @click="onAddItem('search')">
                                    <p class="item-icon"><i class="iconfont icon-wxbsousuotuiguang"></i></p>
                                    <p>搜索框</p>
                                </nav>
                                <nav class="special" @click="onAddItem('notice')">
                                    <p class="item-icon"><i class="iconfont icon-gonggao"></i></p>
                                    <p>公告组</p>
                                </nav>
								<nav class="special" @click="onAddItem('newest')">
                                    <p class="item-icon"><i class="iconfont icon-gonggao"></i></p>
                                    <p>新品推荐</p>
                                </nav>
                                <nav class="special" @click="onAddItem('navBar')">
                                    <p class="item-icon"><i class="iconfont icon-daohang"></i></p>
                                    <p>导航组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('goods')">
                                    <p class="item-icon"><i class="iconfont icon-shangpin5"></i></p>
                                    <p>商品组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('coupon')">
                                    <p class="item-icon"><i class="iconfont icon-youhuiquan2"></i></p>
                                    <p>优惠券组</p>
                                </nav>
                                <nav class="special" @click="onAddItem('sharingGoods')">
                                    <p class="item-icon"><i class="iconfont icon-shangpin5"></i></p>
                                    <p>拼团商品</p>
                                </nav>
                                <nav class="special" @click="onAddItem('bargainGoods')">
                                    <p class="item-icon"><i class="iconfont icon-kanjia"></i></p>
                                    <p>砍价商品</p>
                                </nav>
                                <nav class="special" @click="onAddItem('shop')">
                                    <p class="item-icon"><i class="iconfont icon-mendian"></i></p>
                                    <p>线下门店</p>
                                </nav>
                            </div>
                            <div class="title">工具组件</div>
                            <div class="navs-components am-cf">
                                <nav class="special" @click="onAddItem('service')">
                                    <p class="item-icon"><i class="iconfont icon-kefu"></i></p>
                                    <p>在线客服</p>
                                </nav>
                                <nav class="special" @click="onAddItem('richText')">
                                    <p class="item-icon"><i class="iconfont icon-wenbenbianji"></i></p>
                                    <p>富文本</p>
                                </nav>
                                <nav class="special" @click="onAddItem('blank')">
                                    <p class="item-icon"><i class="iconfont icon-kongbai"></i></p>
                                    <p>辅助空白</p>
                                </nav>
                                <nav class="special" @click="onAddItem('guide')">
                                    <p class="item-icon"><i class="iconfont icon-fengexian1"></i></p>
                                    <p>辅助线</p>
                                </nav>
                            </div>	
                        </div>
                    </div>
                    <div class="action">
                        <button @click.stop="onSubmit" type="button" class="am-btn am-btn-xs am-btn-secondary">
                            保存页面
                        </button>
                    </div>
                </div>

                <!--手机diy容器-->
                {{include file="wxapp/page/tpl/diy" /}}

                <!-- 编辑器容器 -->
                {{include file="wxapp/page/tpl/editor" /}}
				
            </div>
            <!-- 提示 -->
            <div class="tips am-margin-top-lg am-margin-bottom-sm">
                <div class="pre">
                    <p>1. 设计完成后点击"保存页面"，在小程序端页面下拉刷新即可看到效果。</p>
                    <p>2. 如需填写链接地址请参考<a href="index.php?s=/store/setting.help/links" target="_blank">页面链接</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}

<script src="assets/store/js/vue.min.js"></script>
<script src="assets/store/js/Sortable.min.js"></script>
<script src="assets/store/js/vuedraggable.min.js"></script>
<script src="assets/store/js/select.data.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script src="assets/store/js/wechat.diy.js"></script>
<script>

    $(function () {
        // 渲染diy页面
		new diyPhone(<?= $temp.','.$jsonData.','.$opts ?>);
    });

</script>
<!-- 内容区域 end -->
