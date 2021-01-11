<?php

namespace app\api\model;

use app\common\model\Goods as GoodsModel;

/**
 * 商品模型
 */
class Goods extends GoodsModel
{
    /**
     * 隐藏字段
     */
    protected $hidden = [
		'spec_rel',
        'sales_initial',
        'sales_actual',
        'is_delete',
        'wxapp_id',
        'create_time',
        'update_time'
    ];
	
	//按照分类获取上架的所有商品
	public function getGoodsList($list)
	{
		$goodslist=array();
		for($i=0;$i<sizeof($list);$i++){
			$goods = $this->with(['image.file', 'spec', 'spec_rel.spec'])
						->where('goods_status', '=', 10)
						->where('is_delete', '=', 0)
						->where('category_id', '=', $list[$i]['category_id'])
						->order(['goods_sort', 'goods_id' => 'desc'])
						->select();
			// 规格信息
			for($n=0;$n<sizeof($goods);$n++){
				if($goods[$n]['spec_type'] == 20){
					$goods[$n]['specData'] = $this->getManySpecData($goods[$n]['spec_rel'], $goods[$n]['spec']);
				}				
			}
			$goodslist[$list[$i]['category_id']] = $goods;
		}
		return $goodslist;
	}

    /**
     * 商品详情：HTML实体转换回普通字符
     */
    public function getContentAttr($value)
    {
       return htmlspecialchars_decode($value);
    }

    /**
     * 根据商品id集获取商品列表 (购物车列表用)
     */
    public function getListByIds($goodsIds) {
        return $this->with(['category', 'image.file', 'spec', 'spec_rel.spec', 'delivery.rule'])
            ->where('goods_id', 'in', $goodsIds)->select();
    }
	
	/**
     * 更新商品库存销量
     */
    public function updateStockSales($goodsList)
    {
        // 整理批量更新商品销量
        $goodsSave = [];
        // 批量更新商品规格：sku销量、库存
        $goodsSpecSave = [];
        foreach ($goodsList as $goods) {
            $goodsSave[] = [
                'goods_id' => $goods['goods_id'],
                'sales_actual' => ['inc', $goods['total_num']]
            ];
            $specData = [
                'goods_spec_id' => $goods['goods_spec_id'],
                'goods_sales' => ['inc', $goods['total_num']]
            ];
            // 付款减库存
            if ($goods['deduct_stock_type'] == 20) {
                $specData['stock_num'] = ['dec', $goods['total_num']];
            }
            $goodsSpecSave[] = $specData;
        }
        // 更新商品总销量
        $this->allowField(true)->isUpdate()->saveAll($goodsSave);
        // 更新商品规格库存
        (new GoodsSpec)->isUpdate()->saveAll($goodsSpecSave);
    }

}
