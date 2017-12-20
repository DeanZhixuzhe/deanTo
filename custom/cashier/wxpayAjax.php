<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once "../extend/wechatPay/lib/WxPay.Api.php";

$out_trade_no = $_POST["order_id"];
$input = new WxPayOrderQuery();
$input->SetOut_trade_no($out_trade_no);
$result = WxPayApi::orderQuery($input);
if (isset($result['trade_state']) && $result['trade_state'] == 'SUCCESS') {
	echo "1";
}elseif (isset($result['out_trade_no']) && $result['result_code'] == 'FAIL') {
	echo "2";
}else{
	echo "0";
}
?>