<?php
$z[0]=Array("field","",124,143);
$z[0][4]['name']="title";
$z[1]=Array("global","",146,172);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("field","",213,235);
$z[2][4]['name']="keywords";
$z[3]=Array("field","",275,326);
$z[3][4]['name']="description";
$z[3][4]['function']="html2text(@me)";
$z[4]=Array("include","",332,367);
$z[4][4]['filename']="meta.htm";
$z[5]=Array("include","",386,423);
$z[5][4]['filename']="header.htm";
$z[6]=Array("field","",470,499);
$z[6][4]['name']="position";
$z[7]=Array("list","\r\n			<dl>\r\n				<dd class=\"tit\"><a href=\"[field:arcurl/]\" target=\"_blank\">[field:title/]</a></dd>\r\n				<dt><a href=\"[field:arcurl/]\" target=\"_blank\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></dt>\r\n				<dd class=\"pri\"><em>¥[field:trueprice/][field:truepricemax runphp=\"yes\"]if(empty(@me)){@me=\"\";}else{@me=\" - \".@me;}[/field:truepricemax]</em><span><a href=\"\">预定</a></span></dd>\r\n			</dl>",555,996);
$z[7][4]['pagesize']="15";
$z[8]=Array("arclist","\r\n				<li><div class=\"piczy_p_l\"><a href=\"[field:arcurl/]\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></div><div class=\"piczy_p_r\"><a href=\"\">[field:title/]</a><p>¥[field:trueprice/][field:truepricemax runphp=\"yes\"]if(empty(@me)){@me=\"\";}else{@me=\" - \".@me;}[/field:truepricemax]</p></div></li>\r\n				",1139,1553);
$z[8][4]['limit']="0,8";
$z[8][4]['channelid']="6";
$z[8][4]['addfields']="trueprice,truepricemax";
$z[8][4]['typeid']="22";
$z[9]=Array("include","",1617,1654);
$z[9][4]['filename']="footer.htm";

?>