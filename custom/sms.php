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
require_once(dirname(__FILE__)."/common.php");
//初始化 $options必填
$options['accountsid']='e6bfe4d8df4bac3884154208804c2253';
$options['token']='51a37fafc4f625b3dcbeeb4e4f07ad99';
$ucpass = new Ucpaas($options);

$appId = "fd8b23fb682f48b6a5df4f81f49ee17d";
$to = "";	//手机号
$templateId = "94280";	//短信模板的ID
$param="";	//短信模板的参数

$ctime = time();
$broswer = get_broswer();
$os = get_os();
$ip = get_ip();
$realip = get_realip();
$agent = get_agent();
if (isset($_GET['mobile'])) {
	$mobile = $_GET['mobile'];
	$code = rand(100000,999999);	//生成6位随机数的验证码
	$query = "INSERT INTO `#@__sms` (`sms_id`,`mobile`,`code`,`ctime`,`ip`,`realip`,`area`,`status`) VALUES (null,'$mobile','$code','$ctime','$ip','$realip','cn','1')";
	if($dsql->ExecuteNoneQuery($query)){	//dedecms公共SQL语句执行代码
		$to = $mobile;	//手机号码赋值给短信平台参数
		$param = $code.",15";		//给短信模板的参数赋值
		// echo $ucpass->templateSMS($appId,$to,$templateId,$param);
		$result = $ucpass->templateSMS($appId,$to,$templateId,$param);
		$data = json_decode($result,true);
		$respCode = $data['resp']['respCode'];
		echo $respCode;
		if(!empty($respCode)){
			$row = $dsql->GetOne("SELECT * FROM `#@__sms` WHERE mobile=$mobile ORDER BY ctime DESC");
			$sid = $row['sms_id'];
			if(!empty($sid)){
				$query3 = "UPDATE `#@__sms` SET status=$respCode WHERE sms_id=$sid";
				$dsql->ExecuteNoneQuery($query3);
			}
		}
	}	
}
