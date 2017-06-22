<?php
/**
 * @version        $Id: tags.php 1 2010-06-30 11:43:09Z tianya $
 * @package        DedeCMS.Site
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once (dirname(__FILE__) . "/include/common.inc.php");
require_once (DEDEINC . "/arc.taglist.class.php");
$PageNo = 1;

if(isset($_SERVER['QUERY_STRING']))
{
    $tag = trim($_SERVER['QUERY_STRING']);
    $tags = explode('/', $tag);
    if (count($tags) <= 3) {
    	$tag = $tags[1];
    	if(isset($tags[2]) && !empty($tags[2])) $PageNo = intval($tags[2]);
    }else{
	    for ($i=1; $i < count($tags)-1; $i++) { 
	        $url .= $tags[$i]."/";
	    }
	    $tag = substr($url,0,-1);
	    if(!empty(end($tags))) $PageNo = intval(end($tags));
    }
    // if(isset($tags[1])) $tag = $tags[1];
    // if(isset($tags[2]) && !empty($tags[2])) $PageNo = intval($tags[2]);
}
else
{
    $tag = '';
}
// $tag = FilterSearch(urldecode($tag));
$tag = urldecode($tag);
if($tag != addslashes($tag)) $tag = '';		//在每个双引号（"）前添加反斜杠：
if($tag == '') $dlist = new TagList($tag, 'tag.htm');
else $dlist = new TagList($tag, 'taglist.htm');
$dlist->Display();
exit();