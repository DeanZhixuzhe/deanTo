<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>TheOne浪漫策划公司</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<style type="text/css">
		.tongzhi{width: 100%; padding: 20% 20px; text-align: center; font-size: 1.5em;}
	</style>
</head>
<body>
<?php
$result = isset($_GET['result'])?$_GET['result']:'';

if (!empty($result) && $result == 'success') {
	echo '<div class="tongzhi"><p>恭喜您付款成功！</p><p>请联系客服填写您的浪漫档案表！</p><p>我们将尽快为您定制策划方案！</p></div>';
}else{
	echo '<div class="tongzhi"><p>付款失败，请重新付款！</p></div>';
}
?>
</body>
</html>
