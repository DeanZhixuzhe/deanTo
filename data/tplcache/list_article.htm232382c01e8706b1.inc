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
$z[7]=Array("field","",589,618);
$z[7][4]['name']="typename";
$z[8]=Array("list","\r\n				<li>\r\n					<div class=\"piczy_l\"><a href=\"[field:arcurl/]\" target=\"_blank\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></div>\r\n					<div class=\"piczy_r\"><a href=\"[field:arcurl/]\" target=\"_blank\">[field:title/]</a><span>时间：[field:pubdate function=\"MyDate('Y-m-d',@me)\"/] 浏览：[field:click/]</span><p>[field:description function='cn_substr(@me,250)' /]...</p></p></div>\r\n				</li>",658,1098);
$z[8][4]['pagesize']="15";
$z[9]=Array("type","\r\n					[field:id runphp=\"yes\"]\r\n						global \$cfg_Cs, \$dsql;\r\n						\$reid = \$dsql->GetOne(\"SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' \");\r\n						if(\$reid['reid'] != 0){\r\n							\$dsql->Execute('mbidss',\"SELECT id FROM dede_arctype WHERE reid LIKE '%\$reid[reid]%' \");\r\n						}else{\r\n							\$dsql->Execute('mbidss',\"SELECT id FROM dede_arctype WHERE reid LIKE '%@me%' \");\r\n						}\r\n						while (\$mbid = \$dsql->GetArray('mbidss')) {\r\n        					\$mbids .= \$mbid['id'] . ',';\r\n        				}\r\n        				\$mbidsnew = substr(\$mbids,0,strlen(\$mbdis)-1);\r\n        				if (\$mbids !='') {\r\n        					\$sql = 'SELECT typename,typedir FROM dede_arctype WHERE id IN (' . \$mbidsnew . ')';\r\n							\$dsql->Execute('me', \$sql);\r\n							while (\$row = \$dsql->GetArray('me')) {\r\n								\$s .= '<li><a href=\"' . str_replace('{cmspath}','',\$row['typedir']) . '/\">' . \$row['typename'] . '</a></li>';\r\n        					}\r\n        				}\r\n        				@me = \$s;\r\n					[/field:id]\r\n				",1264,2252);
$z[10]=Array("arclist","\r\n				<li><div class=\"piczy_p_l\"><a href=\"[field:arcurl/]\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></div><div class=\"piczy_p_r\"><a href=\"\">[field:title/]</a><p>¥[field:trueprice/][field:truepricemax runphp=\"yes\"]if(empty(@me)){@me=\"\";}else{@me=\" - \".@me;}[/field:truepricemax]</p></div></li>\r\n				",2401,2815);
$z[10][4]['limit']="0,8";
$z[10][4]['channelid']="6";
$z[10][4]['addfields']="trueprice,truepricemax";
$z[10][4]['typeid']="22";
$z[11]=Array("include","",2879,2916);
$z[11][4]['filename']="footer.htm";

?>