<?php
if(!defined('DEDEINC')){
    exit("Request Error!");
}
/**
 * 这仅是一个演示标签
 *
 * @version        $Id: demotag.lib.php 1 9:29 2010年7月6日Z tianya $
 * @package        DedeCMS.Taglib
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
 
/*>>dede>>
<name>演示标签</name>
<type>全局标记</type>
<for>V55,V56,V57</for>
<description>这仅是一个演示标签</description>
<demo>
{dede:demotag /}
</demo>
<attributes>
</attributes> 
>>dede>>*/
 
function lib_tags(&$ctag,&$refObj)
{
    global $dsql,$envs;
    
    //属性处理
    $attlist="id|0,tagdir|0";
    FillAttsDefault($ctag->CAttribute->Items,$attlist);
    extract($ctag->CAttribute->Items, EXTR_SKIP);
    $revalue = '';
    
    $innertext = trim($ctag->GetInnerText());

    // $tagid = $refObj->Fields['id'];
    // $tagdir = $refObj->Fields['tagdir'];  
    if (empty($refObj->Fields['tagdir'])) {
        $row = $dsql->GetOne("SELECT id,tag,typeid,total,tagdir FROM `#@__tagindex` WHERE id='$refObj->Fields['id']' ");
    }else{
        $row = $dsql->GetOne("SELECT id,tag,typeid,total,tagdir FROM `#@__tagindex` WHERE tagdir like '$tagdir' ");
    }
    
    if(!is_array($row)) return '';	//判断返回数组是否为空

    $dtp = new DedeTagParse();
    $dtp->SetNameSpace('field','[',']');
    //获取底层模版
    $dtp->LoadSource($innertext);	
    foreach($dtp->CTags as $tagid=>$ctag)
    {
        if(isset($row[$ctag->GetName()])) $dtp->Assign($tagid,$row[$ctag->GetName()]);
    }
    //根据底层模板及查询变量得到处理结果
    $revalue = $dtp->GetResult();
    
    return $revalue;
}