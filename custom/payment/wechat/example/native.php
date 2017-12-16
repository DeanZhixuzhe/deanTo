<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
// $url1 = $notify->GetPrePayUrl("123456789");

		//商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $_POST['WIDout_trade_no'];

        //订单名称，必填
        $subject = $_POST['WIDsubject'];

        //付款金额，必填
        $total_fee = $_POST['WIDtotal_fee'];

        //商品描述，可空
        $body = isset($_POST['WIDbody'])?$_POST['WIDbody']:'';

        // 顾客姓名
        $name = isset($_POST['WIDname'])?$_POST['WIDname']:'';

        // 顾客手机
        $mobile = isset($_POST['WIDmobile'])?$_POST['WIDmobile']:'';

        // 顾客姓名和顾客手机赋值到商品描述中
        $body .= "【顾客姓名：".$name."】【顾客手机：".$mobile."】";

//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody("TheOne订单-".$out_trade_no);
$input->SetAttach($body);
$input->SetOut_trade_no($out_trade_no);
$input->SetTotal_fee(intval($total_fee)*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://www.1314theone.com/custom/payment/wechat/example/notify.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>在线支付</title>
    <style type="text/css">
        .wechat_pay{width: 980px; height: 430px; margin: 30px auto; background: url(../../images/wechat_pay.png);}
        .wechat_pay img{width: 270px; height: 270px; margin-left: 140px; margin-top: 40px;}
    </style>
</head>
<body>
    <div class="wechat_pay"><img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>"/></div>
</body>
</html>