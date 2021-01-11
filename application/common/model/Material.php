<?php
namespace app\common\model;
use think\Request;

/**
 * 公众号素材库模型
 */
class Material extends BaseModel
{
    protected $name = 'material';
    protected $append = ['file_path'];
	
	/**
     * 关联图文素材集
     */
	public function text()
    {
        return $this->hasMany('MaterialText','text_no','text_no');
    }
	
	/**
     * 文件类型
     */
    public function getFileTypeAttr($value)
    {
        $status = [10 => '图片', 20 => '音频', 30 => '视频', 40 => '图文'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
    /**
     * 获取图片完整路径
    */ 
    public function getFilePathAttr($value)
    {
        return self::$base_url . 'uploads/' . $data['file_name'];
    }

    /**
     * 根据图片名称获取详情
    */
    public function getImage($file_name)
    {
        return $this->where(['file_type' => 10, 'file_name' => $file_name])->find();
    }
	
	/**
     * 根据media_id获取详情
    */
    public static function mediaId($media_id)
    {
        return self::where(['media_id' => $media_id])->with(['text'])->find();
    }
	
    /**
     * 获取列表记录
     */
    public function getList($file_type = 0)
    {
		 // 筛选条件
        $filter = [];
        $file_type > 0 && $filter['file_type'] = $file_type;
		$filter['wxapp_id'] = self::$wxapp_id;
        $list = $this->where($filter)
				->order(['material_id' => 'desc'])
				->paginate(15, false, ['query' => Request::instance()->request()]);
		return $list;
    }
	
	
	/**
     * 新增图文素材默认数据
     */
    public function getDefault()
    {
        $data = [
			0 => [
				'name' => '',//素材集名称
				'title' => '封面标题',
				'author' => '',
				'content' => '',
				'url' => '/assets/store/img/diy/banner_01.jpg',
				'file_name' => '',
				'digest' => ''
			]
        ];
		return json_encode($data);
    }
	

}
