<?php
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
	'role' => [
        'name' => '管理员',
        'icon' => 'icon-guanliyuan',
        'index' => 'role.user/index',
        'submenu' => [
            [
                'name' => '管理员列表',
                'index' => 'role.user/index',
                'uris' => [
                    'role.user/index',
                    'role.user/add',
                    'role.user/edit',
					'role.user/delete',
                ],
            ],
            [
                'name' => '角色管理',
                'index' => 'role.category/index',
                'uris' => [
                    'role.category/index',
                    'role.category/add',
                    'role.category/edit',
					'role.category/delete',
                ],
            ],
        ],
    ],
    'wxapp' => [
        'name' => 'App管理',
        'icon' => 'icon-wxapp',
        'color' => '#36b313',
        'index' => 'wxapp/index',
        'submenu' => [
            [
                'name' => '小程序列表',
                'index' => 'wxapp/index',
                'uris' => [
                    'wxapp/index',
                    'wxapp/appLogin',
					'wxapp/delete'
                ],
            ],
			[
                'name' => '小程序申请',
                'index' => 'wxapp.apply/index',
				'uris' => [
                    'wxapp.apply/index',
                    'wxapp.apply/detail'
                ],
            ],
			[
                'name' => '类目管理',
                'index' => 'wxapp.category/index',
                'uris' => [
                    'wxapp.category/index',
                    'wxapp.category/add',
                    'wxapp.category/edit',
					'wxapp.category/delete'
                ],
            ],
			[
                'name' => '模板管理',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '模板草稿',
                        'index' => 'wxapp.template/draft',
						'uris' => [
							'wxapp.template/draft',
							'wxapp.template/addTemplate'
						],
                    ],
                    [
                        'name' => '模板库',
                        'index' => 'wxapp.template/template',
						'uris' => [
							'wxapp.template/template',
							'wxapp.template/deleteTemplate'
						],
                    ],
					[
                        'name' => '发布模板',
                        'index' => 'wxapp.template/index',
						'uris' => [
							'wxapp.template/index',
							'wxapp.template/add',
							'wxapp.template/edit',
							'wxapp.template/delete'
						],
                    ],
                ]
            ],
        ],
    ],
	 'agent' => [
        'name' => '代理管理',
        'icon' => 'icon-menu',
        'index' => '#',
        'submenu' => [],
    ],
    'order' => [
        'name' => '订单管理',
        'icon' => 'icon-order',
        'index' => '#',
        'submenu' => []
    ],
	'payment' => [
        'name' => '账务管理',
        'icon' => 'icon-marketing',
        'index' => '#',
        'submenu' => [],
    ],
	
	'user' => [
        'name' => '用户管理',
        'icon' => 'icon-user',
        'index' => 'user/index',
        'submenu' => [
            [
                'name' => '用户列表',
                'index' => 'user/index',
				'uris' => [
                    'payment/index',
                    'payment/edit'
                ],
            ],
        ],
    ],
   
	'equipment' => [
        'name' => '打印设备',
        'icon' => 'icon-x',
        'index' => 'equipment/index',
		'submenu' => [
            [
                'name' => '设备授权',
                'index' => 'equipment/index',
				'urls' => [
                    'equipment/index',
                    'equipment/add',
                    'equipment/edit',
                    'equipment/delete'
                ]
            ],
			[
                'name' => '云端配置',
                'index' => 'equipment/setting',
				'urls' => [
                    'equipment/setting',
                ]
            ],
           
		]
    ],	
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'setting/index',
        'submenu' => [
			[
                'name' => '站点设置',
                'index' => 'setting/index',
            ],
            [
                'name' => '角色类目',
                'active' => false,
                'submenu' => [
                    [
                        'name' => '超级管理端',
                        'index' => 'setting.rules.admin/index',
						'urls' => [
							'setting.rules.admin/index',
							'setting.rules.admin/add',
							'setting.rules.admin/edit',
							'setting.rules.admin/delete'
						]
                    ]
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
                    ]
                ]
            ],
        ],
    ],
];
