<?php

namespace app\store\model;

use app\common\model\User as UserModel;
use app\store\model\UserMsg as UserMsgModel;

/**
 * 用户模型
 */
class User extends UserModel
{
	/**
     * 用户充值
	 *$recharge 接收表单数据（数组）
	 *$source 0为充值余额，1为充值积分
    */
    public function recharge($user_id,$recharge,$source)
    {
		$user = self::get($user_id);
        if($source){
			//积分操作
			if($recharge["points"]["value"] <= 0){
				$this->error = '变更数量要大于0';
				return false;
			}
			if(strpos($recharge["points"]["value"],".")){
				$this->error = '变更数量必须为整数';
				return false;
			}
			$msg['num'] = $recharge["points"]["value"];	//操作数值
			$msg['category'] = 1;	//积分变更
			if($recharge["points"]["mode"] == "inc"){
				$user->score = ['inc',$recharge["points"]["value"]];//增加积分
				$msg['operate'] = 1; 	//增加
			}
			if($recharge["points"]["mode"] == "dec"){
				$user->score = ['dec',$recharge["points"]["value"]];//扣减积分
				$msg['operate'] = 2;	//扣减
			}
			if($recharge["points"]["mode"] == "final"){
				$user->score = $recharge["points"]["value"];//重置积分
				$msg['operate'] = 3;	//重置
			}
			$msg['remark'] = $recharge["points"]["remark"];	//理由备注			
		}else{
			//充值余额
			if($recharge["balance"]["money"] <= 0){
				$this->error = '变更金额要大于0';
				return false;
			}
			$msg['num'] = $recharge["balance"]["money"]; //操作数值
			$msg['category'] = 2;	//钱包变更
			if($recharge["balance"]["mode"] == "inc"){
				$user->wallet = ['inc',$recharge["balance"]["money"]];//增加积分
				$msg['operate'] = 1;	//增加
			}
			if($recharge["balance"]["mode"] == "dec"){
				$user->wallet = ['dec',$recharge["balance"]["money"]];//扣减积分
				$msg['operate'] = 2;	//扣减
			}
			if($recharge["balance"]["mode"] == "final"){
				$user->wallet = $recharge["balance"]["money"];//重置积分
				$msg['operate'] = 3;	//重置
			}
			$msg['remark'] = $recharge["balance"]["remark"];	//理由备注
		}
		$msg['user_id'] = $user_id;
		$msg['reason'] = 1; 	//管理员操作
		
		$model = new UserMsgModel;
		$model->add($msg);	//添加系统消息
		return $user->save();
		
    }

}
