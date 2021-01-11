				<div class="diy-phone" v-cloak>
                    <!-- 手机顶部标题 -->
                    <div id="diy-page" class="phone-top optional" @click.stop="onEditer('page')"
                         :class="{selected: 'page' === selectedIndex}"
                         :style="{background: diyData.page.style.titleBackgroundColor + ' url(assets/store/img/diy/phone-top-' + diyData.page.style.titleTextColor + '.png) no-repeat center / contain'}">
                        <h4 :style="{color: diyData.page.style.titleTextColor}">{{ diyData.page.params.title }}</h4>
                    </div>
                    <!-- 小程序内容区域 -->
                    <div id="phone-main" class="phone-main" v-cloak>
                        <draggable :list="diyData.items" class="dragArea" @update="onDragItemEnd"
                                   :options="{animation: 120, filter: '.drag__nomove' }">
                            <template v-for="(item, index) in diyData.items">

                                <!-- diy元素: 图片轮播 -->
                                <template v-if="item.type == 'banner'">
                                    <div class="drag optional" @click.stop="onEditer(index)"
                                         :class="{selected: index === selectedIndex}">
                                        <div class="diy-banner">
                                            <img v-for="(banner, index) in item.data" v-if="index <= 1"
                                                 :src="banner.imgUrl">
                                            <div class="dots center" :class="item.style.btnShape">
                                                    <span v-for="banner in item.data"
                                                          :style="{background:item.style.btnColor}"></span>
                                            </div>
                                        </div>
                                        <div class="btn-edit-del">
                                            <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 单图组 -->
                                <template v-else-if="item.type == 'imageSingle'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-imageSingle"
                                                 :style="{ paddingBottom: item.style.paddingTop + 'px', background: item.style.background}">
                                                <div class="item-image" v-for="imageSingle in item.data"
                                                     :style="{padding: item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px 0'}">
                                                    <img :src="imageSingle.imgUrl">
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 图片橱窗 -->
                                <template v-else-if="item.type == 'window'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-window"
                                                 :style="{ background: item.style.background, padding: item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px' }">
                                                <ul class="data-list" v-if="item.style.layout > -1"
                                                    :class="'am-avg-sm-' + item.style.layout">
                                                    <li v-for="window in item.data"
                                                        :style="{ padding: item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px' }">
                                                        <div class="item-image">
                                                            <img :src="window.imgUrl">
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="display" v-else>
                                                    <div class="display-left"
                                                         :style="{ padding: item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px' }">
                                                        <img :src="item.data[0].imgUrl">
                                                    </div>
                                                    <div class="display-right">
                                                        <div v-if="item.data.length >= 2" class="display-right1"
                                                             :style="{ padding:item.style.paddingTop+'px '+item.style.paddingLeft +'px' }">
                                                            <img :src="item.data[1].imgUrl">
                                                        </div>
                                                        <div class="display-right2">
                                                            <div v-if="item.data.length >= 3" class="left"
                                                                 :style="{ padding:item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px' }">
                                                                <img :src="item.data[2].imgUrl">
                                                            </div>
                                                            <div v-if="item.data.length >= 4" class="right"
                                                                 :style="{ padding:item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px' }">
                                                                <img :src="item.data[3].imgUrl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 视频组 -->
                                <template v-else-if="item.type == 'video'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-video" :style="{padding:item.style.paddingTop + 'px 0'}">
                                                <video :style="{height:item.style.height + 'px'}"
                                                       :src="item.params.videoUrl"
                                                       :poster="item.params.poster"
                                                       :autoplay="item.params.autoplay == 1"
                                                       controls>
                                                    您的浏览器不支持 video 标签
                                                </video>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 文章组 -->
                                <template v-else-if="item.type == 'article'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-article">
                                                <div class="article-item"
                                                     v-for="item in (item.params.source == 'choice' ? item.data : item.defaultData)"
                                                     :class="'show-type__' + item.show_type">
                                                    <!-- 小图模式 -->
                                                    <template v-if="item.show_type == 10">
                                                        <div class="article-item__left flex-box">
                                                            <div class="article-item__title twolist-hidden">
                                                                <span class="f-30 col-3">{{ item.article_title }}</span>
                                                            </div>
                                                            <div class="article-item__footer">
                                                                <span class="article-views">
                                                                    {{ item.views_num }}次浏览
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="article-item__image">
                                                            <img :src="item.image" alt="">
                                                        </div>
                                                    </template>
                                                    <!-- 大图模式 -->
                                                    <template v-if="item.show_type == 20">
                                                        <div class="article-item__title">
                                                            <span class="f-30 col-3">{{ item.article_title }}</span>
                                                        </div>
                                                        <div class="article-item__image">
                                                            <img :src="item.image">
                                                        </div>
                                                        <div class="article-item__footer">
                                                            <span class="article-views">
                                                                {{ item.views_num }}次浏览
                                                            </span>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 头条快报 -->
                                <template v-else-if="item.type == 'special'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-special dis-flex flex-y-center">
                                                <div class="special-left">
                                                    <img :src="item.style.image" alt="">
                                                </div>
                                                <div class="special-content flex-box"
                                                     :class="'display_' + item.style.display">
                                                    <ul class="special-content-list">
                                                        <li class="content-item am-text-truncate"
                                                            v-for="item in (item.params.source == 'choice' ? item.data : item.defaultData)">
                                                            <span>{{ item.article_title }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="special-more">
                                                    <i class="iconfont icon-xiangyoujiantou"></i>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 搜索栏 -->
                                <template v-else-if="item.type == 'search'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-search">
                                                <div class="inner"
                                                     :class="item.style.searchStyle">
                                                    <div class="search-input"
                                                         :style="{textAlign: item.style.textAlign}">
                                                        <i class="search-icon iconfont icon-ss-search"></i>
                                                        <span>{{item.params.placeholder}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 公告组 -->
                                <template v-else-if="item.type == 'notice'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-notice dis-flex"
                                                 :style="{padding: item.style.paddingTop + 'px' + ' 10px', background: item.style.background}">
                                                <div class="notice__icon">
                                                    <img :src="item.params.icon">
                                                </div>
                                                <div class="notice__text flex-box am-text-truncate">
                                                    <span :style="{color: item.style.textColor}">{{item.params.text}}</span>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
								
								<!-- diy元素: 新品推荐 -->
                                <template v-else-if="item.type == 'newest'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-newest dis-flex"
                                                 :style="{paddingTop: item.style.paddingTop + 'px',paddingBottom: item.style.paddingTop + 'px', background: item.style.background}">
                                                <div class="newest_icon">
                                                    <img v-if="item.params.type == 'image'" :src="item.params.icon">
													<span class="newest_text" v-if="item.params.type == 'text'">{{ item.params.text }}</span>
                                                </div>
												<div class="newest_list">
                                                    <img src="assets/store/img/diy/newest_2.jpg" />
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 导航组 -->
                                <template v-else-if="item.type == 'navBar'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-navBar" :style="{background:item.style.background}">
                                                <ul class=""
                                                    :class="item.style.rowsNum === '4'?'am-avg-sm-4':(item.style.rowsNum ==='3'?'am-avg-sm-3':'am-avg-sm-5')">
                                                    <li class="" v-for="(navBar,index) in item.data">
                                                        <div class="item-image">
                                                            <img :src="navBar.imgUrl">
                                                        </div>
                                                        <p class="item-text am-text-truncate"
                                                           :style="{color:navBar.color}">
                                                            {{navBar.text}}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 商品组 -->
                                <template v-else-if="item.type == 'goods'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected: index === selectedIndex}">
                                            <div class="diy-goods" :style="{background:item.style.background}">
                                                <ul class="goods-list am-cf" :class="['display__' + item.style.display, 'column__' + item.style.column]">
													<li class="goods-item" v-for="goods in (item.params.source == 'choice' ? item.data : item.defaultData)">
                                                        <!-- 单列商品 -->
                                                        <template v-if="item.style.column == 1">
                                                            <div class="dis-flex">
                                                                <!-- 商品图片 -->
                                                                <div class="goods-item_left">
                                                                    <img :src="goods.image">
                                                                </div>
                                                                <div class="goods-item_right">
                                                                    <!-- 商品名称 -->
                                                                    <div v-if="item.style.show.goodsName"
                                                                         class="goods-item_title twolist-hidden">
                                                                        <span>{{ goods.goods_name }}</span>
                                                                    </div>
                                                                    <div class="goods-item_desc">
                                                                        <!-- 商品卖点 -->
                                                                        <div v-if="item.style.show.sellingPoint"
                                                                             class="desc-selling_point am-text-truncate">
                                                                            <span>{{ goods.selling_point }}</span>
                                                                        </div>
                                                                        <!-- 商品销量 -->
                                                                        <div v-if="item.style.show.goodsSales"
                                                                             class="desc-goods_sales am-text-truncate">
                                                                            <span>已售{{ goods.goods_sales }}件</span>
                                                                        </div>
                                                                        <!-- 商品价格 -->
                                                                        <div class="desc_footer">
                                                                            <span v-if="item.style.show.goodsPrice"
                                                                                  class="price_x">¥{{ goods.goods_price }}</span>
                                                                            <span class="price_y x-color-999"
                                                                                  v-if="item.style.show.linePrice && goods.line_price > 0">¥{{ goods.line_price }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>

                                                        <!-- 两列三列 -->
                                                        <template v-else>
                                                            <div class="goods-image">
                                                                <img :src="goods.image">
                                                            </div>
                                                            <div class="detail">
                                                                <p v-if="item.style.show.goodsName"
                                                                   class="goods-name twolist-hidden">
                                                                    {{goods.goods_name}}
                                                                </p>
                                                                <p class="detail-price">
                                                                  <span v-if="item.style.show.goodsPrice"
                                                                        class="goods-price x-color-red">{{ goods.goods_price }}</span>
                                                                    <span v-if="item.style.show.linePrice && goods.line_price > 0"
                                                                          class="line-price">{{ goods.line_price }}</span>
                                                                </p>
                                                            </div>
                                                        </template>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 优惠券组 -->
                                <template v-else-if="item.type == 'coupon'">
                                    <div @click.stop="onEditer(index)"
                                         class="drag optional" :class="{selected: index === selectedIndex}">
                                        <div class="diy-coupon dis-flex flex-x-around"
                                             :style="{background:item.style.background,padding: item.style.paddingTop+'px '+' 0'}">
                                            <div v-for="coupon in item.data" class="coupon-wrapper">
                                                <div class="coupon-item" :style="{background:coupon.color}">
                                                    <i class="before" :style="{background:item.style.background}"></i>
                                                    <div :style="{background:coupon.color}"
                                                         class="left-content dis-flex flex-dir-column flex-x-center flex-y-center">
                                                        <div class="content-top">
                                                            <span class="unit">￥</span>
                                                            <span class="price">{{ coupon.reduce_price }}</span>
                                                        </div>
                                                        <div class="content-bottom">
                                                            <span>满{{ coupon.min_price }}元可用</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-receive dis-flex flex-dir-column flex-x-center flex-y-center">
                                                        <span>立即</span>
                                                        <span>领取</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-edit-del">
                                            <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 拼团商品组 -->
                                <template v-else-if="item.type == 'sharingGoods'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-sharingGoods" :style="{background: item.style.background }">
                                                <div class="goods-item dis-flex" v-for="(goods, index) in item.data">
                                                    <!-- 商品图片 -->
                                                    <div class="goods-item_left">
                                                        <img :src="goods.image">
                                                    </div>
                                                    <div class="goods-item_right">
                                                        <!-- 商品名称 -->
                                                        <div v-if="item.style.show.goodsName"
                                                             class="goods-item_title twolist-hidden">
                                                            <span>{{ goods.goods_name }}</span>
                                                        </div>
                                                        <div class="goods-item_desc">
                                                            <!-- 商品卖点 -->
                                                            <div v-if="item.style.show.sellingPoint"
                                                                 class="desc-selling_point am-text-truncate">
                                                                <span>{{ goods.selling_point }}</span>
                                                            </div>
                                                            <!-- 拼团信息 -->
                                                            <div class="desc-situation">
                                                                <span class="iconfont icon-pintuan_huaban"></span>
                                                                <span class="people">2人团</span>
                                                                <span class="x-color-999">已有43人进行拼团</span>
                                                            </div>
                                                            <!-- 商品价格 -->
                                                            <div class="desc_footer">
                                                                <span class="price_x"
                                                                      v-if="item.style.show.sharingPrice">¥{{ goods.sharing_price }}</span>
                                                                <span class="price_y x-color-999"
                                                                      v-if="item.style.show.linePrice && goods.line_price > 0">¥{{ goods.line_price }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="btn-settlement">去拼团</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 砍价商品组 -->
                                <template v-else-if="item.type == 'bargainGoods'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-bargainGoods" :style="{background: item.style.background }">
                                                <div class="goods-item dis-flex" v-for="(goods, index) in item.data">
                                                    <!-- 商品图片 -->
                                                    <div class="goods-image">
                                                        <img :src="goods.goods_image">
                                                    </div>
                                                    <div class="goods-info">
                                                        <!-- 商品名称 -->
                                                        <div v-if="item.style.show.goodsName" class="goods-name">
                                                            <span class="twolist-hidden">{{ goods.goods_name }}</span>
                                                        </div>
                                                        <!-- 参与的用户头像 -->
                                                        <div v-if="item.style.show.peoples"
                                                             class="peoples dis-flex">
                                                            <div class="user-list dis-flex">
                                                                <div v-for="help in item.demo.helps"
                                                                     class="user-item-avatar">
                                                                    <img :src="help.avatarUrl">
                                                                </div>
                                                            </div>
                                                            <div class="people__text">
                                                                <span>{{ item.demo.helps_count }}人正在砍价</span>
                                                            </div>
                                                        </div>
                                                        <!-- 商品原价 -->
                                                        <div v-if="item.style.show.originalPrice" class="goods-price">
                                                            <span>￥{{ goods.original_price }}</span>
                                                        </div>
                                                        <!-- 砍价低价 -->
                                                        <div v-if="item.style.show.floorPrice" class="floor-price">
                                                            <span class="small">最低￥</span><span class="big">{{ goods.floor_price }}</span>
                                                        </div>
                                                        <!-- 操作按钮 -->
                                                        <div class="opt-touch">
                                                            <div class="touch-btn">
                                                                <span>立即参加</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 线下门店 -->
                                <template v-else-if="item.type == 'shop'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-shop">
                                                <div class="shop-item dis-flex flex-y-center"
                                                     v-for="(shop, index) in (item.params.source == 'choice' ? item.data : item.defaultData)">
                                                    <div class="shop-item__logo">
                                                        <img :src="shop.logo_image" alt="门店logo">
                                                    </div>
                                                    <div class="shop-item__content flex-box">
                                                        <div class="shop-item__title">
                                                            <span>{{ shop.shop_name }}</span>
                                                        </div>
                                                        <div class="shop-item__address am-text-truncate">
                                                            <span>门店地址：{{ shop.region.province }}{{ shop.region.city }}{{ shop.region.region }}{{ shop.address }}</span>
                                                        </div>
                                                        <div class="shop-item__phone">
                                                            <span>联系电话：{{ shop.phone }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 辅助空白 -->
                                <template v-else-if="item.type == 'blank'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected:index === selectedIndex}">
                                            <div class="diy-blank"
                                                 :style="{height: item.style.height +'px', background:item.style.background }">
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 辅助线 -->
                                <template v-else-if="item.type == 'guide'">
                                    <div @click.stop="onEditer(index)"
                                         class="drag optional" :class="{selected: index === selectedIndex}">
                                        <div class="diy-guide"
                                             :style="{padding: item.style.paddingTop +'px '+'0', background:item.style.background }">
                                            <p class="line"
                                               :style="{borderTopWidth: item.style.lineHeight +'px',borderTopColor:item.style.lineColor,borderTopStyle: item.style.lineStyle }">
                                            </p>
                                        </div>
                                        <div class="btn-edit-del">
                                            <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 在线客服 -->
                                <template v-else-if="item.type == 'service'">
                                    <div class="diy-service drag optional drag__nomove" @click.stop="onEditer(index)"
                                         :class="{selected: index === selectedIndex}"
                                         :style="{ right: item.style.right + '%', bottom: item.style.bottom + '%', opacity: item.style.opacity / 100 }">
                                        <div class="service-icon">
                                            <img :src="item.params.image" alt="">
                                        </div>
                                        <div class="btn-edit-del">
                                            <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                        </div>
                                    </div>
                                </template>

                                <!-- diy元素: 富文本 -->
                                <template v-else-if="item.type == 'richText'">
                                    <div @click.stop="onEditer(index)">
                                        <div class="drag optional" :class="{selected: index === selectedIndex}">
                                            <div class="diy-richText"
                                                 :style="{background: item.style.background, padding: item.style.paddingTop + 'px ' + item.style.paddingLeft + 'px'}"
                                                 v-html="item.params.content">
                                            </div>
                                            <div class="btn-edit-del">
                                                <div class="btn-del" @click.stop="onDeleleItem(index)">删除</div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                            </template>
                        </draggable>
                    </div>
                </div>
