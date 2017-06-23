<?php 
/**
 *
 * 获取用户信息
 *
 * @version        2017年6月21日Z DeanChina $
 * @package        DeanChina
 * @copyright      Copyright (c) 2017 - 永久, DeanChina, Inc.
 */

function get_agent(){
	return $_SERVER['HTTP_USER_AGENT'];
}

function get_broswer(){  
     $agent = get_agent();
     $browser_val = "";//未知
     $brower = array(
        'Firefox' => 'Firefox\/([^;)]+)+',  
        'QQBrowser' => 'QQBrowser\/([\d\.\_]+)',  
        'UCBrowser' => 'UCBrowser\/([\d\.\_]+)',  
        'MicroMessenger' => 'MicroMessenger\/([\d\.\_]+)',
        'MiuiBrowser' => 'MiuiBrowser\/([\d\.\_]+)',
        'baiduBrowser' => 'baiduBrowser\/([\d\.\_]+)',
        'SogouMobileBrowser' => 'SogouMobileBrowser\/([\d\.\_]+)',
        'baiduboxapp' => 'baiduboxapp\/([\d\.\_]+)',
        'LieBaoFast' => 'LieBaoFast\/([\d\.\_]+)',
        'VivoBrowser' => 'VivoBrowser\/([\d\.\_]+)',
        'Maxthon' => 'Maxthon\/([\d\.\_]+)',
        'Android.Thunder' => 'Android.Thunder',
        'MSIE' => 'MSIE ([\d\.\_]+)',  
        'Edge' => 'Edge\/([\d\.]+)',  	//win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
        'Chrome' => 'Chrome\/([\d\.]+)',  //Chrome浏览器 使用了Safari标记，一定要在Safari之前验证
        'CriOS' => 'CriOS\/([\d\.]+)',
        'Opera' => 'Opera',  
        'OPR' => 'Opera',  
        'Safari' => 'Safari',
        'Trident' => 'Trident\/([\d\.\_]+)'
    );
    foreach($brower as $bro => $val){
    	if (preg_match('/'.$bro.'/i',$agent)) {
    		$brower_val = $bro;
    		if(preg_match('/'.$val.'/i',$agent,$m)){  
            	$browser_val = $bro." ".$m[1];  
            	break;  
        	}
        	break;
    	}
        else{
        	$brower_val = "未知浏览器";
        }
    }
    return $browser_val;
}  

function get_os(){  
	$agent = get_agent();
	$system_val = "";//未知
	$facility_val = "";
	$system = array(  
        'Windows Phone' => array('Windows Phone ([\d\.\_]+)'=>''),
        'Android' => array('Android ([\d\.\_]+)'=>''),
        'iPhone' => array('iPhone OS ([\d\.\_]+)'=>''),
        'iPad' => array('OS ([\d\.\_]+)'=>''),
        'win' => array('95'=>'95','4.90'=>'ME','98'=>'98','nt 6.0'=>'Vista','nt 6.1'=>'7','nt 6.2'=>'8','nt 10.0'=>'10','nt 5.1'=>'XP','nt 5'=>'2000','nt'=>'NT','32'=>'32'),
        'Mac' => array('Mac OS X ([\d\.\_]+)'=>'')
    );
    foreach($system as $sys => $val){  
        if (preg_match('/'.$sys.'/i',$agent)){
        	$system_val = $sys;
	        foreach ($val as $key => $value) {
	        	if(preg_match('/'.$key.'/i',$agent,$m)){
	            $system_val = $sys." ".$value.$m[1];
	            $system_val = str_ireplace('win','Windows',$system_val);
	            $system_val = str_ireplace('_', '.', $system_val);
	            break;    
	        	}
	        }
	        break;
        }
        else{
        	$system_val = "未知操作系统";
        }
    }

    //获取移动设备品牌
    $facility = array(
    	'vivo' => 'vivo ([A-Za-z\d]+)',
    	'OPPO' => 'OPPO ([A-Za-z\d]+)',
    	'iPhone' => 'iPhone ([A-Za-z\d]+);',
    	'iPad' => 'iPad ([A-Za-z\d]+);',
    	'SM' => 'SM-([A-Za-z\d]+)',
    	'XiaoMi' => 'zh-cn; ([A-Za-z\d]+) ([A-Za-z\d]+)',
    	'Hisense' => 'Hisense ([A-Za-z\d]+)',
    	'HUAWEI' => 'HUAWEI ([A-Za-z\d]+)',
    	'Win' => 'win',
    	'Mac' => 'mac'
    );
    foreach ($facility as $fac => $val) {
    	if (preg_match('/'.$fac.'/i',$agent)){
    		$facility_val = $fac;
	        if(preg_match('/'.$val.'/i',$agent,$m)){
	        	$facility_val = $fac." ".$m[1]." ".$m[2];
	        	break;    
	        }
	    	break;
        }
        else{
        	$facility_val = "未知设备";
        }
    }
    return $system_val."/".$facility_val;    
}

function get_realip() {
        if (getenv('HTTP_CLIENT_IP'))
        {
            $ip = getenv('HTTP_CLIENT_IP');
        } 
        elseif (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } 
        elseif (getenv('REMOTE_ADDR'))
        {
            $ip = getenv('REMOTE_ADDR');
        } 
        else
        {
            $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
        }
        return $ip;
}

function get_ip(){
    $ip = $_SERVER["REMOTE_ADDR"];
    return $ip;
}

//为了测试GitHub能否顺利的更新