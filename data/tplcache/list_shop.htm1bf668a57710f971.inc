<?php
$z[0]=Array("global","",236,264);
$z[0][4]['name']="cfg_soft_lang";
$z[1]=Array("field","",277,296);
$z[1][4]['name']="title";
$z[2]=Array("global","",297,323);
$z[2][4]['name']="cfg_webname";
$z[3]=Array("field","",364,393);
$z[3][4]['name']="keywords";
$z[4]=Array("field","",433,491);
$z[4][4]['name']="description";
$z[4][4]['function']="html2text(@me)";
$z[5]=Array("global","",509,541);
$z[5][4]['name']="cfg_templets_skin";
$z[6]=Array("global","",671,699);
$z[6][4]['name']="cfg_mobileurl";
$z[7]=Array("field","",713,729);
$z[7][4]['name']="id";
$z[8]=Array("global","",1198,1226);
$z[8][4]['name']="cfg_mobileurl";
$z[9]=Array("field","",1240,1256);
$z[9][4]['name']="id";
$z[10]=Array("include","",1377,1412);
$z[10][4]['filename']="head.htm";
$z[11]=Array("field","",1548,1577);
$z[11][4]['name']="position";
$z[12]=Array("list","\r\n				<li>\r\n      				[field:array runphp='yes']@me = (empty(@me['litpic']) ? \"\" : \"<a href='{@me['arcurl']}' class='preview'><img src='{@me['litpic']}'/></a>\"); [/field:array]\r\n					<a href=\"[field:arcurl/]\" class=\"title\">[field:title/]</a>\r\n					<span class=\"info\">\r\n						<small>日期：</small>[field:pubdate function=\"GetDateTimeMK(@me)\"/]\r\n						<small>价格：</small>[field:trueprice/]\r\n						<small>品牌：</small>[field:brand/]\r\n						<small>人气：</small>[field:click/]\r\n					</span>\r\n					<p class=\"intro\">\r\n						[field:description/]...\r\n					</p>\r\n				</li>\r\n	",1650,2268);
$z[12][4]['pagesize']="10";
$z[13]=Array("pagelist","",2365,2436);
$z[13][4]['listitem']="info,index,end,pre,next,pageno";
$z[13][4]['listsize']="5";
$z[14]=Array("channel","\r\n		<li><a href='[field:typeurl/]'>[field:typename/]</a></li>",2688,2867);
$z[14][4]['type']="son";
$z[14][4]['currentstyle']="<li><a href='~typelink~' class='thisclass'>~typename~</a></li>";
$z[15]=Array("mda","",2972,3002);
$z[15][4]['name']="250x250_SSP";
$z[16]=Array("arclist","\r\n						<li>\r\n							<a href=\"[field:arcurl/]\">[field:title/]</a>\r\n							<span><small>好评:</small>[field:scores/]</span>\r\n							<span><small>人气:</small>[field:click/]</span>\r\n						</li>\r\n                    ",3158,3431);
$z[16][4]['flag']="c";
$z[16][4]['titlelen']="42";
$z[16][4]['row']="8";
$z[17]=Array("arclist","\r\n						<li>\r\n							<a href=\"[field:arcurl/]\" class=\"preview\"><img src=\"[field:litpic/]\" alt=\"[field:title function='html2text(@me)'/]\"/></a>\r\n							<a href=\"[field:arcurl/]\" class=\"title\">[field:title/]</a>\r\n							<span class=\"intro\">人气:<span class=\"fc-f90\">[field:click/]</span></span>\r\n						</li>\r\n                    ",3636,4029);
$z[17][4]['row']="10";
$z[17][4]['orderby']="click";
$z[17][4]['type']="image.";
$z[18]=Array("mda","",4132,4158);
$z[18][4]['name']="250x250";
$z[19]=Array("mda","",4261,4286);
$z[19][4]['name']="728x90";
$z[20]=Array("include","",4294,4331);
$z[20][4]['filename']="footer.htm";

?>