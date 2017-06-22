<?php
/**
 *
 * 浪漫档案表
 *
 * @version        $Id: diy.php 1 15:38 2010年7月8日Z tianya $
 * @package        DedeCMS.Site
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/../include/common.inc.php");
require_once("../custom/getuserinfo.php");
$action = $_GET['action'];
$t = isset($t) && is_numeric($t) ? $t : 0;
$ctime = strtotime(date('Y-m-d H:i:s'));
$broswer = get_broswer();
$os = get_os();
$ip = get_ip();
$realip = get_realip();
$agent = get_agent();

/*----------------------------
function Post(){ }
---------------------------*/

if (empty($action)) {
    showMsg('输入的网址有误', 'javascript:;');
    exit();
}
else {
    $action = in_array($action, array('post', 'list', 'view')) ? $action : 'post';
}

if ($action == 'post')
{
    if(empty($do))
    {
        if ($t == 0) {
            include DEDEROOT."/templets/plus/romanticfile.htm";
            exit();
        }elseif ($t == 1) {
            include DEDEROOT."/templets/plus/romanticfile_m.htm";
            exit();
        }else{
            echo "<script type='text/javascript'>window.location.href='/plus/romanticfile.php?action=post&t=1'</script>";
            exit();
        }
    }
    elseif($do == 2)
    {
        $query = "INSERT INTO `#@__romanticfile` (`rf_id`, `ctime`, `youname`, `hename`, `youage`, `heage`, `youprofession`, `heprofession`, `youphone`, `hephone`, `youqq`, `heqq`, `youaddress`, `headdress`, `hehobby`, `commonhobby`, `hespeciality`, `youspeciality`, `flower`, `color`, `style`, `star`, `song`, `movie`, `cartoon`, `experience`, `memorable`, `travel`, `place`, `wish`, `gift`, `photo50`, `romantictheme`, `cause`, `infosource`, `romanticcity`, `romantictool`, `proposedscenario`, `proposerequire`, `proposalform`, `isromanticmatter`, `proposebudget`, `proposetime`,`broswer`,`os`,`ip`,`realip`,`agent`)  VALUES (null,'$ctime','$youname','$hename','$youage','$heage','$youprofession','$heprofession','$youphone','$hephone','$youqq','$heqq','$youaddress','$headdress','$hehobby','$commonhobby','$hespeciality','$youspeciality','$flower','$color','$style','$star','$song','$movie','$cartoon','$experience','$memorable','$travel','$place','$wish','$gift','$photo50','$romantictheme','$cause','$infosource','$romanticcity','$romantictool','$proposedscenario','$proposerequire','$proposalform','$isromanticmatter','$proposebudget','$proposetime','$broswer','$os','$ip','$realip','$agent'); ";
        if($dsql->ExecuteNoneQuery($query)){
            showMsg('提交成功', '/index.php',0,3000);
        }
    }
}

// if($action == 'post')
// {
    
// }
/*----------------------------
function list(){ }
---------------------------*/
else if($action == 'list')
{
    if(empty($diy->public))
    {
        showMsg('后台关闭前台浏览', 'javascript:;');
        exit();
    }
    include_once DEDEINC.'/datalistcp.class.php';
    if($diy->public == 2)
        $query = "SELECT * FROM `{$diy->table}` ORDER BY id DESC";
    else
        $query = "SELECT * FROM `{$diy->table}` WHERE ifcheck=1 ORDER BY id DESC";

    $datalist = new DataListCP();
    $datalist->pageSize = 10;
    $datalist->SetParameter('action', 'list');
    $datalist->SetParameter('diyid', $diyid);
    $datalist->SetTemplate(DEDEINC."/../templets/plus/{$diy->listTemplate}");
    $datalist->SetSource($query);
    $fieldlist = $diy->getFieldList();
    $datalist->Display();
}
else if($action == 'view')
{
    if(empty($diy->public))
    {
        showMsg('后台关闭前台浏览' , 'javascript:;');
        exit();
    }

    if(empty($id))
    {
        showMsg('非法操作！未指定id', 'javascript:;');
        exit();
    }
    if($diy->public == 2)
    {
        $query = "SELECT * FROM {$diy->table} WHERE id='$id' ";
    }
    else
    {
        $query = "SELECT * FROM {$diy->table} WHERE id='$id' AND ifcheck=1";
    }
    $row = $dsql->GetOne($query);

    if(!is_array($row))
    {
        showmsg('你访问的记录不存在或未经审核', '-1');
        exit();
    }

    $fieldlist = $diy->getFieldList();
    include DEDEROOT."/templets/plus/{$diy->viewTemplate}";
}