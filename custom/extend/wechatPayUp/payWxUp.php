<?php
ini_set('date.timezone','Asia/Shanghai');
require_once('../../getuserinfo.php');
$terminal = isset($_GET['terminal'])?$_GET['terminal']:'pc';
$pingtai = isset($_GET['pingtai'])?$_GET['pingtai']:'';
$body = isset($_GET['WIDbody'])?$_GET['WIDbody']:'';
$subject = isset($_GET['WIDsubject'])?$_GET['WIDsubject']:'';
$total_fee = isset($_GET['WIDtotal_fee'])?$_GET['WIDtotal_fee']:0;
$out_trade_no = isset($_GET['WIDout_trade_no'])?$_GET['WIDout_trade_no']:'';
$show_url = isset($_GET['WIDshow_url'])?$_GET['WIDshow_url']:'www.1314theone.com';
$coupon_fee = isset($_GET['WIDcoupon_fee'])?$_GET['WIDcoupon_fee']:0;;

if (stripos($GLOBALS['agent'],'microMessenger')!==false) {
    $brower = "wx";
}else{
	$brower = "h5";
}


//PC微信扫码
if ($terminal == 'pc' && $pingtai == 'wechat') {
	echo "zhifu1";
	require_once('lib/WxPay.Api.php');
	require_once('lib/WxPay.Config.php');
	require_once('lib/WxPay.Data.php');
	require_once('lib/WxPay.Exception.php');
	require_once('example/WxPay.NativePay.php');
	require_once('example/log.php');
	echo "zhifu2";
	//初始化日志
	$logHandler= new CLogFileHandler("../extend/wechatPay/logs/".date('Y-m-d').'.log');
	$log = Log::Init($logHandler, 15);
	$notify = new NativePay();
	//模式二
	/**
	 * 流程：
	 * 1、调用统一下单，取得code_url，生成二维码
	 * 2、用户扫描二维码，进行支付
	 * 3、支付完成之后，微信服务器会通知支付成功
	 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
	 */
	$input = new WxPayUnifiedOrder();
	echo "zhifu3";
	$input->SetBody($subject);
	$input->SetAttach($body);
	$input->SetOut_trade_no($out_trade_no);
	$input->SetTotal_fee($total_fee);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetGoods_tag("test");
	$input->SetNotify_url("http://www.1314theone.com/romantic/extend/wechatPay/example/notify.php");
	$input->SetTrade_type("NATIVE");
	$input->SetProduct_id("123456789");
	$input->SetCoupon_fee($coupon_fee);
	echo "zhifu4";
	$result = $notify->GetPayUrl($input);
	echo "zhifu5";
	print_r($result);
	$url2 = $result["code_url"];
	include('wxpay_native.html');
	exit;
}

//PC支付宝
if ($terminal == 'pc' && $pingtai == 'alipay') {
	require_once("../extend/alipayPc/alipay.config.php");
	require_once("../extend/alipayPc/lib/alipay_submit.class.php");
	require_once("../extend/alipayPc/lib/alipay_core.function.php");
	require_once("../extend/alipayPc/lib/alipay_md5.function.php");
	$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
        //如"参数名"=>"参数值"
	);
	//建立请求
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	echo $html_text;
}

//移动H5微信，提前请求微信的统一下单，获得一个URL链接，直接跳转URL
if ($terminal == 'wap' && $pingtai == 'wechat' && $brower == 'h5') {
	require_once('../extend/wechatPay/lib/WxPay.Api.php');
	require_once('../extend/wechatPay/lib/WxPay.Config.php');
	require_once('../extend/wechatPay/lib/WxPay.Data.php');
	require_once('../extend/wechatPay/lib/WxPay.Exception.php');
	require_once('../extend/wechatPay/example/log.php');
	//初始化日志
	$logHandler= new CLogFileHandler("../extend/wechatPay/logs/".date('Y-m-d').'.log');
	$log = Log::Init($logHandler, 15);
	//②、统一下单
	$input = new WxPayUnifiedOrder();
	$input->SetBody($subject);
	$input->SetAttach($body);
	$input->SetOut_trade_no($out_trade_no);
	$input->SetTotal_fee($total_fee);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetGoods_tag("test");
	$input->SetNotify_url("http://www.1314theone.com/romantic/extend/wechatPay/example/notify.php");
	$input->SetTrade_type("MWEB");
	$order = WxPayApi::unifiedOrder($input);
	if (isset($order['mweb_url']) && !empty($order['mweb_url'])) {
		$url = $order['mweb_url'];
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
	}else{
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='result.php?result=fail'";
		echo "</script>";
	}
}

//移动H5支付宝
if ($terminal == 'wap' && $pingtai == 'alipay' && $brower == 'h5') {
	require_once("../extend/alipayWap/alipay.config.php");
	require_once("../extend/alipayWap/lib/alipay_submit.class.php");
	require_once("../extend/alipayWap/lib/alipay_core.function.php");
	require_once("../extend/alipayWap/lib/alipay_md5.function.php");
	//构造要请求的参数数组，无需改动
	$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"show_url"	=> $show_url,
		"app_pay"	=> "Y",//启用此参数能唤起钱包APP支付宝
		"body"	=> $body,
		//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1
        //如"参数名"	=> "参数值"   注：上一个参数末尾需要“,”逗号。
	);
	//建立请求
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	echo $html_text;
}

//移动微信浏览器微信
if ($terminal == 'wap' && $pingtai == 'wechat' && $brower == 'wx') {
	require_once('../extend/wechatPay/lib/WxPay.Api.php');
	require_once('../extend/wechatPay/lib/WxPay.Config.php');
	require_once('../extend/wechatPay/lib/WxPay.Data.php');
	require_once('../extend/wechatPay/lib/WxPay.Exception.php');
	require_once('../extend/wechatPay/example/WxPay.JsApiPay.php');
	require_once('../extend/wechatPay/example/log.php');
	//初始化日志
	$logHandler= new CLogFileHandler("../extend/wechatPay/logs/".date('Y-m-d').'.log');
	$log = Log::Init($logHandler, 15);

	//①、获取用户openid
	$tools = new JsApiPay();
	$openId = $tools->GetOpenid();
	//②、统一下单
	$input = new WxPayUnifiedOrder();
	$input->SetBody($subject);
	$input->SetAttach($body);
	$input->SetOut_trade_no($out_trade_no);
	$input->SetTotal_fee($total_fee);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetGoods_tag("test");
	$input->SetNotify_url("http://www.1314theone.com/romantic/extend/wechatPay/example/notify.php");
	$input->SetTrade_type("JSAPI");
	$input->SetOpenid($openId);
	$order = WxPayApi::unifiedOrder($input);

	$jsApiParameters = $tools->GetJsApiParameters($order);

	include('../template/cashier/wxpay_jsapi.html');
	exit;
}

//移动端微信浏览器支付宝，弹出HTML文件提示，浏览器中打开完成支付
if ($terminal == 'wap' && $pingtai == 'alipay' && $brower == 'wx') {
	if (stripos($GLOBALS['agent'],'iphone')!==false) {
		$open = '<li><em>1</em>点击右上角<img src="../template/cashier/images/wxllqi.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按钮</li>
			<li><em>2</em>选择在<img src="../template/cashier/images/safariopen.png"></li>';
	}else{
		$open = '<li><em>1</em>点击右上角<img src="../template/cashier/images/wxllqa.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按钮</li>
		<li><em>2</em>选择在浏览器中打开</li>';
	}
	include('../template/cashier/alipay_in_wechat.html');
	exit;
}

?>