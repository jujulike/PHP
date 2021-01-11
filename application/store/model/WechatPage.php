<?php

namespace app\store\model;

use app\common\model\WechatPage as WechatPageModel;

/**
 * 微信公众号菜单模型
 */
class WechatPage extends WechatPageModel
{

    /**
     * 更新页面数据
     */
    public function edit($page_data)
    {
		$result = $this->creatmMenu($page_data);
		if($result['errcode']!=0){
			$this->error = '同步失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg'];
            return false;
		}
        return $this->save(compact('page_data')) !== false;
    }
	
	/**
     * 添加
     */
    public function add(array $page_data)
    {
		$data['page_data'] = $page_data;
        $data['wxapp_id'] = self::$wxapp_id;
		$result = $this->creatmMenu($page_data);
		if($result['errcode']!=0){
			$this->error = '同步失败,错误代码：'.$result['errcode'].'错误说明：'.$result['errmsg'];
            return false;
		}
        return $this->allowField(true)->save($data) !== false;
    }
	
	/**
	* 自定义菜单 - 同步到微信端
	*/
	private function creatmMenu($menu){
		$access_token = getAccessToken();
		$menu = json_encode($menu,JSON_UNESCAPED_UNICODE);
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
		$data = '{"button":'.$menu.'}';
		return json_decode(http_request($url,$data),true);
	}
}
