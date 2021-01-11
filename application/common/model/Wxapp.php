<?php

namespace app\common\model;

use app\common\exception\BaseException;
use app\common\model\Template;
use think\Request;
use think\Cache;
use think\Db;

/**
 * 微信小程序模型
 */
class Wxapp extends BaseModel
{
    protected $name = 'wxapp';
	
	/**
     * 类型
     */
    public function getAppTypeAttr($value)
    {
        $status = [1 => '公众号',10 => '点餐', 20 => '商城'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 状态
     */
    public function getIsEmpowerAttr($value)
    {
        $status = [0 => '未授权', 1 => '已授权'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 设置小程序模板信息
     */
    public function getTemplateAttr($value)
    {
		if($value==0){
			return ['template_id' => $value];
		}
		return Template::detail($value);
         
    }
	
	/**
     * 小程序服务类目
     */
    public function getCategoryAttr($value)
    {	
		if($category = getCategory()){
			if($category['errcode']==0){
				$str = '';
				for($n=0;$n<sizeof($category['categories']);$n++){
					$str = $str.$category['categories'][$n]['first_name'].' > '.$category['categories'][$n]['second_name'];
					if($n<sizeof($category['categories'])){
						$str = $str.'&#10';
					}
				}
				$category['text'] = $str;
				return $category;
			}
		}
		$category = [
			"categories" => [],
			"limit" => 0,
			"quota" => 0,
			"category_limit" => 5,
			"text" => '您的应用不是通过本平台注册，类目设置管理不可用。请返回官方后台进行配置。'
		];
		return $category;
         
    }
	
	/**
     * 获取列表 - 用户 
     */
    public function getList($store_user_id)
    {
        // 执行查询
        $list = $this->useGlobalScope(false)
            ->where('store_user_id',$store_user_id)
            ->order('wxapp_id','desc')
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
	
    /**
     * 获取小程序信息 - 用户
     */
    public static function detail()
    {
        return self::get([]);
    }
	
	/**
     * 获取小程序信息
     */
    public static function getWxapp($whrer)
    {
        return self::useGlobalScope(false)->where($whrer)->find();
    }
    /**
     * 从缓存中获取小程序信息
     */
    public static function getWxappCache($wxapp_id = null)
    {
        if (is_null($wxapp_id)) {
            $self = new static();
            $wxapp_id = $self::$wxapp_id;
        }
        if (!$data = Cache::get('wxapp_' . $wxapp_id)) {
            $data = self::get($wxapp_id);
            if (empty($data)) throw new BaseException(['msg' => '未找到当前小程序信息']);
			if ($data['expire_time']!= 0) {
				if($data['expire_time']<time()){
					throw new BaseException(['msg' => '当前小程序已过期，部分功能会受到影响，请尽快续费！']);
				}
			}
            Cache::set('wxapp_' . $wxapp_id, $data);
        }
        return $data;
    }

    /**
     * 创建小程序
     */
    public function add($data)
    {
        Db::startTrans();
		$wxapp['phone'] = $data['phone'];
		$wxapp['user_id'] = $data['user_id'];
        // 添加小程序记录
        $this->save($wxapp);
		$wxapp_id = $this->wxapp_id;
		
        // 新增商家用户信息
        $StoreUser = new StoreUser;
        $StoreUser->insertDefault($wxapp_id, $data['phone']);
		
		// 新增默认用户等级
        $grade = new UserGrade;
        $grade->insertDefault($wxapp_id);

        Db::commit();

        return true;
    }

}
