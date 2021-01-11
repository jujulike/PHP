<?php
namespace app\store\model;
use app\common\model\Material as MaterialModel;

/**
 * 公众号素材库模型
 */
class Material extends MaterialModel
{
	/**
     * 添加图文素材集
     */
    public function addText($data)
    {	
		//创建素材列表
		$material = array();
		//上传封面图
		for($n=0;$n<sizeof($data);$n++){
			//验证封面图片是否已经上传到微信端
			$res = $this->getImage($data[$n]['file_name']);
			if($res){
				//上传过，获取信息
				$data[$n]['url']= $res['url'];
				$data[$n]['media_id']= $res['media_id'];
			}else{
				write_log($res,__DIR__);
				//没上传-执行上传
				$result = $this->upWechat($data[$n]['file_name']);
				if(!isset($result['media_id'])){
					$this->error = '封面上传到微信端错误';
					return false;
				}
				$data[$n]['media_id'] = $result['media_id'];
				$data[$n]['url'] = $result['url'];
				array_push($material,[
					'name' => '图文封面',
					'file_name' => $data[$n]['file_name'],
					'media_id' => $result['media_id'],
					'url' => $result['url'],
					'wxapp_id' => self::$wxapp_id
				]);
			}			
		}
		//过滤正文部分的图片数据
		for($n=0;$n<sizeof($data);$n++){
			$result= $this->filterStr($data[$n]['content']);
			//判断正文中是否存在图片
			if(sizeof($result)==2){
				$img = $result['img'];
				//上传到微信端
				if(!$img = $this->upWechatUrl($img)){
					$this->error = '图片仅支持jpg/png格式，大小必须在1MB以下';
					return false;
				}
				//二次过滤正文，替换掉占位符
				$data[$n]['content'] = html_entity_decode($this->filterStrTwo($result['str'],$img));
			}else{
				//富文本转码
				$data[$n]['content'] = html_entity_decode($result['str']);
			}
		}
		//拼接数据提交到微信端
		$media_id = $this->upWechatText($data);
		if(!$media_id){
			$this->error = '图文素材发布到微信端错误';
			return false;
		}
		$text_no = orderNo();//生成素材集编号
		//添加到图文集表
		$model = new MaterialText;
		if(!$model->add($data,$text_no)){
            $this->error = '添加到图文集表错误';
			return false;
		}
		//组成数据添加到素材表
		array_push($material,[
			'name' => $data[0]['name'],
			'file_type' => 40,
			'file_name' => $data[0]['file_name'],
			'media_id' => $media_id,
			'text_no' => $text_no,
			'url' => $data[0]['url'],
			'wxapp_id' => self::$wxapp_id
		]);
		if(!$this->saveAll($material)){
			$this->error = '添加到素材表错误';
			return false;
		}
		return true;
    }
	
	/**
     * 修改图文素材集
     */
    public function editText($data,$model)
    {
		//创建素材列表
		$material = array();
		//上传封面图
		for($n=0;$n<sizeof($data);$n++){
			//验证封面图片是否已经上传到微信端
			$res = $this->getImage($data[$n]['file_name']);
			if($res){
				//上传过，获取信息
				$data[$n]['url']= $res['url'];
				$data[$n]['media_id']= $res['media_id'];
			}else{
				//没上传-执行上传
				$result = $this->upWechat($data[$n]['file_name'], 10);
				if(!isset($result['media_id'])){
					$this->error = '封面图上传到微信端错误';
					return false;
				}
				$data[$n]['media_id'] = $result['media_id'];
				$data[$n]['url'] = $result['url'];
				array_push($material,[
					'name' => '图文封面',
					'file_name' => $data[$n]['file_name'],
					'media_id' => $result['media_id'],
					'url' => $result['url'],
					'wxapp_id' => self::$wxapp_id
				]);
			}			
		}
		//过滤正文部分的图片数据
		for($n=0;$n<sizeof($data);$n++){
			$result= $this->filterStr($data[$n]['content']);
			//判断正文中是否存在图片
			if(sizeof($result)==2){
				$img = $result['img'];
				//上传到微信端
				if(!$img = $this->upWechatUrl($img)){
					$this->error = '图片仅支持jpg/png格式，大小必须在1MB以下';
					return false;
				}
				//二次过滤正文，替换掉占位符
				$data[$n]['content'] = html_entity_decode($this->filterStrTwo($result['str'],$img));
			}else{
				//富文本转码
				$data[$n]['content'] = html_entity_decode($result['str']);
			}
		}
		//拼接数据提交到微信端
		if(!$this->editWechatText($data,$this->media_id)){
			$this->error = '图文素材发布到微信端错误';
			return false;
		}
		//添加到图文集表
		if(!$model->edit($data)){
            $this->error = '添加到图文集表错误';
			return false;
		}
		//组成数据添加到素材表
		array_push($material,[
			'material_id' => $this->material_id,
			'name' => $data[0]['name'],
			'file_name' => $data[0]['file_name'],
			'url' => $data[0]['url']
		]);
		if(!$this->saveAll($material)){
			$this->error = '添加到素材表错误';
			return false;
		}
		return true;
    }
	
