<?php
namespace app\common\model;

/**
 * 快速注册小程序模型
 */
class Authentication extends BaseModel
{
    protected $name = 'authentication';
	
	/**
     * 图片 - 营业执照 
     */
    public function businesslicense()
    {
        return $this->hasOne('uploadFile', 'file_id', 'business_license');
    }
	
	/**
     * 图片 - 身份证正面
     */
    public function front()
    {
        return $this->hasOne('uploadFile', 'file_id', 'id_front');
    }
	
	/**
     * 图片 - 身份证反面
     */
    public function behind()
    {
        return $this->hasOne('uploadFile', 'file_id', 'id_behind');
    }
	
	/**
     * 代码类型
     */
    public function getCodeTypeAttr($value)
    {
        $status = [1 => '统一社会信用代码', 2 => '组织机构代码', 3 => '营业执照注册号'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 代码类型
     */
    public function getStatusAttr($value)
    {
        $status = [10 => '待审核', 20 => '验证中', 30 => '已审核', 40 => '被驳回'];
        return ['text' => $status[$value], 'value' => $value];
    }

    /**
     * 获取详情
     */
    public static function detail()
    {
		if(!$detail = self::get([],['businesslicense','front','behind'])){
			$detail = [
				'legal_name' => '',	//企业名
				'code' => '',	//企业代码
				'code_type' => [
					'value' => 1,//企业代码类型,1：统一社会信用代码
				],	
				'legal_persona_wechat' => '',	//法人微信
				'legal_persona_name' => '',	//法人姓名
				'legal_persona_phone' => '',	//法人电话
				'businesslicense' => [
					'file_path' => '',//营业执照
					'file_id' => 0
				],	
				'front' => [
					'file_path' => '',//身份证，正面
					'file_id' => 0
				],	
				'behind' => [
					'file_path' => '',//身份证，反面
					'file_id' => 0
				],	
				'status' => [
					'value' => 0,//状态,为零则新增
				],	
				'reject' => '',	//驳回原因
			];
		}
        return $detail;
    }

}
