<?php

namespace app\store\model;

use app\common\model\Printer as PrinterModel;
use app\common\library\mstching\PrintHelper;

/**
 * 云打印机模型
 */
class Printer extends PrinterModel
{
	
    /**
	 * 用户设备绑定
	 * 返回数据格式：{"OpenUserId":1251,"Code":200,"Message":"成功"}
     */
    public function add($data)
    {
		
		//实例化 测试uuid:8eccb5428937866d
		$helper = new PrintHelper();
		$userBind = $helper->userBind($data['uuid'], $userId="11", $data['title']);
		
		if($userBind['Code']!=200){//绑定不成功
			$this->error = $userBind['Message'];
            return false;
		}
		$data['open_user_id']=$userBind['OpenUserId'];
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->save($data)!== false;
    }

    /**
     * 更新
     */
    public function edit($data)
    {
        return $this->save($data) !== false;
    }

    /**
     * 删除
     */
    public function remove() {
        return $this->delete();
    }
}
