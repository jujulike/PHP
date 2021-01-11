<?php
namespace app\common\library\mstching;
use app\common\model\Config as ConfigModel;

/*
 * 对对机驱动模块
*/
class PrintHelper
{
	private $baseurl = "http://www.open.mstching.com";
	private $appid;		
	private $appsecret;
	
	/**
	 * 构造函数
	 */
	public function __construct( $baseurl, $appid, $appsecret)
	{
		$config = ConfigModel::detail();
		$this->appid = $config['ddj_appid'];
		$this->appsecret = $config['ddj_appsecret'];
	}
	
    /*
     * 用户设备绑定
     * $uuid 设备编号
     * $userId 与对对机平台关联的用户唯一标示（你自己系统定义的）
	 * $deviceName 自定义设备名称
	 * 返回数据格式：{"OpenUserId":1251,"Code":200,"Message":"成功"}
     */
	public function userBind($uuid, $userId, $deviceName)
    {
        $url = $this->getUrl("/home/userbind");
        $jsonStr = json_encode(array(
            'Uuid' => $uuid,
            'UserId' => $userId,
            'DeviceName' => $deviceName
        ));
		
		$userBind = $this->http_post_json($url, $jsonStr);
		//write_log($userBind, __DIR__);
		$userBind=json_decode($userBind,true);
		if($userBind['Code']!=200){//绑定不成功
			$userBind['Message'] = p_err($userBind['Code']);
		}
        return $userBind;
    }
	
    /*
     * 获取设备状态                          
     * $uuid 设备编号
	 * 返回数据格式：{"State":0,"Code":200,"Message":"成功"}
	 * State状态值(-1错误 0正常 1缺纸 2温度保护报警 3忙碌 4离线)
     */
    public function getDeviceState($uuid)
	{
        $url = $this->getUrl("/home/getdevicestate");
        $jsonStr = json_encode(array('Uuid' => $uuid));
        $DeviceState =  $this->http_post_json($url, $jsonStr);
		$DeviceState = json_decode($DeviceState,true);
		if($DeviceState['Code']==200){//查询成功
			return $this->p_state($DeviceState['State']);
		}
        return $this->p_err($DeviceState['Code']);
    }
	
    /*
     * 打印信息
     * $uuid 设备编号
     * $content 打印的内容
     * $OpenUserId 调用 userBind函数返回的openUserId
	 * 返回数据格式：{"TaskId":1,"Code":200,"Message":"成功"}
	 * TaskId  打印任务编号
     */
    public function printContent($uuid,$content,$openUserId)
	{
        $url = $this->getUrl("/home/printcontent2");
        $jsonStr = json_encode(array('Uuid' => $uuid,'PrintContent'=>' '.$content,'OpenUserId'=>$openUserId));
		$pll = $this->http_post_json($url, $jsonStr);
		$pll = json_decode($pll,true);
		if($pll['Code']!=200){//绑定不成功
			//$pll['Message'] = p_err($pll['Code']);
			return false;
		}
        return $pll['TaskId'];
    }
	
    /*
     * 打印网页信息
     * $uuid 设备编号
     * $printUrl 打印网页地址
     * $OpenUserId 调用 userBind函数返回的openUserId
     */
    public function  printHtmlContent($uuid,$printUrl,$openUserId)
	{
        $url = $this->getUrl("/home/printhtmlcontent");
        $jsonStr = json_encode(array('Uuid' => $uuid,'PrintUrl'=>$printUrl,'OpenUserId'=>$openUserId));
        return $this->http_post_json($url, $jsonStr);
    }
	
