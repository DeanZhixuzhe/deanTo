<?php 
require_once(dirname(__FILE__)."/common.php");

if (isset($_POST['mcode']) && isset($_POST['mobile']) && isset($_POST['pwd'])) {
	$mobile = $_POST['mobile'];
	$pwd = $_POST['pwd'];
	//查询手机号相同的最新的一条验证码
	$query = "SELECT * FROM `#@__sms` WHERE mobile=$mobile ORDER BY ctime DESC";
	$row = $dsql->GetOne($query);	//获取一条记录的内容
	$query2 = "SELECT * FROM `dede_user` WHERE mobile=$mobile";
	if (is_array($dsql->GetOne($query2))) {
		showMsg('您已经注册过，请直接登录', '/',0,5000);
		exit();
	}
	if (($row['ctime']+900) < time()) {
		showMsg('验证码已过期，请重新发送！', '/custom/reg.html',0,5000);
		exit();
	}elseif ($_POST['mcode'] != $row['code']) {
		showMsg('验证码不正确！', '/custom/reg.html',0,5000);
		exit();
	}else{
		$nickname = rand(10000000,99999999);
		$query3 = "INSERT INTO `#@__user` (`id`,`mobile`,`nickname`,`avatar`,`sex`,`email`,`ctime`,`ip`,`realip`) VALUES (null,'$mobile','$nickname','','-1','','$ctime','$ip','$realip')";
		if($dsql->ExecuteNoneQuery($query3)){
			$query4 = "SELECT * FROM `#@__user` WHERE mobile=$mobile";
			$row2 = $dsql->GetOne($query4);
			if (!empty($row2['id'])) {
				$userid = $row2['id'];
				$query5 = "INSERT INTO `#@__user_auth` (`id`,`user_id`,`type`,`identifier`,`credential`) VALUES (null,'$userid','phone','$mobile','$pwd')";
				if ($dsql->ExecuteNoneQuery($query5)) {
					showMsg('验证码输入正确，恭喜你注册成功！', '/',0,5000);
					exit();
				}
			}
		}
	}
}
require_once("reg.html");