<?php

namespace app\store\model;

use app\common\model\Table as TableModel;
use think\Db;

/**
 * 餐桌模型
 */
class Table extends TableModel
{
	/**
     * 添加
     */
    public function add(array $data)
    {
        $data['wxapp_id'] = self::$wxapp_id;

        // 开启事务
        Db::startTrans();
        try {
            // 添加
            $this->allowField(true)->save($data);
			//生成桌位二维码
			$this->qrCode($this->table_id);//生成二维码
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }
    /**
     * 编辑
     */
    public function edit($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
        // 开启事务
        Db::startTrans();
        try {
            // 保存
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
     * 删除
     */
    public function remove()
    {
        // 开启事务处理
        Db::startTrans();
        try {
            // 删除
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
     * 生成二维码
     */
	public function qrCode($table_id)
	{
		
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token='.$access_token;
		$data = '{"scene":"'.$table_id.'"}';
		$result = http_request($url,$data);
		file_put_contents('assets/images/table/'.$table_id.'.png',$result); //获取的二维码数据存储到指定的文件
		return true;
	}

}
