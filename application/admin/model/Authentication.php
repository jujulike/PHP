<?php
namespace app\admin\model;
use app\admin\model\Config as ConfigModel;
use think\Model;
use think\Request;
use think\Db;
/**
 * 商户申请认证模型
 */
class Authentication extends Model
{
	/**
     * 关联营业执照图片
     */
    public function businesslicense()
    {
        return $this->hasOne('uploadFile', 'file_id', 'business_license');
    }
	
	/**
     * 关联身份证正面图片
     */
    public function front()
    {
        return $this->hasOne('uploadFile', 'file_id', 'id_front');
    }
	
	/**
     * 关联身份证反面图片
     */
    public function behind()
    {
        return $this->hasOne('uploadFile', 'file_id', 'id_behind');
    }
	
	/**
     * 商品状态
     */
    public function getStatusAttr($value)
    {
        $status = [10 => '待审核', 20 => '验证中', 30 => '已审核', 40 => '被驳回'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
    /**
     * 获取申请认证列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->order('authentication_id','desc')->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
	
	/**
     * 获取详情
     */
    public static function detail($authentication_id)
    {
        return self::get($authentication_id, ['businesslicense', 'front', 'behind']);
    }
	
	/**
     * 编辑
     */
    public function edit($status, $data)
    {
        // 开启事务
        Db::startTrans();
        try {
			//提交到微信审核
			if($status==20){
				$result = $this->action($data);
				if($result['errcode']!=0){
					$this->error = '错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg'];
					return false;
				}
				$data['status'] = $status;
			}
			//信息驳回
			if($status==40){
				
				$data['status'] = $status;
			}
            // 保存商品
            $this->allowField(true)->save($data);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            $this->error = $e->getMessage();
            return false;
        }
    }
	
	/**
     * 提交申请
     */
    private function action($legal)
    {
		$config = ConfigModel::detail();	//获取第三方配置
		$url = 'https://api.weixin.qq.com/cgi-bin/component/fastregisterweapp?action=create&component_access_token='.$config['component_access_token'];
		$data ='{"name": "'.$legal['legal_name'].'","code": "'.$legal['code'].'","code_type":'.$legal['code_type'].',"legal_persona_wechat": "'.$legal['legal_persona_wechat'].'","legal_persona_name": "'.$legal['legal_persona_name'].'","component_phone": "'.$config['component_phone'].'"}';
		$result = json_decode(http_request($url,$data),true);
		return $result;
    }
	
	
	
	
}
