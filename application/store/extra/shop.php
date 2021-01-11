<?php

return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
	/*
	'store' => [
        'name' => '管理员',
        'icon' => 'icon-guanliyuan',
        'index' => 'store.user/index',
        'submenu' => [
            [
                'name' => '管理员列表',
                'index' => 'store.user/index',
                'uris' => [
                    'store.user/index',
                    'store.user/add',
                    'store.user/edit',
					'store.user/delete',
                ],
            ],
            [
                'name' => '角色管理',
                'index' => 'store.role/index',
                'uris' => [
                    'store.role/index',
                    'store.role/add',
                    'store.role/edit',
					'store.role/delete',
                ],
            ],
        ],
    ],
	*/
    'goods' => [
        'name' => '商品管理',
        'icon' => 'icon-goods',
        'index' => 'goods/index',
        'submenu' => [
            [
                'name' => '商品列表',
                'index' => 'goods/index',
                'uris' => [
                    'goods/index',
                    'goods/add',
                    'goods/edit',
					'goods/delete',
                ],
            ],
            [
                'name' => '商品分类',
                'index' => 'goods.category/index',
                'uris' => [
                    'goods.category/index',
                    'goods.category/add',
                    'goods.category/edit',
					'goods.category/delete',
                ],
            ],
			[
                'name' => '商品评价',
                'index' => 'goods.comment/index',
            ],
        ],
    ],
    'order' => [
        'name' => '订单管理',
        'icon' => 'icon-order',
        'index' => 'order/all_list',
        'submenu' => [
            [
                'name' => '全部订单',
                'index' => 'order/all_list',
            ],
            [
                'name' => '待发货',
                'index' => 'order/delivery_list',
            ],
            [
                'name' => '待收货',
                'index' => 'order/receipt_list',
            ],
            [
                'name' => '待付款',
                'index' => 'order/pay_list',
            ],
            [
                'name' => '已完成',
                'index' => 'order/complete_list',

            ],
            [
                'name' => '已取消',
                'index' => 'order/cancel_list',
            ],
			[
                'name' => '售后管理',
                'index' => 'order.refund/index',
            ],
        ]
    ],
	'user' => [
        'name' => '用户管理',
        'icon' => 'icon-user',
        'index' => 'user/index',
        'submenu' => [
            [
                'name' => '用户列表',
                'index' => 'user/index',
            ],
			[
                'name' => '等级管理',
                'index' => 'user.grade/index',
				'uris' => [
					'user.grade/index',
					'user.grade/add',
					'user.grade/edit',
					'user.grade/delete',
				],
            ],
			[
                'name' => '余额记录',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '充值记录',
                        'index' => 'user.recharge/index',
						'uris' => [
							'user.recharge/index'
						],
                    ],
                    [
                        'name' => '余额明细',
                        'index' => '#'
                    ],
                ]
            ],
        ]
    ],
    'market' => [
        'name' => '营销管理',//first
        'icon' => 'icon-marketing',
        'index' => 'market.activity/index',
        'submenu' => [
			[
                'name' => '优惠活动',
                'index' => 'market.activity/index',
				'uris' => [
					'market.activity/index',
					'market.activity/add',
					'market.activity/edit',
					'market.activity/delete',
				],
            ],
			[
                'name' => '用户充值',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '充值套餐',
                        'index' => 'market.recharge.plan/index',
						'uris' => [
							'market.recharge.plan/index',
							'market.recharge.plan/add',
							'market.recharge.plan/edit',
							'market.recharge.plan/delete',
						],
                    ],
					[
                        'name' => '充值设置',
                        'index' => 'market.recharge/setting',
                    ],
                ]
            ],
			[
                'name' => '积分管理',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '积分设置',
                        'index' => 'market.score/setting',
                    ],
					[
                        'name' => '积分明细',
                        'index' => 'market.score/logs',
                    ],
                ]
            ],
			[
                'name' => '消息推送',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '发送消息',
                        'index' => 'market.push/send',
                    ],
					[
                        'name' => '活跃用户',
                        'index' => 'market.push/user',
                    ],
                ]
            ],
		],
    ],
    'wxapp' => [
        'name' => '小程序',
        'icon' => 'icon-wxapp',
        'color' => '#36b313',
        'index' => 'wxapp/setting',
        'submenu' => [
			[
                'name' => '设置',
                'index' => 'wxapp/setting',
				'urls' => [
					'wxapp/setting',
					'wxapp/setnickname',
					'wxapp/setdomain',
					'wxapp/servedomain',
					'wxapp/signature',
					'wxapp.register/setting',
				] 
            ],
			[
                'name' => '其它设置',
                'active' => true,
                'submenu' => [
					[
						'name' => '页面管理',
						'index' => 'wxapp.page/index',
							'urls' => [
								'wxapp.page/index',
								'wxapp.page/add',
								'wxapp.page/edit',
								'wxapp.page/delete'
							]
					],
					[
						'name' => '分类模板',
						'index' => 'wxapp.page/category',
							'urls' => [
								'wxapp.page/category',
							]
					],
					[
						'name' => '类目管理',
						'index' => 'wxapp.category/index',
						'uris' => [
							'wxapp.category/index',
							'wxapp.category/add',
							'wxapp.category/edit',
							'wxapp.category/delete',
						],
					],
					[
						'name' => '模板消息',
						'index' => 'wxapp.tplmsg/index',
						'uris' => [
							'wxapp.tplmsg/index',
							'wxapp.tplmsg/add',
							'wxapp.tplmsg/delete',
						],
					],
					[
						'name' => '发布小程序',
						'index' => 'wxapp.release/index',
							'urls' => [
								'wxapp.release/index',
								'wxapp.release/add',
								'wxapp.release/edit',
								'wxapp.release/delete'
							]
					],
                ]
            ],
            [
                'name' => '帮助中心',
                'index' => 'wxapp.help/index',
                'urls' => [
                    'wxapp.help/index',
                    'wxapp.help/add',
                    'wxapp.help/edit',
                    'wxapp.help/delete'
                ]
            ],

        ],
    ],
	/*
	'apps' => [
        'name' => '应用中心',
        'icon' => 'icon-application',
        'is_svg' => true,   // 多色图标
        'index' => 'setting/store',
        'submenu' => [
            [
                'name' => '分销中心',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '入住申请',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '分销商用户',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '分销订单',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '提现申请',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '分销设置',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '分销海报',
                        'index' => 'setting.cache/clear'
                    ],
                ]
            ],
			[
                'name' => '拼团管理',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '商品分类',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '商品列表',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '拼单管理',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '售后管理',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '商品评价',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '拼团设置',
                        'index' => 'setting.cache/clear'
                    ],
                ]
            ],
			[
                'name' => '砍价活动',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '活动列表',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '砍价记录',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '砍价设置',
                        'index' => 'setting.cache/clear'
                    ],
                ]
            ],
			[
                'name' => '整点秒杀',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '基础设置',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '活动会场',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '基础设置',
                        'index' => 'setting.cache/clear'
                    ],
                ]
            ],
			[
                'name' => '好物圈',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '商品收藏',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '订单信息',
                        'index' => 'setting.cache/clear'
                    ],
					[
                        'name' => '基础设置',
                        'index' => 'setting.cache/clear'
                    ],
                ]
            ],
        ],
    ],
	*/
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'setting/store',
        'submenu' => [
			[
                'name' => '基本设置',
                'active' => true,
                'submenu' => [
                    [
						'name' => '站点设置',
						'index' => 'setting/store',
					],
					[
						'name' => '交易设置',
						'index' => 'setting/trade',
					],
					[
						'name' => '运费设置',
						'index' => 'setting.delivery/index',
						'uris' => [
							'setting.delivery/index',
							'setting.delivery/add',
							'setting.delivery/edit',
							'setting.delivery/delete'
						],
					],
					[
						'name' => '物流公司',
						'index' => 'setting.express/index',
						'uris' => [
							'setting.express/index',
							'setting.express/add',
							'setting.express/edit',
							'setting.express/delete'
						],
					],
					[
						'name' => '短信通知',
						'index' => 'setting/sms'
					],
					[
						'name' => '模板消息',
						'index' => 'setting/tplmsg'
					],
					[
						'name' => '退货地址',
						'index' => 'setting/address',
					],
					[
						'name' => '上传设置',
						'index' => 'setting/storage',
					],
					
                ]
            ],
			[
                'name' => '帮助文档',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '页面链接',
                        'index' => 'setting.help/links',
                    ],
                    [
                        'name' => '模板消息',
                        'index' => 'setting.help/tplmsg'
                    ],
					[
                        'name' => '物流公司',
                        'index' => 'setting.help/company'
                    ],
                ]
            ],
            [
                'name' => '其他',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '清理缓存',
                        'index' => 'setting.cache/clear'
                    ],
                    [
                        'name' => '环境检测',
                        'index' => 'setting.science/index'
                    ],
                ]
            ]
        ],
    ],
];
