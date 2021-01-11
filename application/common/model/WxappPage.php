<?php
namespace app\common\model;
use think\Request;

/**
 * 微信小程序diy页面模型
 */
class WxappPage extends BaseModel
{
    protected $name = 'wxapp_page';
	
	/**
     * 页面类型
     */
    public function getPageTypeAttr($value)
    {
        $status = [10 => '商城首页', 20 => '自定义页'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 格式化页面数据（读取的时候对数据转换）
     */
    public function getPageDataAttr($json)
    {
        $array = json_decode($json, true);
        return compact('array', 'json');
    }


    /**
     * 自动转换data为json格式(修改器，保存de时候操作)
     */
    public function setPageDataAttr($value)
    {
        return json_encode($value ?: ['items' => []]);
    }
	
	/**
     * 获取页面列表
     */
    public function getList()
    {
        // 排序规则
        $sort = [];
        $sort = ['page_id' => 'desc'];
        // 执行查询
        $list = $this->order($sort)
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
	/**
     * diy页面详情
     */
    public static function diyPage()
    {
        return self::get(['page_type' =>10]);
    }
    /**
     * diy页面详情
     */
    public static function detail($page_id)
    {
        return self::get($page_id);
    }

    /**
     * 新增小程序首页diy默认设置
     */
    public function insertDefault($wxapp_id)
    {
        return $this->save([
            'page_type' => 10,
			'category_style' => 30,
            'page_data' => [
				'page' => [
					'type' => 'page',
					'name' => '页面设置',
					'params' => [
						'name' => '默认首页',
						'title' => '河马科技',
						'share_title' => '河马科技',
						'share_image' => base_url().'assets/store/img/diy/share.png'
					],
					'style' => [
						'titleTextColor' => 'black',
						'titleBackgroundColor' => '#ffffff'
					],
					'id' => 'page'
				],
				'items' => [
					[
						'name' => '搜索框',
						'type' => 'search',
						'params' => [
							'placeholder' => '请输入关键字进行搜索'
						],
						'style' => [
							'textAlign' => 'left',
							'searchStyle' => 'square'
						]
					],
					[
						'name' => '图片轮播',
						'type' => 'banner',
						'style' => [
							'btnColor' => '#ffffff',
							'btnShape' => 'square'
						],
						'params' => [
							"interval" => '2800'
						],
						'data' => [
							[
								'imgUrl' => base_url().'assets/store/img/diy/banner_01.jpg',
								'linkUrl' => ''
							],
							[
								'imgUrl' => base_url().'assets/store/img/diy/banner_01.jpg',
								'linkUrl' => ''
							]
						]
					]
				]				
            ],
            'wxapp_id' => $wxapp_id
        ]);
    }
	
	/**
     * 默认页面头部
     */
    public static function page()
    {
		$page['array'] = [
			'page' => [
				'type' => 'page',
				'name' => '页面设置',
				'params' => [
					'name' => '页面名称',
					'title' => '页面标题',
					'share_title' => '分享标题',
					'share_image' => base_url().'assets/store/img/diy/share.png'
				],
				'style' => [
					'titleTextColor' => 'black',
					'titleBackgroundColor' => '#ffffff'
				],
				'id' => 'page'
			],
			'items' => [
				//项目为空
			]
			
		];
		$page['json'] = json_encode($page['array']);
		return $page;
	}
	
	/**
     * 首页diy模板
     */
    public static function temp()
    {
		$temp['array'] = [
			//图片轮播
			'banner' => [
				'name' => '图片轮播',
				'type' => 'banner',
				'style' => [
					'btnColor' => '#ffffff',
					'btnShape' => 'round'
				],
				'params' => [
					'interval' => '2800'
				],
				'data' => [
					[
						'imgUrl' => base_url().'assets/store/img/diy/banner_01.jpg',
						'linkUrl' => ''
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/banner_02.jpg',
						'linkUrl' => ''
					]
				]
			],
			//单图组
			'imageSingle' => [
				'name' => '单图组',
				'type' => 'imageSingle',
				'style' => [
					'borderRadius' => '0',
					'paddingTop' => '0',
					'paddingLeft' => '0',
					'background' => '#ffffff'
				],
				'data' => [
					[
						'imgUrl' => base_url().'assets/store/img/diy/banner_01.jpg',
						'imgName' => 'image-1.jpg',
						'linkUrl' => ''
					]
				]
			],
			//图片橱窗
			'window' => [
				'name' => '图片橱窗',
				'type' => 'window',
				'style' => [
					'borderRadius' => '0',
					'paddingTop' => '0',
					'paddingLeft' => '0',
					'background' => '#ffffff',
					'layout' => '2'
				],
				'data' => [
					[
						'imgUrl' => base_url().'assets/store/img/diy/window_01.jpg',
						'linkUrl' => ''
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/window_02.jpg',
						'linkUrl' => ''
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/window_03.jpg',
						'linkUrl' => ''
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/window_04.jpg',
						'linkUrl' => ''
					]
				],
				'dataNum' => 4
			],
			//视频组
			'video' => [
				'name' => '视频组',
				'type' => 'video',
				'params' => [
					'videoUrl' => 'http://wxsnsdy.tc.qq.com/105/20210/snsdyvideodownload?filekey=30280201010421301f0201690402534804102ca905ce620b1241b726bc41dcff44e00204012882540400',
					'poster' => base_url().'assets/store/img/diy/video_poster.png',
					'autoplay' => '0'
				],
				'style' => [
					'paddingTop' => '0',
					'height' => '190'
				]
			],
			//文章组
			'article' => [
				'name' => '文章组',
				'type' => 'article',
				'params' => [
					'source' => 'auto',
					'auto' => [
						'category' => 0,
						'showNum' => 6
					]
				],
				'style' => [],
				'defaultData' => [
					[
						'article_title' => '此处显示文章标题',
						'show_type' => 10,
						'image' => base_url().'assets/store/img/diy/article_01.png',
						'views_num' => '309'
					],
					[
						'article_title' => '此处显示文章标题',
						'show_type' => 10,
						'image' => base_url().'assets/store/img/diy/article_01.png',
						'views_num' => '309'
					]
				],
				'data' => []
			],
			//头条快报
			'special' => [
				'name' => '头条快报',
				'type' => 'special',
				'params' => [
					'source' => 'auto',
					'auto' => [
						'category' => 0,
						'showNum' => 6
					]
				],
				'style' => [
					'display' => '1',
					'image' => base_url().'assets/store/img/diy/special.png'
				],
				'defaultData' => [
					[
						'article_title' => '张小龙4小时演讲：你和高手之间，隔着“简单”二字'
					],
					[
						'article_title' => '张小龙4小时演讲：你和高手之间，隔着“简单”二字'
					]
				],
				'data' => []
			],
			//搜索框
			'search' => [
				'name' => '搜索框',
				'type' => 'search',
				'params' => [
					'placeholder' => '请输入关键字进行搜索'
				],
				'style' => [
					'textAlign' => 'left',
					'searchStyle' => 'square'
				]
			],
			//公告组
			'notice' => [
				'name' => '公告组',
				'type' => 'notice',
				'params' => [
					'text' => '这里是第一条自定义公告的标题',
					'icon' => base_url().'assets/store/img/diy/notice.png'
				],
				'style' => [
					'paddingTop' => '0',
					'background' => '#ffffff',
					'textColor' => '#000000'
				]
			],
			//新品推荐
			'newest' => [
				'name' => '新品推荐',
				'type' => 'newest',
				'params' => [
					'text' => '新品推荐',
					'type' => 'text',
					'icon' => base_url().'assets/store/img/diy/newest_1.jpg'
				],
				'style' => [
					'paddingTop' => '0',
					'background' => '#ffffff',
					'textColor' => '#000000'
				]
			],
			//导航组
			'navBar' => [
				'name' => '导航组',
				'type' => 'navBar',
				'style' => [
					'background' => '#ffffff',
					'rowsNum' => '4'
				],
				'data' => [
					[
						'imgUrl' => base_url().'assets/store/img/diy/navbar_01.png',
						'imgName' => 'icon-1.png',
						'linkUrl' => '',
						'text' => '按钮文字1',
						'color' => '#666666'
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/navbar_01.png',
						'imgName' => 'icon-2.png',
						'linkUrl' => '',
						'text' => '按钮文字2',
						'color' => '#666666'
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/navbar_01.png',
						'imgName' => 'icon-3.png',
						'linkUrl' => '',
						'text' => '按钮文字3',
						'color' => '#666666'
					],
					[
						'imgUrl' => base_url().'assets/store/img/diy/navbar_01.png',
						'imgName' => 'icon-4.png',
						'linkUrl' => '',
						'text' => '按钮文字4',
						'color' => '#666666'
					],
				]
			],
			//商品组
			'goods' => [
				'name' => '商品组',
				'type' => 'goods',
				'params' => [
					'source' => 'auto', //商品来源，auto=自动选择，choice=手动选择
					'auto' => [	//自动选择配置
						'category' => 0, //分类编号
						'goodsSort' => 'all',	//商品排序，all=综合，sales=销量，price=价格
						'showNum' => 6	//显示数量
					]
				],
				'style' => [
					'background' => '#F6F6F6', //背景颜色
					'display' => 'list', 	//显示类型，list=列表平铺，slide=横向滑动
					'column' => '2',	//分列数量，1=单列，2=双列，3=三列
					'show' => [	//显示内容
						'goodsName' => '1',	//商品名称
						'goodsPrice' => '1',	//商品价格
						'linePrice' => '1',	//划线价格
						'sellingPoint' => '0',//商品卖点
						'goodsSales' => '0'	//商品销量
					]
				],
				'defaultData' => [	//默认数据
					[
						'goods_name' => '此处显示商品名称',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'goods_price' => '99.00',
						'line_price' => '139.00',
						'selling_point' => '此款商品美观大方 不容错过',
						'goods_sales' => '100'
					],
					[
						'goods_name' => '此处显示商品名称',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'goods_price' => '99.00',
						'line_price' => '139.00',
						'selling_point' => '此款商品美观大方 不容错过',
						'goods_sales' => '100'
					],
					[
						'goods_name' => '此处显示商品名称',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'goods_price' => '99.00',
						'line_price' => '139.00',
						'selling_point' => '此款商品美观大方 不容错过',
						'goods_sales' => '100'
					],
					[
						'goods_name' => '此处显示商品名称',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'goods_price' => '99.00',
						'line_price' => '139.00',
						'selling_point' => '此款商品美观大方 不容错过',
						'goods_sales' => '100'
					]
				],
				'data' => [	//选择数据
					[
						'goods_name' => '此处显示商品名称',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'goods_price' => '99.00',
						'line_price' => '139.00',
						'selling_point' => '此款商品美观大方 不容错过',
						'goods_sales' => '100',
						'is_default' => true
					]
				]
			],
			//优惠券组
			'coupon' => [
				'name' => '优惠券组',
				'type' => 'coupon',
				'style' => [
					'paddingTop' => '10',
					'background' => '#ffffff'
				],
				'params' => [
					'limit' => '5'
				],
				'data' => [
					[
						'color' => 'red',
						'reduce_price' => '10',
						'min_price' => '100.00'
					],
					[
						'color' => 'violet',
						'reduce_price' => '10',
						'min_price' => '100.00'
					]
				]
			],
			//拼团商品
			'sharingGoods' => [
				'name' => '拼团商品组',
				'type' => 'sharingGoods',
				'params' => [
					'source' => 'auto',
					'auto' => [
						'category' => 0,
						'goodsSort' => 'all',
						'showNum' => 6
					]
				],
				'style' => [
					'background' => '#F6F6F6',
					'show' => [
						'goodsName' => '1',
						'sellingPoint' => '1',
						'sharingPrice' => '1',
						'linePrice' => '1'
					]
				],
				'defaultData' => [
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00'
					],
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00'
					],
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00'
					],
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00'
					]
				],
				'data' => [
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00',
						'is_default' => true
					],
					[
						'goods_name' => '此处是拼团商品',
						'image' => base_url().'assets/store/img/diy/goods_01.png',
						'selling_point' => '此款商品美观大方 性价比较高 不容错过',
						'sharing_price' => '99.00',
						'line_price' => '139.00',
						'is_default' => true
					]
				]
			],
			//砍价商品
			'bargainGoods' => [
				'name' => '砍价商品组',
				'type' => 'bargainGoods',
				'params' => [
					'source' => 'auto',
					'auto' => [
						'category' => 0,
						'goodsSort' => 'all',
						'showNum' => 6
					]
				],
				'style' => [
					'background' => '#F6F6F6',
					'show' => [
						'goodsName' => '1',
						'peoples' => '1',
						'floorPrice' => '1',
						'originalPrice' => '1'
					]
				],
				'demo' => [
					'helps_count' => 2,
					'helps' => [
						[
							'avatarUrl' => base_url().'assets/store/img/diy/goods_01.png'
						],
						[
							'avatarUrl' => base_url().'assets/store/img/diy/goods_01.png'
						]
					]
				],
				'defaultData' => [
					[
						'goods_name' => '此处是砍价商品',
						'goods_image' => base_url().'assets/store/img/diy/goods_01.png',
						'floor_price' => '0.01',
						'original_price' => '139.00'
					],
					[
						'goods_name' => '此处是砍价商品',
						'goods_image' => base_url().'assets/store/img/diy/goods_01.png',
						'floor_price' => '0.01',
						'original_price' => '139.00'
					]
				],
				'data' => [
					[
						'goods_name' => '此处是砍价商品',
						'goods_image' => base_url().'assets/store/img/diy/goods_01.png',
						'floor_price' => '0.01',
						'original_price' => '139.00'
					],
					[
						'goods_name' => '此处是砍价商品',
						'goods_image' => base_url().'assets/store/img/diy/goods_01.png',
						'floor_price' => '0.01',
						'original_price' => '139.00'
					]
				]
			],
			//线下门店
			'shop' => [
				'name' => '线下门店',
				'type' => 'shop',
				'params' => [
					'source' => 'auto',
					'auto' => [
						'showNum' => 6
					]
				],
				'style' => [],
				'defaultData' => [
					[
						'shop_name' => '此处显示门店名称',
						'logo_image' => base_url().'assets/store/img/diy/circular.png',
						'phone' => '010-6666666',
						'region' => [
							'province' => 'xx省',
							'city' => 'xx市',
							'region' => 'xx区'
						],
						'address' => 'xx街道'
					],
					[
						'shop_name' => '此处显示门店名称',
						'logo_image' => base_url().'assets/store/img/diy/circular.png',
						'phone' => '010-6666666',
						'region' => [
							'province' => 'xx省',
							'city' => 'xx市',
							'region' => 'xx区'
						],
						'address' => 'xx街道'
					]
				],
				'data' => [
					[
						'shop_name' => '此处显示门店名称',
						'logo_image' => base_url().'assets/store/img/diy/circular.png',
						'phone' => '010-6666666',
						'region' => [
							'province' => 'xx省',
							'city' => 'xx市',
							'region' => 'xx区'
						],
						'address' => 'xx街道'
					]
				]
			],
			//在线客服
			'service' => [
				'name' => '在线客服',
				'type' => 'service',
				'params' => [
					'type' => 'chat',//chat=客服，phone=拨打电话
					'image' => base_url().'assets/store/img/diy/service.png',
					'phone_num' => ''
				],
				'style' => [
					'right' => '1',
					'bottom' => '10',
					'opacity' => '100'
				]
			],
			//富文本
			'richText' => [
				'name' => '富文本',
				'type' => 'richText',
				'params' => [
					'content' => '这里是文本的内容'
				],
				'style' => [
					'paddingTop' => '0',
					'paddingLeft' => '0',
					'background' => '#ffffff'
				]
			],
			//辅助空白
			'blank' => [
				'name' => '辅助空白',
				'type' => 'blank',
				'style' => [
					'height' => '20',
					'background' => '#ffffff'
				]
			],
			//辅助线
			'guide' => [
				'name' => '辅助线',
				'type' => 'guide',
				'style' => [
					'background' => '#ffffff',
					'lineStyle' => 'solid',
					'lineHeight' => '1',
					'lineColor' => '#000000',
					'paddingTop' => '10'
				]
			]
		];
		$temp['json'] = json_encode($temp['array']);
		return $temp;
        
    }
	

}
