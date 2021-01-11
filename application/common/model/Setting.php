<?php

namespace app\common\model;

use think\Cache;

/**
 * 系统设置模型
 */
class Setting extends BaseModel
{
    protected $name = 'setting';
    protected $createTime = false;

    /**
     * 获取器: 转义数组格式
     */
    public function getValuesAttr($value)
    {
        return json_decode($value, true);
    }

    /**
     * 修改器: 转义成json格式
     */
    public function setValuesAttr($value)
    {
        return json_encode($value);
    }

    /**
     * 获取指定项设置
     */
    public static function getItem($key, $wxapp_id = null)
    {
        $data = self::getAll($wxapp_id);
        return isset($data[$key]) ? $data[$key]['values'] : [];
    }

    /**
     * 获取设置项信息
     */
    public static function detail($key)
    {
        return self::get(compact('key'));
    }

    /**
     * 全局缓存: 系统设置
     */
    public static function getAll($wxapp_id = null)
    {
        $self = new static;
        is_null($wxapp_id) && $wxapp_id = $self::$wxapp_id;
        if (!$data = Cache::get('setting_' . $wxapp_id)) {
            $data = array_column(collection($self::all())->toArray(), null, 'key');
            Cache::set('setting_' . $wxapp_id, $data);
        }
        return array_merge_multiple($self->defaultData(), $data);
    }

    /**
     * 默认配置
     */
    public function defaultData()
    {
        return [
            'store' => [
                'key' => 'store',
                'describe' => '站点设置',
                'values' => [
					'name' => '河马科技',
					'delivery_type' => [
						0 => 10	//默认快递配送
					],
					'kuaidi100' => [
						'customer' => '',	//账号
						'key' => ''			//密钥
					]
				],
            ],
            'trade' => [
                'key' => 'trade',
                'describe' => '交易设置',
                'values' => [
                    'order' => [
                        'close_days' => '3',
                        'receive_days' => '10',
                        'refund_days' => '7'
                    ],
                    'freight_rule' => '30',
                ]
            ],
            'storage' => [
                'key' => 'storage',
                'describe' => '上传设置',
                'values' => [
                    'default' => 'local',
                    'engine' => [
                        'qiniu' => [
                            'bucket' => '',
                            'access_key' => '',
                            'secret_key' => '',
                            'domain' => 'http://'
                        ],
                    ]
                ],
            ],
            'sms' => [
                'key' => 'sms',
                'describe' => '短信通知',
                'values' => [
                    'default' => 'aliyun',
                    'engine' => [
                        'aliyun' => [
                            'AccessKeyId' => '',
                            'AccessKeySecret' => '',
                            'sign' => '河马科技',
                            'order_pay' => [
                                'is_enable' => '0',
                                'template_code' => '',
                                'accept_phone' => '',
                            ],
                        ],
                    ],
                ],
            ],
			'tplmsg' => [
                'key' => 'tplmsg',
                'describe' => '模板消息',
                'values' => [
                    'payment' => [	//支付成功通知
                        'is_enable' => 0,
                        'template_id' => ''
                    ],
					'delivery' => [	//订单发货通知
                        'is_enable' => 0,
                        'template_id' => ''
                    ],
					'refund' => [	//售后状态通知
                        'is_enable' => 0,
                        'template_id' => ''
                    ],
                ],
            ],
			'address' => [
                'key' => 'address',
                'describe' => '退货地址',
                'values' => [
                    'name' => '',
					'phone' => '',
					'detail' => '',
                ],
            ],
			'printer' => [
                'key' => 'printer',
                'describe' => '打印设置',
                'values' => [
					'title' => '扫码点餐',	//票据抬头
                    'is_open' => 0,	//是否开启
					'p_model' => 0,	//0吧台，1后厨，2两者
					'p_n' => 1,	//打印份数
					'pay_p' => 1,	//支付后打印
                ],
            ],
			'call' => [
                'key' => 'call',
                'describe' => '呼叫服务',
                'values' => [
					'reminder' => [
						'title' => '催单上菜',	//票据抬头
						'is_open' => 0,		//是否开启
					],
					'tea' => [
						'title' => '上茶水',	//票据抬头
						'is_open' => 0,		//是否开启
					],
					'water' => [
						'title' => '叫服务员',	//票据抬头
						'is_open' => 0,		//是否开启
					],
					'pack' => [
						'title' => '帮打包',	//票据抬头
						'is_open' => 0,		//是否开启
					],
					
                ],
            ],
			'recharge' => [
                'key' => 'recharge',
                'describe' => '充值设置',
                'values' => [
                    'is_open' => 0,		//是否开启
					'is_custom' => 1,	//是否允许用户自定义金额
					'is_match_plan' => 1,	//是否自动匹配套餐
					'describe' => '1. 账户充值仅限微信在线方式支付，充值金额实时到账；
2. 账户充值套餐赠送的金额即时到账；
3. 账户余额有效期：自充值日起至用完即止；
4. 若有其它疑问，可拨打客服电话400-000-1234',	//充值说明
                ],
            ],
			'score' => [
                'key' => 'score',
                'describe' => '积分设置',
                'values' => [
                    'name' => '积分',		//名称
					'describe' => 'a) 积分不可兑现、不可转让,仅可在本平台使用;
b) 您在本平台参加特定活动也可使用积分,详细使用规则以具体活动时的规则为准;
c) 积分的数值精确到个位(小数点后全部舍弃,不进行四舍五入)
d) 买家在完成该笔交易(订单状态为“已签收”)后才能得到此笔交易的相应积分,如购买商品参加店铺其他优惠,则优惠的金额部分不享受积分获取;',	//积分说明
					'is_open' => 0,	//是否开启积分赠送
					'gift_multiple' => 1,	//赠送倍数
					'discount' => 0,		//开启积分抵扣
					'discount_ratio' => 0.01,	//抵扣比例
					'order_price' => 100,		//抵扣条件 - 订单满多少
					'discount_money' => 10,	//最高可抵扣金额-单位%
                ],
            ],
			'coupon' => [
                'key' => 'coupon',
                'describe' => '优惠券设置',
                'values' => [
                    'is_open' => 0,		//是否开启
					'is_match' => 1,	//是否自动匹配
                ],
            ],
			'subscribe' => [
                'key' => 'subscribe',
                'describe' => '被关注回复',
                'values' => [
                    'is_open' => 0,		//是否开启 0=关闭，1=开启
					'type' => 'text',	//消息类型 text=文字消息,image=图片消息,news=图文消息,voice=声音消息
					'dataGroup' => [
						'text' => [
							'content' => ''
						],
						'image' => [
							'url' => '/assets/store/img/diy/banner_01.jpg',
							'file_name' => '',
							'media_id' => ''
						],
						'voice' => [
							'media_id' => ''
						],
						'video' => [
							'title' => '',
							'description' => '',
							'media_id' => ''
						],
						'music' => [
							'title' => '',
							'description' => '',
							'url' => '',	//音乐路径
							'hurl' => '',	//高质量音乐路径
							'media_id' => ''	//必须是缩略图的media_id
						],
						'news' => [
							'media_id' => '',
							'item' => [
								/*0 => [
									'title' => '',//标题
									'description' => '',//描述
									'picurl' => '',//图片链接，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200
									'url' => ''//点击图文消息跳转链接
								]*/
							]
							//最多8条
						]
					]
					
                ],
            ],	
        ];
    }

}
