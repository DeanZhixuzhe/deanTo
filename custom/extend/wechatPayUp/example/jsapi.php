<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';
		//商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $_GET['WIDout_trade_no'];

        //订单名称，必填
        $subject = $_GET['WIDsubject'];

        //付款金额，必填
        $total_fee = $_GET['WIDtotal_fee'];

        //商品描述，可空
        $body = isset($_GET['WIDbody'])?$_GET['WIDbody']:'';

        // 顾客姓名
        $name = isset($_GET['WIDname'])?$_POST['WIDname']:'';

        // 顾客手机
        $mobile = isset($_GET['WIDmobile'])?$_GET['WIDmobile']:'';

        // 顾客姓名和顾客手机赋值到商品描述中
        // $body .= "【顾客姓名：".$name."】【顾客手机：".$mobile."】";

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
// function printf_info($data)
// {
//     foreach($data as $key=>$value){
//         echo "<font color='#00ff55;'>$key</font> : $value <br/>";
//     }
// }

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("TheOne订单-".$out_trade_no);
$input->SetAttach($body);
$input->SetOut_trade_no($out_trade_no);
$input->SetTotal_fee(intval($total_fee)*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://www.1314theone.com/custom/payment/wechat/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);

// printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>确认支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if (res.err_msg == "get_brand_wcpay_request:ok") {
					alert("支付成功");
					window.location.href = "../result.php?result=success";
				}else{
					alert("支付失败");
					window.location.href = "../result.php?result=fail";
				}
				// alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<style type="text/css">
		body{background: #d9d9d9;}
		div,p,h1,h2,h3,h4,h5,h6,ul,li,button{margin:0;}
		.title{width: 100%; text-align: center; font-size: 18px;}
		.jine{width: 100%; font-weight: bold; text-align: center; font-size: 40px;}
		.one_line{display: block;height: 1px;border: 0;border-top: 1px solid #eeeeee;width: 100%;}
		.maijia{width: 100%; font-size: 16px; background: #fff; height: 50px; line-height: 50px; margin-top: 10px;}
		.maijia h4{float: left; color: #898787; margin-left: 20px; height: 50px; line-height: 50px;}
		.maijia p{float: right; margin-right: 20px; height: 50px; line-height: 50px;}
		.queren button{width: 100%; height: 50px; border-radius: 5px; background: #0eb00e; border: 0;cursor: pointer;color: #fff; font-size: 20px; margin-top: 20px;}
	</style>
</head>
<body>
	<div class="title">TheOne订单-<?php echo $out_trade_no; ?></div>
	<div class="jine">￥<?php echo $total_fee; ?>.00</div>
	<!-- <hr class="one_line"> -->
    <div class="maijia"><h4>收款方</h4><p>TheOne浪漫策划公司</p></div>
    <!-- <hr class="one_line"> -->
	<div class="queren">
		<button type="button" onclick="callpay()" >立即支付</button>
	</div>
</body>
</html>