    /*
     * 查询任务状态
     * $taskId 任务编号
     */
    public function getPrintTaskState($taskId)
	{
        $url = $this->getUrl("/home/getprinttaskstate");
        $jsonStr = json_encode(array('TaskId' => $taskId));
        return $this->http_post_json($url, $jsonStr);
    }
	
	
	//创建通用请求参数
	private function createParams()
	{
		$nonce = $this->getNonce();
		$timeStamp = $this->getTimestamp();
		$signStr = $this->signatureString($this->appsecret, $timeStamp, $nonce);
		return '?appid='.$this->appid.'&nonce='.$nonce.'&'.'timestamp='.$timeStamp.'&signature='.$signStr;
	}
	//获取请求url
	private function getUrl($action)
	{
		$params = $this->createParams();
		return $this->baseurl.$action.$params;
	}
	//获取随机数
	private function getNonce()
	{
		return ''.rand(100000000,999999999);
	}
	//获取时间戳
	private function getTimestamp()
	{    
		return ''.intval(time());
	}
	//sha1 加密
	private function signatureString($appSecret,$timestamp,$nonce)
	{    
		$arrTmp = array($appSecret,$timestamp,$nonce);
		asort($arrTmp,SORT_LOCALE_STRING);
		$strTmp = implode('', $arrTmp);
		return strtolower(sha1($strTmp));
	}
	// //字符串转base64
	// function strToBase64($data){   
	//     echo '$data='.$data;
	//     return base64_encode($data);
	// }
	//发送post请求
	/**
	 * PHP发送Json对象数据
	 *
	 * @param $url 请求url
	 * @param $jsonStr 发送的json字符串
	 * @return string
	 */
	private function http_post_json($url, $jsonStr)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Content-Length: ' . strlen($jsonStr)
		)
			);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $response;
	}
	
	//设备状态
	private function p_state($value)
	{
		if($value<0 OR $value>4){
			return '错误';
		}
		$state = [
			'0' => '正常',
			'1' => '缺纸',
			'2' => '高温',
			'3' => '忙碌',
			'4' => '离线'
		];
		return $state[$value];
		
	}
	
	//服务请求错误代码
	private function p_err($code)
	{
		$err = [
			'200' => '成功',
			'1000' => '服务处理异常',
			'1001' => '验证签名错误',
			'1002' => '链接失效',
			'1003' => '参数错误',
			'1004' => 'AppId不存在',
			'1005' => '设备不存在',
			'1006' => '开发者账号已被禁用',
			'1007' => '任务不存在或权限不足',
			'1008' => '未通过认证',
			'1009' => '限制调用',
			'1010' => '设备未连接',
			'1011' => '与服务器断开链接',
			'1012' => '打印任务不能为空'
		];
		return $err[$code];
	}
	
	/**
	* 制作服务请求模板
	* $data 打印数据
	*/
	public function make_serve_templet($data)
	{
		$content="[
				{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "# ".$data['table']." #"))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0},
				{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "********************************"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},
				{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE",$data['msg']))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0},
				{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "********************************"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0}]";
		return $content;
	}		

	/**
	 * 制作订单模板
	 * $data 订单数据
	 */
	public function make_order_templet($data)
	{
		if($data['table']['table_name']){
			$content="[
			{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "# ".$data['table']['table_name']." #"))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0},";
		}else{
			$content="[
			{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "# ".$data['sort']."号 #"))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0},";
		}
		$content=$content."
			{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "********************************"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},
			{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", $data['p_title']))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},";	
		$content=$content."{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "-- 微信支付 --"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},";
		$content=$content."{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "下单时间:".$data['create_time']))."\",\"Bold\":0,\"FontSize\":-1,\"PrintType\":0},
			{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "********************************"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},
			{\"Alignment\":0,\"BaseText\":\"";
				
				//循环拼接打印模板
				for ($i = 0; $i < sizeof($data['goods']); $i++) {
						$goods_name=$data['goods'][$i]['goods_name'];//产品名字
						$total_num=$data['goods'][$i]['total_num'];	//产品数量
						$total_price=$data['goods'][$i]['total_price'];//产品价格
						$n=$i+1;//打印单据序列号
						//链接打印订单字符串
						$goods_list=iconv("UTF-8", "GBK//IGNORE", $n.".".$goods_name." -- ".$total_num."份 -- ".$total_price."元");
						$content=$content.base64_encode($goods_list)."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},{\"Alignment\":0,\"BaseText\":\"";
				}
				
		$content=$content.base64_encode(iconv("UTF-8", "GBK//IGNORE", "********************************"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},
			{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "数量：".$i))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},
			{\"Alignment\":0,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "总价：￥".$data['pay_price']."元"))."\",\"Bold\":0,\"FontSize\":0,\"PrintType\":0},";
			
		if($data['table']['table_name']){
			$content=$content."
				{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "# ".$data['table']['table_name']." # 完"))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0}
				]";
		}else{
			$content=$content."
				{\"Alignment\":1,\"BaseText\":\"".base64_encode(iconv("UTF-8", "GBK//IGNORE", "# ".$data['sort']."号 # 完"))."\",\"Bold\":1,\"FontSize\":1,\"PrintType\":0}
				]";
		}
		return $content;
	}
}