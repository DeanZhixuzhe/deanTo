<?php
$z[0]=Array("global","",145,171);
$z[0][4]['name']="cfg_webname";
$z[1]=Array("field","",212,234);
$z[1][4]['name']="keywords";
$z[2]=Array("field","",274,325);
$z[2][4]['name']="description";
$z[2][4]['function']="html2text(@me)";
$z[3]=Array("include","",331,366);
$z[3][4]['filename']="meta.htm";
$z[4]=Array("include","",385,422);
$z[4][4]['filename']="header.htm";
$z[5]=Array("arclist","\r\n		<a href=\"[field:arcurl/]\" title=\"[field:title/]\" target=\"_blank\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"><span>[field:title/]</span></a>",1502,1715);
$z[5][4]['typeid']="14";
$z[5][4]['row']="6";
$z[5][4]['titlelen']="60";
$z[6]=Array("arclist","\r\n		<dl>\r\n			<dd class=\"tit\"><a href=\"[field:arcurl/]\" target=\"_blank\">[field:title/]</a></dd>\r\n			<dt><a href=\"[field:arcurl/]\" target=\"_blank\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></dt>\r\n			<dd class=\"pri\"><em>¥[field:trueprice/][field:truepricemax runphp=\"yes\"]if(empty(@me)){@me=\"\";}else{@me=\" - \".@me;}[/field:truepricemax]</em><span><a href=\"\">预定</a></span></dd>\r\n		</dl>",1796,2307);
$z[6][4]['typeid']="22";
$z[6][4]['row']="8";
$z[6][4]['titlelen']="60";
$z[6][4]['addfields']="truepricemax,trueprice";
$z[6][4]['channelid']="6";
$z[7]=Array("include","",2326,2363);
$z[7][4]['filename']="footer.htm";

?>