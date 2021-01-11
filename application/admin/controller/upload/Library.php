<?php

namespace app\admin\controller\upload;

use app\admin\controller\Controller;
use app\admin\model\UploadFile as UploadFileModel;
use app\admin\model\UploadGroup as UploadGroupModel;

class Library extends Controller
{
    /**
     * 文件库列表
     */
    public function fileList($type = 'image', $group_id = -1)
    {
        // 分组列表
        $group_list = (new UploadGroupModel)->getList($type);
        // 文件列表
        $file_list = (new UploadFileModel)->getAdminlist(intval($group_id), $type);
        return $this->renderSuccess('success', '', compact('group_list', 'file_list'));
    }

    /**
     * 新增分组
     */
    public function addGroup($group_name, $group_type = 'image')
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = new UploadGroupModel;
        if ($model->add(compact('group_name', 'group_type'))) {
            $group_id = $model->getLastInsID();
            return $this->renderSuccess('添加成功', '', compact('group_id', 'group_name'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 编辑分组
     */
    public function editGroup($group_id, $group_name)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = UploadGroupModel::detail($group_id);
        if ($model->edit(compact('group_name'))) {
            return $this->renderSuccess('修改成功');
        }
        $error = $model->getError() ?: '修改失败';
        return $this->renderError($error);
    }

    /**
     * 删除分组
     */
    public function deleteGroup($group_id)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = UploadGroupModel::detail($group_id);
        if ($model->remove()) {
            return $this->renderSuccess('删除成功');
        }
        $error = $model->getError() ?: '删除失败';
        return $this->renderError($error);
    }

    /**
     * 批量删除文件
     */
    public function deleteFiles($fileIds)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = new UploadFileModel;
        if ($model->softDelete($fileIds)) {
            return $this->renderSuccess('删除成功');
        }
        $error = $model->getError() ?: '删除失败';
        return $this->renderError($error);
    }

    /**
     * 批量移动文件分组
     */
    public function moveFiles($group_id, $fileIds)
    {
		if($err = is_power('admin')){
			return $this->renderError($err);
		}
        $model = new UploadFileModel;
        if ($model->moveGroup($group_id, $fileIds) !== false) {
            return $this->renderSuccess('移动成功');
        }
        $error = $model->getError() ?: '移动失败';
        return $this->renderError($error);
    }
}
