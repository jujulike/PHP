<?php
namespace app\store\model;

use app\common\model\WxappTpl as WxappTplModel;

/**
 * 商户发布的小程序模板代码
 */
class WxappTpl extends WxappTplModel
{
   /**
     * 编辑
     */
    public function edit($data)
    {
        // 保存
        $this->allowField(true)->save($data);
    }

}
