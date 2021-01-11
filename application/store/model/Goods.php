<?php
namespace app\store\model;
use app\common\model\Goods as GoodsModel;
use app\common\model\UploadFile as UploadFileModel;
use think\Db;
use think\Image;

/**
 * 商品模型
 */
class Goods extends GoodsModel
{
    /**
     * 添加商品
     */
    public function add(array $data)
    {
        if (!isset($data['images']) || empty($data['images'])) {
            $this->error = '请上传商品图片';
            return false;
        }
        $data['content'] = isset($data['content']) ? $data['content'] : '';
        $data['wxapp_id'] = $data['sku']['wxapp_id'] = self::$wxapp_id;
		
        // 开启事务
        Db::startTrans();
        try {
            // 添加商品
            $this->allowField(true)->save($data);
			//生成商品缩略图
			$this->thumbnail($data['images'][0],$this->goods_id);
            // 商品规格
            $this->addGoodsSpec($data);
            // 商品图片
            $this->addGoodsImages($data['images']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }

    /**
     * 添加商品图片
     */
    private function addGoodsImages($images)
    {
        $this->image()->delete();
        $data = array_map(function ($image_id) {
            return [
                'image_id' => $image_id,
                'wxapp_id' => self::$wxapp_id
            ];
        }, $images);
        return $this->image()->saveAll($data);
    }
	
	/**
     * 生成产品缩略图
     */
    public function thumbnail($image_id=0,$goods_id=0)
    {
		if($image_id==0 AND $goods_id==0){
			//批量生成 - 所有产品
			$list = $this->with(['image.file'])->select();
			for($n=0;$n<sizeof($list);$n++){
				$image = Image::open('./uploads/'.$list[$n]['image'][0]['file_name']);//读取原图
				$image->thumb(375,375)->save('./uploads/'.$list[$n]['goods_id'].'.jpg');
			}
			
		}else{
			$imgName = UploadFileModel::getFileName($image_id);//获取图片名称
			$image = Image::open('./uploads/'.$imgName);//读取原图
			$image->thumb(375,375)->save('./uploads/'.$goods_id.'.jpg');
		}
		return true;
    }

    /**
     * 编辑商品
     */
    public function edit($data)
    {
        if (!isset($data['images']) || empty($data['images'])) {
            $this->error = '请上传商品图片';
            return false;
        }
        $data['content'] = isset($data['content']) ? $data['content'] : '';
        $data['wxapp_id'] = $data['sku']['wxapp_id'] = self::$wxapp_id;
        // 开启事务
        Db::startTrans();
        try {
            // 保存商品
			$this->allowField(true)->save($data);
			//生成商品缩略图
			$this->thumbnail($data['images'][0],$this['goods_id']);
            // 商品规格
            $this->addGoodsSpec($data, true);
            // 商品图片
            $this->addGoodsImages($data['images']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * 添加商品规格
     */
    private function addGoodsSpec(&$data, $isUpdate = false)
    {
        // 更新模式: 先删除所有规格
        $model = new GoodsSpec;
        $isUpdate && $model->removeAll($this['goods_id']);
        // 添加规格数据
        if ($data['spec_type'] == '10') {
            // 单规格
            $this->spec()->save($data['sku']);
        } else if ($data['spec_type'] == '20') {
            // 添加商品与规格关系记录
            $model->addGoodsSpecRel($this['goods_id'], $data['spec_many']['spec_attr']);
            // 添加商品sku
            $model->addSkuList($this['goods_id'], $data['spec_many']['spec_list']);
        }
    }

    /**
     * 删除商品
     */
    public function remove()
    {
        // 开启事务处理
        Db::startTrans();
        try {
			//删除商品缩略图
			if(file_exists('./uploads/'.$this['goods_id'].'.jpg'))
			{
				unlink('./uploads/'.$this['goods_id'].'.jpg');
			}
            // 删除商品sku
            (new GoodsSpec)->removeAll($this['goods_id']);
            // 删除商品图片
            $this->image()->delete();
            // 删除当前商品
            $this->delete();
            // 事务提交
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }
	
	/**
     * 更新商品状态
     */
    public function state($state)
    {
        $state ? $data['goods_status']=10 : $data['goods_status']=20;
        return $this->allowField(true)->save($data);
    }

}
