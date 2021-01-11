<?php

namespace app\common\model;
use app\common\library\mstching\PrintHelper;
use think\Request;
/**
 * 云打印机管理
 */
class Printer extends BaseModel
{
    protected $name = 'printer';
	
	/**
     * 设备位置
     */
    public function getPlaceAttr($value)
    {
        $status = [0 => '吧台', 20 => '后厨'];
        return ['text' => $status[$value], 'value' => $value];
    }
	
	/**
     * 设备状态 - 自动完成
	 * 返回数据格式："}{"State":0,"Code":200,"Message":"成功"}
	 *State:状态值(-1错误 0正常 1缺纸 2温度保护报警 3 忙碌 4 离线)
     */
    public function getUuidAttr($value)
    {
		$helper = new PrintHelper();
		$Message = $helper->getDeviceState($value);//查询设备状态
        return ['text' => $Message, 'value' => $value];
    }

    /**
     * 获取打印机列表
     */
    public function getList()
    {
        return $this->order('printer_id','desc')->select();
    }
	
    /**
     * 获取打印机详情
     */
    public static function detail($where)
    {
        return self::useGlobalScope(false)->get($where);
    }
	/**
	 * 打印小票
	 * $data 打印的数据
	 * $p_model 打印模式 0吧台打印，1后厨打印，2两者都打印
	 * $p_n 打印数量
	 * $lx 打印类型 0 订单，1呼叫服务
	 */
	public function gotoPrint($data, $p_model, $p_n, $lx=0)
	{
		$printer = $this->getList();
		if(!empty($printer)){
			//计算在线设备数量
			$reception = array();//吧台打印机
			$kitchen = array();//后厨打印机
			$line_count = 0;//在线设备数量
			for($i=0;$i<sizeof($printer);$i++){
				if($printer[$i]['uuid']['text']=='正常'){
					if($printer[$i]['place']==0){
						array_push($reception,$printer[$i]);
					}else{
						array_push($kitchen,$printer[$i]);
					}
					$line_count = $line_count + 1;
				}
			}
			//没有设备在线
			if(!$line_count){
				$printer->error = '无在线打印设备';
				return false;
			}
			
			$helper = new PrintHelper();
			if($lx==1){
				//打印呼叫服务（只启用吧台设备）
				if(empty($reception)){
					$printer->error = '吧台打印设备异常';
					return false;
				}
				$content = $helper->make_serve_templet($data);
				//执行打印(呼叫服务只打印一次)
				for($n=0;$n<sizeof($reception);$n++){
					if($task_id = $helper->printContent($reception[$n]['uuid']['value'],$content,$reception[$n]['open_user_id'])){
						//$task_id  打印成功返回 ，打印任务编号
					}
				}
				return true;
			}else{
				//打印订单
				$content = $helper->make_order_templet($data);//生成要打印的模板
				//吧台打印
				if(!empty($reception) AND ($p_model == 0 OR $p_model == 2)){
					for($n=0;$n<sizeof($reception);$n++){
						//打印份数
						for($m=0;$m<$p_n;$m++){
							if($task_id = $helper->printContent($reception[$n]['uuid']['value'],$content,$reception[$n]['open_user_id'])){
								//$task_id  打印成功返回 ，打印任务编号
							}
						}
					}
				}
				//后厨打印
				if(!empty($kitchen) AND ($p_model == 1 OR $p_model == 2)){
					for($n=0;$n<sizeof($kitchen);$n++){
						//打印份数
						for($m=0;$m<$p_n;$m++){
							if($task_id = $helper->printContent($kitchen[$n]['uuid']['value'],$content,$kitchen[$n]['open_user_id'])){
								//$task_id  打印成功返回 ，打印任务编号
							}
						}
					}
				}
				return true;
			}
		}
		$printer->error = '未添加打印设备';
        return false;
	}

	
}