    /**
     * 添加新记录
     */
    public function add($file,$data)
    {
		if($data['file_type']!=10){
			//文件上传到本地服务器
			if(!$result = $this->upFile($file, $data['file_type'])) {
				$this->error = '文件不符合要求';
				return false;
			}
			$data['file_name'] = $result;//获取文件名称
		}else{
			if(!isset($data['file_name'])){
				$this->error = '请选择图片';
				return false;
			}
		}
		//文件上传到微信端
		if($data['file_type']==30){
			$result = $this->upWechat($data['file_name'],$data['file_type'],$data['name'],$data['introduction']);
		}elseif($data['file_type']==10){
			//如果是图片
			//验证封面图片是否已经上传到微信端
			$result = $this->getImage($data['file_name']);
			if($result){
				$this->error = '该图片素材上传过了，记录编号：'.$result['material_id'];
				return false;
			}else{
				//没上传-执行上传
				$result = $this->upWechat($data['file_name']);
			}
			
		}else{
			$result = $this->upWechat($data['file_name'],$data['file_type']);
		}
		if(empty($result)){
			$this->error = '上传到微信端错误';
            return false;
		}
		$data['media_id'] = $result['media_id'];
		if($data['file_type']==10){
			$data['url'] = $result['url'];
		}
        $data['wxapp_id'] = self::$wxapp_id;
        return $this->allowField(true)->save($data);
    }
	
	/**
     * 更新
     */
    public function edit($data)
    {
        return $this->allowField(true)->save($data) !== false;
    }

    /**
     * 删除
     */
    public function remove()
    {
		if($this['file_type']['value']==40){
			//删除图文集
			MaterialText::where('text_no',$this['text_no'])->delete();
		}else{
			//删除本地图片
			if(file_exists('./uploads/'.$this['file_name']))
			{
				unlink('./uploads/'.$this['file_name']);
			}
		}
		//删除素材
		$access_token = getAccessToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token='.$access_token;
		$data = '{"media_id":"'.$this['media_id'].'"}';
		$result = json_decode(http_request($url,$data),true);
		if($result['errcode']!=0){
			$this->error = '微信服务端删除错误';
            return false;
		}
        return $this->delete();
    }
	
	/**
     * 上传素材文件 - 到本地服务器
     */
    private function upFile($file, $file_type)
    {
        $uplodDir = WEB_PATH . 'uploads';	//上传图片位置
        // 验证文件并上传
		if($file_type==10){	//图片（image）: 2M，支持bmp/png/jpeg/jpg/gif格式
			$info = $file->validate(['size' => 2 * 1024 * 1024, 'ext' => 'jpg,jpeg,png,gif'])->rule('uniqid')->move($uplodDir);
		}
		if($file_type==20){	//语音（voice）：2M，播放长度不超过60s，mp3/wma/wav/amr格式
			$info = $file->validate(['size' => 2 * 1024 * 1024, 'ext' => 'mp3,wma,wav,amr'])->rule('uniqid')->move($uplodDir);
		}
		if($file_type==30){	//视频（video）：10MB，支持MP4格式
			$info = $file->validate(['size' => 10 * 1024 * 1024, 'ext' => 'mp4'])->rule('uniqid')->move($uplodDir);
		}
        if (empty($info)) {
            return false;
        }
        return $info->getSaveName();//返回文件名称
    }
	
