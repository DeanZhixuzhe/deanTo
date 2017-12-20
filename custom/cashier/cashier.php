<?php
require_once('../getuserinfo.php');
$terminal = isset($_GET['terminal'])?$_GET['terminal']:'pc';
$title = isset($_POST['title'])?$_POST['title']:'';
$litpic = isset($_POST['litpic'])?$_POST['litpic']:'';
$trueprice = isset($_POST['trueprice'])?$_POST['trueprice']:0;
$showurl = isset($_POST['showurl'])?$_POST['showurl']:'www.1314theone.com';
$discounts = isset($_POST['discounts'])?$_POST['discounts']:'';
$brower = "wx";
$rand1 = rand(1000,9999);
$rand2 = rand(10,99);
function getMillisecond() {
	list($t1, $t2) = explode(' ', microtime());
	$s = substr((float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000),9);
	if(substr($s,0,1) == 0){
		$s = '1'.substr($s,1);
	}
	return $s;
}
$out_trade_no = getMillisecond().date('d').date('H').'11'.date('i').date('m').$rand1.'01'.$rand2.date('y').date('s');

if (stripos($GLOBALS['agent'],'microMessenger')!==false) {
    $brower = "wx";
}else{
	$brower = "h5";
}
if (empty($discounts)) {
	$discountsCon = "";
}else{
	$discountsCon = "<h4>现在购买您可享受以下优惠</h4>";
	$discountsCon .= "<p>$discounts</p>";
}

if($terminal == 'pc'){
	include('../template/cashier/pccashier.html');
	exit();
}elseif ($terminal == 'wap') {
	include('../template/cashier/wapcashier.html');
	exit();
}else{
	echo "支付失败，请从新支付";
	exit();
}

?>


