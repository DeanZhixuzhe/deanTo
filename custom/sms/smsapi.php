<?php
/**
 * sms
 *
 * @version        $Id: diy.php 1 15:38 2017年7月10日Z Dean $
 * @package        deanyan
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.deanyan.com
 */

require_once(dirname(__FILE__)."/../common.php");
$paasName = "ucpaas";
if (isset($_GET['mobile'])) {
	$mobile = $_GET['mobile'];
}else{
	return false;
}
$aid = isset($_GET['aid']) ? $_GET['aid'] : 1;
$tid = isset($_GET['tid']) ? $_GET['tid'] : 1;
$code = rand(100000,999999);
$ctime = $GLOBALS['ctime'];
$ip = $GLOBALS['ip'];
$realip = $GLOBALS['realip'];
$query = "INSERT INTO `#@__sms` (`sms_id`,`mobile`,`code`,`ctime`,`ip`,`realip`,`area`,`status`,`explain`) VALUES (null,'$mobile','$code','$ctime','$ip','$realip','cn','1','')";
$row = $dsql->ExecuteNoneQuery($query);
$paasResult = $paasName($mobile,$code,$aid,$tid,$row);
if(!empty($paasResult)){
	$row2 = $dsql->GetOne("SELECT * FROM `#@__sms` WHERE mobile=$mobile ORDER BY ctime DESC");
	$sid = $row2['sms_id'];
	if(!empty($sid)){
		$query3 = "UPDATE `#@__sms` SET status='$paasResult' WHERE sms_id=$sid";
		$dsql->ExecuteNoneQuery($query3);
	}
}

function ucpaas($mobile,$code,$aid,$tid,$row){
	if ($row) {
		require_once("ucpaas/Ucpaas.class.php");
		require_once("ucpaas/ucpaas.config.php");
		$appId = $ucpaas_appid['1'];
		$templateId = $ucpaas_templateId['1'];
		$param = $code . "," . $interval;
		$ucpaas = new Ucpaas($ucpaas_config);
		$result = $ucpaas->templateSMS($appId,$mobile,$templateId,$param);
		$data = json_decode($result,true);
		$respCode = $data['resp']['respCode'];
		return $respCode;
	}else{
		return false;
	}
}

