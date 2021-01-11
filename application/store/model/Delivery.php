<?php

namespace app\store\model;

use app\common\model\Delivery as DeliveryModel;

/**
 * 配送模板模型
 */
class Delivery extends DeliveryModel
{
    /**
     * 添加新记录
     */
    public function add($data)
    {
        if (!isset($data['rule']) || empty($data['rule'])) {
            $this->error = '请选择可配送区域';
            return false;
        }
        $data['wxapp_id'] = self::$wxapp_id;
        if ($this->allowField(true)->save($data)) {
            return $this->createDeliveryRule($data['rule']);
        }
        return false;
    }

    /**
     * 编辑记录
     */
    public function edit($data) {
        if (!isset($data['rule']) || empty($data['rule'])) {
            $this->error = '请选择可配送区域';
            return false;
        }
        if ($this->allowField(true)->save($data)) {
            return $this->createDeliveryRule($data['rule']);
        }
        return false;
    }

    /**
     * 添加模板区域及运费
     */
    private function createDeliveryRule($data)
    {
        $save = [];
        for ($i = 0; $i < sizeof($data['region']); $i++) {
            $save[$i] = [
                'region' => $data['region'][$i],
                'first' => $data['first'][$i],
                'first_fee' => $data['first_fee'][$i],
                'additional' => $data['additional'][$i],
                'additional_fee' => $data['additional_fee'][$i],
                'wxapp_id' => self::$wxapp_id
            ];
        }
        $this->rule()->delete();
        return $this->rule()->saveAll($save);
    }

    /**
     * 删除记录
     */
    public function remove()
    {
        // 判断是否存在商品
        if ($goodsCount = (new Goods)->where(['delivery_id' => $this['delivery_id']])->count()) {
            $this->error = '该模板被' . $goodsCount . '个商品使用，不允许删除';
            return false;
        }
        $this->rule()->delete();
        return $this->delete();
    }

}
