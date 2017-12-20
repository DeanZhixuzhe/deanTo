<?php
$z[0]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['seotitle'])){\r\n	@me=\$row['seotitle'];\r\n}else{\r\n	if(\$row['sortrank']<50){\r\n		@me=\$row['typename'];\r\n	}elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n		@me=\$row['typename'].'_'.\$row['typename'].'策划_'.\$row['typename'].'价格_'.\$row['typename'].'视频';\r\n	}\r\n}[/field:id]",124,553);
$z[1]=Array("global","",556,582);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['keywords'])){\r\n	@me=\$row['keywords'];\r\n}else{\r\n	if(\$row['sortrank']<50){\r\n		@me=\$row['typename'];\r\n	}elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n		@me=\$row['typename'].','.\$row['typename'].'策划,'.\$row['typename'].'价格,'.\$row['typename'].'视频,'.\$row['typename'].'方案';\r\n	}\r\n}[/field:id]",623,1079);
$z[3]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['description'])){\r\n	@me=\$row['description'];\r\n}else{\r\n	if(\$row['sortrank']<50){\r\n		@me=\$row['typename'];\r\n	}elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n		@me=\$row['typename'].'攻略包括'.\$row['typename'].'策划、'.\$row['typename'].'视频、'.\$row['typename'].'价格、'.\$row['typename'].'方案等，更多'.\$row['typename'].'多少钱、创意、布置、歌曲等信息尽在TheOne求婚策划公司。';\r\n	}\r\n}[/field:id]",1119,1708);
$z[4]=Array("global","",1742,1769);
$z[4][4]['name']="cfg_basehost";
$z[5]=Array("field","global \$dsql;\$dir = \$dsql->GetOne(\"SELECT typedir FROM dede_arctype WHERE id = \".@me);@me=str_replace('{cmspath}','',\$dir['typedir']).'/';",1769,1952);
$z[5][4]['name']="id";
$z[5][4]['runphp']="yes";
$z[6]=Array("include","",1956,1991);
$z[6][4]['filename']="meta.htm";
$z[7]=Array("include","",2010,2047);
$z[7][4]['filename']="header.htm";
$z[8]=Array("field","",2094,2123);
$z[8][4]['name']="position";
$z[9]=Array("field","",2213,2242);
$z[9][4]['name']="typename";
$z[10]=Array("list","\r\n				<li>\r\n					<div class=\"piczy_l\"><a hrfe=\"[field:arcurl/]\" target=\"_blank\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></div>\r\n					<div class=\"piczy_r\"><a href=\"[field:arcurl/]\" target=\"_blank\">[field:title/]</a><span>时间：[field:pubdate function=\"MyDate('Y-m-d',@me)\"/] 浏览：[field:click/]</span><p>[field:description function='cn_substr(@me,250)' /]...</p></p></div>\r\n				</li>",2282,2722);
$z[10][4]['pagesize']="15";
$z[11]=Array("type","\r\n					[field:id runphp=\"yes\"]\r\n						global \$dsql;\r\n						\$reid = \$dsql->GetOne(\"SELECT reid,sortrank FROM dede_arctype WHERE id LIKE '%@me%' \");\r\n						if(\$reid['sortrank'] < 50){\r\n							\$where = \"sortrank < 50\";\r\n						}\r\n						if(\$reid['sortrank'] > 50 AND \$reid['sortrank'] < 100){\r\n							\$where = \"sortrank > 50 AND sortrank < 100\";\r\n						}\r\n						if(\$reid['sortrank'] > 100 AND \$reid['sortrank'] < 150){\r\n							\$where = \"sortrank > 100 AND sortrank < 150\";\r\n						}\r\n						if(\$reid['sortrank'] > 900){\r\n							\$where = \"sortrank < 50\";\r\n						}\r\n						if(\$reid['reid'] != 0){\r\n							\$dsql->Execute('mbidss',\"SELECT id FROM dede_arctype WHERE reid LIKE '%\$reid[reid]%' AND id NOT IN(27) AND \$where\");\r\n						}else{\r\n							\$dsql->Execute('mbidss',\"SELECT id FROM dede_arctype WHERE reid LIKE '%@me%' AND id NOT IN(27) AND \$where\");\r\n						}\r\n						while (\$mbid = \$dsql->GetArray('mbidss')) {\r\n        					\$mbids .= \$mbid['id'] . ',';\r\n        				}\r\n        				\$mbidsnew = substr(\$mbids,0,strlen(\$mbdis)-1);\r\n        				if (\$mbids !='') {\r\n        					\$sql = \"SELECT typename,typedir FROM dede_arctype WHERE id IN (\$mbidsnew) ORDER BY sortrank ASC\";\r\n							\$dsql->Execute('me', \$sql);\r\n							while (\$row = \$dsql->GetArray('me')) {\r\n								\$s .= '<li><a href=\"' . str_replace('{cmspath}','',\$row['typedir']) . '/\">' . \$row['typename'] . '</a></li>';\r\n        					}\r\n        				}\r\n        				@me = \$s;\r\n					[/field:id]\r\n				",2888,4355);
$z[12]=Array("arclist","\r\n				<li><div class=\"piczy_p_l\"><a href=\"[field:arcurl/]\"><img src=\"[field:litpic/]\" title=\"[field:title/]\"></a></div><div class=\"piczy_p_r\"><a href=\"\">[field:title/]</a><p>¥[field:trueprice/][field:truepricemax runphp=\"yes\"]if(empty(@me)){@me=\"\";}else{@me=\" - \".@me;}[/field:truepricemax]</p></div></li>\r\n				",4504,4918);
$z[12][4]['limit']="0,8";
$z[12][4]['channelid']="6";
$z[12][4]['addfields']="trueprice,truepricemax";
$z[12][4]['typeid']="22";
$z[13]=Array("include","",4982,5019);
$z[13][4]['filename']="footer.htm";

?>