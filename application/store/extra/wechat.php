<?php

return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
	'material' => [
        'name' => '素材管理',//first
        'icon' => 'icon-image',
        'index' => 'material.text/index',
        'submenu' => [
			[
				'name' => '图文素材',
				'index' => 'material.text/index',
				'urls' => [
					'material.text/index',
					'material.text/add',
					'material.text/edit',
					'material.text/delete'
				]
			],
			[
				'name' => '图片素材',
				'index' => 'material.image/index',
				'urls' => [
					'material.image/index',
					'material.image/add',
					'material.image/edit',
					'material.image/delete'
				]
			],	
			[
				'name' => '语音素材',
				'index' => 'material.voice/index',
				'urls' => [
					'material.voice/index',
					'material.voice/add',
					'material.voice/edit',
					'material.voice/delete'
				]
			],
			[
				'name' => '视频素材',
				'index' => 'material.video/index',
				'urls' => [
					'material.video/index',
					'material.video/add',
					'material.video/edit',
					'material.video/delete'
				]
			],
		],
    ],
	'user' => [
        'name' => '粉丝管理',
        'icon' => 'icon-user',
        'index' => '#',
        'submenu' => [
            
        ]
    ],
	'a' => [
        'name' => '微信卡券',//first
        'icon' => 'icon-youhuiquan2',
        'index' => '#',
        'submenu' => [
			
		],
    ],
	'b' => [
        'name' => '微信门店',//first
        'icon' => 'icon-mendian',
        'index' => '#',
        'submenu' => [
			
		],
    ],
	'c' => [
        'name' => '客服中心',//first
        'icon' => 'icon-kefu',
        'index' => '#',
        'submenu' => [
			
		],
    ],
	'd' => [
        'name' => '数据统计',//first
        'icon' => 'icon-linechart',
        'index' => '#',
        'submenu' => [
			
		],
    ],
	'apps' => [
        'name' => '应用中心',
        'icon' => 'icon-application',
        'is_svg' => true,   // 多色图标
        'index' => '#',
        'submenu' => [
            
        ],
    ],
    'wechat' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'wechat/setting',
        'submenu' => [
			[
                'name' => '基础设置',
                'index' => 'wechat/setting',
				'urls' => [
					'wechat/setting',
				] 
            ],
			[
                'name' => '其它设置',
                'active' => true,
                'submenu' => [
					[
						'name' => '页面菜单',
						'index' => 'wechat.page/menu',
							'urls' => [
								'wechat.page/menu',
							]
					],
					[
						'name' => '模板消息',
						'index' => '#',
						'uris' => [
							'wechat.tplmsg/index',
							'wechat.tplmsg/add',
							'wechat.tplmsg/delete',
						],
					],
                ]
            ],
			[
                'name' => '自动回复',
                'active' => true,
                'submenu' => [
					[
						'name' => '被关注回复',
						'index' => 'wechat.subscribe/reply',
							'urls' => [
								'wechat.subscribe/reply',
							]
					],
					[
						'name' => '关键字回复',
						'index' => 'wechat.keyword/index',
						'uris' => [
							'wechat.keyword/index',
							'wechat.keyword/add',
							'wechat.keyword/edit',
							'wechat.keyword/delete',
						],
					],
					[
						'name' => '收到消息回复',
						'index' => '#',
						'uris' => [
							'wechat.tplmsg/index',
							'wechat.tplmsg/add',
							'wechat.tplmsg/delete',
						],
					],
                ]
            ],

        ],
    ],
    
];
