<?php

namespace app\common\model;

/**
 * 订单收货地址模型
 */
class OrderAddress extends BaseModel
{
    protected $name = 'order_address';
    protected $updateTime = false;

    /**
     * 追加字段
     */
    protected $append = ['region'];

    /**
     * 地区名称
     */
    public function getRegionAttr($value, $data)
    {
        return [
            'province' => Region::getNameById($data['province_id']),
            'city' => Region::getNameById($data['city_id']),
            'region' => Region::getNameById($data['region_id']),
        ];
    }

}