	/**
     * 上传素材文件 - 到微信端
     */
    public function upWechat($file_name, $file_type=10,$name='',$introduction='')
    {
		// 验证文件并上传
		if($file_type==10){	//图片（image）: 2M，支持bmp/png/jpeg/jpg/gif格式
			$type = 'image';
			$mimetype = 'image/jpeg';
		}
		if($file_type==20){	//语音（voice）：2M，播放长度不超过60s，mp3/wma/wav/amr格式
			$type = 'voice';
			$mimetype = 'audio/mpeg';
		}
		if($file_type==30){	//视频（video）：10MB，支持MP4格式
			$type = 'video';
			$mimetype = 'video/mp4';
			$post['description'] = '{"title":"'.$name.'","introduction":"'.$introduction.'"}';
		}
        $access_token = getAccessToken();
		$real_path = WEB_PATH . 'uploads/'.$file_name;
		//上传到微信服务器
		$url = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$access_token.'&type='.$type;
		$post['media'] = curl_file_create($real_path,$mimetype,$file_name);//获取要上传的二进制文件
		return json_decode(http_request($url,$post),true);
    }
	
	/**
     * 上传图文素材 - 到微信端
     */
    private function upWechatText($data)
    {
		$post = '{"articles":[';
		for($n=0;$n<sizeof($data);$n++){
			$post = $post.'{"title":"'.$data[$n]['title'].'","thumb_media_id":"'.$data[$n]['media_id'].'","author":"'.$data[$n]['author'].'","digest":"'.$data[$n]['digest'].'","show_cover_pic":1,"content":"'.str_ireplace('"','\'',$data[$n]['content']).'","content_source_url":"#"},';	
		}
		$post = $post.']}';
        $access_token = getAccessToken();
		//上传到微信服务器
		$url = 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token='.$access_token;
		$result = json_decode(http_request($url,$post),true);
		if(!isset($result['media_id'])){
			return false;
		}
		return $result['media_id'];
    }
	
	/**
     * 修改图文素材 - 到微信端
     */
    private function editWechatText($data,$media_id)
    {
		$access_token = getAccessToken();
		for($n=0;$n<sizeof($data);$n++){
			$post = '{"media_id":"'.$media_id.'","index":'.$data[$n]['id'].',"articles":{"title":"'.$data[$n]['title'].'","thumb_media_id":"'.$data[$n]['media_id'].'","author":"'.$data[$n]['author'].'","digest":"'.$data[$n]['digest'].'","show_cover_pic":1,"content":"'.str_ireplace('"','\'',$data[$n]['content']).'","content_source_url":"#"}}';
			//上传到微信服务器
			$url = 'https://api.weixin.qq.com/cgi-bin/material/update_news?access_token='.$access_token;
			$result = json_decode(http_request($url,$post),true);
			if($result['errcode']!= 0){
				return false;
			}
			return true;
		}
    }
	
	/**
     * 上传图文消息内的图片 - 到微信端
	 *	图片仅支持jpg/png格式，大小必须在1MB以下
     */
    private function upWechatUrl($img)
    {
        $access_token = getAccessToken();
		for($n=0;$n<sizeof($img);$n++){
			$real_path = WEB_PATH . 'uploads/'.$img[$n]['file_name'];
			//上传到微信服务器
			$url = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token='.$access_token;
			$post['media'] = curl_file_create($real_path,'image/jpeg',$img[$n]['file_name']);//获取要上传的二进制文件
			$res = json_decode(http_request($url,$post),true);
			if(!isset($res['url'])){
				return false;//上传错误，一般是图片不符合要求
			}
			$img[$n]['url'] = $res['url'];
		}
		return $img;
    }
	
	
	/**
     * 过滤字符串中的链接/换成占位符
     */
    private function filterStr($str)
    {
		for($n=0;$n<99;$n++){ 
			//字符串 在$str 第一次出现的位置 索引0开始 没有出现返回false 不区分大小写
			$start = stripos($str,base_url().'uploads/');
			if(!$start){
				$data['str'] = $str;
				return $data;
			}
			//获取截取长度
			$len = strlen(base_url().'uploads/')+27;
			//截取字符串 $str 的第一个字符 截取长度3 长度不填默认截取到最后  参数为负数则倒数
			$data['img'][$n]['url'] = substr($str,$start,$len);
			//截取字符串,第N个字符 截取到最后
			$data['img'][$n]['file_name'] = substr($data['img'][$n]['url'],strlen(base_url().'uploads/'));
			//替换占位符
			$str = str_ireplace($data['img'][$n]['url'],'he_ma'.$n,$str);
		}
    }
	
	/**
     * 二次过滤字符串中的占位符/换成安全的链接
     */
    private function filterStrTwo($str,$img)
    {
		for($n=0;$n<sizeof($img);$n++){ 
			//替换占位符
			$str = str_ireplace('he_ma'.$n,$img[$n]['url'],$str);
		}
		return $str;
    }
	

}
