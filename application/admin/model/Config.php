<?php
namespace app\admin\model;
use app\common\model\Config as ConfigModel;
use think\Session;
/**
 * 站点配置模型
 */
class Config extends ConfigModel
{
	
	/**
     * 编辑
     */
    public function edit($data)
    {
        if ($this->allowField(true)->save($data) === false) {
            return false;
        }
        return true;
    }
}
