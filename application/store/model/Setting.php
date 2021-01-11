<?php
namespace app\store\model;
use app\common\model\Setting as SettingModel;
use app\store\model\Material as MaterialModel;
use think\Cache;

/**
 * 系统设置模型
 */
class Setting extends SettingModel
{
    /**
     * 设置项描述
     */
    private $describe = [
        'sms' => '短信通知',
		'tplmsg' => '模板消息',
        'storage' => '上传设置',
        'store' => '站点设置',
        'trade' => '交易设置',
		'printer' => '打印设置',
		'call' => '呼叫服务',
		'recharge' => '充值设置',
		'score' => '积分设置',
		'coupon' => '优惠券设置',
		'address' => '退货地址',
		'subscribe' => '被关注回复',	//公众号
    ];

    /**
     * 更新系统设置
     */
    public function edit($key, $values)
    {
		if($key=='subscribe' AND $values['type']=='image'){
			if(!$values = $this->upMaterial($values)){
				$this->error = '上传到微信端错误';
				return false;
			}
		}
		if($key=='subscribe' AND $values['type']=='news'){
			if(!$values = $this->getMaterial($values)){
				$this->error = '图文记录集获取错误';
				return false;
			}
		}
        $model = self::detail($key) ?: $this;
        // 删除系统设置缓存
        Cache::rm('setting_' . self::$wxapp_id);
        return $model->save([
            'key' => $key,
            'describe' => $this->describe[$key],
            'values' => $values,
            'wxapp_id' => self::$wxapp_id,
        ]) !== false;
    }
	
	/**
     * 图片上传到素材库
     */
    private function getMaterial($values)
    {
		//获取图文记录集
		$res = Material::mediaId($values['dataGroup']['news']['media_id']);
		//重组news数据
		$news = [
			'media_id' => $values['dataGroup']['news']['media_id'],
			'item' => []
		];
		for($n=0;$n<sizeof($res['text']);$n++){
			$news['item'][$n]['title'] = $res['text'][$n]['title'];
			$news['item'][$n]['description'] = $res['text'][$n]['digest'];
			$news['item'][$n]['picurl'] = $res['text'][$n]['url'];
			$news['item'][$n]['url'] = $res['text'][$n]['content_source_url'];
		}
		$values['dataGroup']['news']=$news;
		return $values;
    }
	
	/**
     * 图片上传到素材库
     */
    private function upMaterial($values)
    {
		//验证封面图片是否已经上传到微信端
		$model = new MaterialModel;
		$res = $model->getImage($values['dataGroup']['image']['file_name']);
		if($res){
			//上传过，获取信息
			$values['dataGroup']['image']['url']= $res['url'];
			$values['dataGroup']['image']['media_id']= $res['media_id'];
		}else{
			//没上传-执行上传
			$result = $model->upWechat($values['dataGroup']['image']['file_name']);
			if(!isset($result['media_id'])){
				$this->error = '上传到微信端错误';
				return false;
			}
			$values['dataGroup']['image']['media_id'] = $result['media_id'];
			$values['dataGroup']['image']['url'] = $result['url'];
			$material = [
				'name' => '被关注回复',
				'file_name' => $values['dataGroup']['image']['file_name'],
				'media_id' => $result['media_id'],
				'url' => $result['url'],
				'wxapp_id' => self::$wxapp_id
			];
		}
		if(!$model->save($material)){
			$this->error = '添加到素材表错误';
			return false;
		}
		return $values;
    }
}
