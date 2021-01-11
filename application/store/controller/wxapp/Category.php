<?php

namespace app\store\controller\wxapp;

use app\store\controller\Controller;
use app\store\model\CategoryServe as CategoryServeModel;
use app\store\model\Wxapp as WxappModel;

/**
 * 小程序服务类目管理
 */
class Category extends Controller
{
    /**
     * 类目列表
     */
    public function index()
    {
        $list = getCategory();
		if(!$list){
			$this->redirect('/index.php?s=/store/wxapp/setting');				
		}
		return $this->fetch('index', compact('list'));	
    }

    /**
     * 删除
     */
    public function delete($category_id)
    {
		if($err = is_power()){
			return $this->renderError($err);
		}
		$category_id = explode(',',$category_id);
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/deletecategory?access_token='.$access_token;
		$data = '{"first":'.$category_id[0].',"second":'.$category_id[1].'}';
		$result = json_decode(http_request($url,$data),true);
		if($result['errcode']!=0){
			return $this->renderError('删除失败,错误代码：'.$result['errcode'].'，错误说明：'.$result['errmsg']);
		}
        return $this->renderSuccess('删除成功', url('wxapp.category/index'));
    }

    /**
     * 添加
     */
    public function add()
    {
        $model = new CategoryServeModel;
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            return $this->fetch('add', compact('list'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
		$wxapp = WxappModel::detail();
		$access_token = getAccessToken();
        $app = $this->postData('category');
		$CategoryServe = CategoryServeModel::detail(['category_serve_id' => $app['category_serve_id']]);
		$second = $CategoryServe['id'];
		$CategoryServe = CategoryServeModel::detail(['category_serve_id' => $CategoryServe['parent_id']]);
		$first = $CategoryServe['id'];
		$media_id = '';	
		if(!empty($app['head_image'])){
			//获取图片文件名称
			$file = UploadFileModel::getFileName($app['image_id']);
			$filename = '/uploads/'.$file;
			$real_path="{$_SERVER['DOCUMENT_ROOT']}{$filename}";
			//上传临时素材
			$url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$access_token.'&type=image';
			$data['media'] = curl_file_create($real_path,'image/jpeg',$file);//获取要上传的二进制文件
			$result = json_decode(http_request($url,$data),true);
			$media_id = $result['media_id']; //返回的临时素材（media_id）
		}
		
		$url = 'https://api.weixin.qq.com/cgi-bin/wxopen/addcategory?access_token='.$access_token;
		$data = '{"categories":[{"first":'.$first.',"second":'.$second.',"certicates":[{"key":"'.$app['name'].'","value":"'.$media_id.'"}]}]}';
		$result = json_decode(http_request($url,$data),true);
		if($result['errcode']!=0){
			return $this->renderError('添加失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg']);
		}
        return $this->renderSuccess('添加成功', url('wxapp.category/index'));
    }

    /**
     * 编辑
     */
    public function edit($category_id)
    {
        // 分类详情
        $model = CategoryModel::get($category_id, ['image']);
        if (!$this->request->isAjax()) {
            $list = $model->getCacheTree();
            return $this->fetch('edit', compact('model', 'list'));
        }
		if($err = is_power()){
			return $this->renderError($err);
		}
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('goods.category/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

}
