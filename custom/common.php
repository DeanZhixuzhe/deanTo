<?php
error_reporting(E_ALL || ~E_NOTICE);
define('CUSTOM', str_replace("\\", '/', dirname(__FILE__) ) );
define('SYSROOT', str_replace("\\", '/', substr(CUSTOM,0,-7) ) );
define('STATICS',SYSROOT."/static");
define('EXTERNAL',CUSTOM."/external");
define('TEMPLETS',SYSROOT."/templets");

$GLOBALS['ctime'] = time();

require_once(SYSROOT."/include/common.inc.php");	//加载织梦核心配置文件
require_once(CUSTOM."/getuserinfo.php");	//加载获取用户浏览信息文件
require_once(EXTERNAL."/common.inc.php");		//加载外部API核心配置文件
