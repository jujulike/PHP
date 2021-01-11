<?php
namespace app\common\model;
use think\Request;
/**
 * 用户等级
 */
class UserGrade extends BaseModel
{
    protected $name = 'user_grade';

    /**
     * 获取用户等级列表
     */
    public function getList()
    {
        // 执行查询
        $list = $this->order(['sort' => 'asc'])
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }

    /**
     * 等级详情
     */
    public static function detail($user_grade_id)
    {
        return self::get($user_grade_id);
    }

    /**
     * 新增默认用户等级
     */
    public function insertDefault($wxapp_id)
    {
		$list = [
			['name'=>'限制用户','score'=>-1,'discount'=>100,'wxapp_id'=> $wxapp_id],
			['name'=>'普通会员','score'=>0,'discount'=>100,'wxapp_id'=> $wxapp_id],
			['name'=>'高级会员','score'=>500,'discount'=>95,'wxapp_id'=> $wxapp_id],
			['name'=>'银卡会员','score'=>2000,'discount'=>90,'wxapp_id'=> $wxapp_id],
			['name'=>'金卡会员','score'=>5000,'discount'=>85,'wxapp_id'=> $wxapp_id],
			['name'=>'白金会员','score'=>10000,'discount'=>80,'wxapp_id'=> $wxapp_id],
			['name'=>'钻石会员','score'=>20000,'discount'=>70,'wxapp_id'=> $wxapp_id]
		];
        return $this->saveAll($list);
    }

}
