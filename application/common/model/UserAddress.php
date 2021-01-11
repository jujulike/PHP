<?php
namespace app\common\model;

/**
 * 用户收货地址模型
 */
class UserAddress extends BaseModel
{
    protected $name = 'user_address';

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
