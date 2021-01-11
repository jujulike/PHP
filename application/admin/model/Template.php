<?php

namespace app\admin\model;

use app\common\model\Template as TemplateModel;

/**
 * 模板模型
 */
class Template extends TemplateModel
{
    /**
     * 添加新记录
     */
    public function add($data)
    {
        return $this->allowField(true)->save($data);
    }

    /**
     * 编辑记录
     */
    public function edit($data)
    {
        return $this->allowField(true)->save($data);
    }

    /**
     * 删除
     */
    public function remove()
    {
        return $this->delete();
    }

}
