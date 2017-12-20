<?php
$z[0]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['seotitle'])){\r\n    @me=\$row['seotitle'];\r\n}else{\r\n    if(\$row['sortrank']<50){\r\n        @me=\$row['typename'];\r\n    }elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n        @me=\$row['typename'].'_'.\$row['typename'].'策划_'.\$row['typename'].'价格_'.\$row['typename'].'视频';\r\n    }\r\n}[/field:id]",110,563);
$z[1]=Array("global","",566,592);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['keywords'])){\r\n    @me=\$row['keywords'];\r\n}else{\r\n    if(\$row['sortrank']<50){\r\n        @me=\$row['typename'];\r\n    }elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n        @me=\$row['typename'].','.\$row['typename'].'策划,'.\$row['typename'].'价格,'.\$row['typename'].'视频,'.\$row['typename'].'方案';\r\n    }\r\n}[/field:id]",633,1113);
$z[3]=Array("type","[field:id runphp='yes']\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['description'])){\r\n    @me=\$row['description'];\r\n}else{\r\n    if(\$row['sortrank']<50){\r\n        @me=\$row['typename'];\r\n    }elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n        @me=\$row['typename'].'攻略包括'.\$row['typename'].'策划、'.\$row['typename'].'视频、'.\$row['typename'].'价格、'.\$row['typename'].'方案等，更多'.\$row['typename'].'多少钱、创意、布置、歌曲等信息尽在TheOne求婚策划公司。';\r\n    }\r\n}[/field:id]",1153,1766);
$z[4]=Array("include","",1772,1809);
$z[4][4]['filename']="meta_m.htm";
$z[5]=Array("field","",2048,2077);
$z[5][4]['name']="typename";
$z[6]=Array("list","\r\n        <li>\r\n            <a class=\"news\" href=\"/m[field:arcurl/]\">\r\n                <div class=\"pic\">\r\n                    <img src=\"[field:litpic/]\"/>\r\n                </div>\r\n                <div class=\"project_cont\">\r\n                    <h5>[field:title/]</h5>\r\n                </div>\r\n                <div class=\"price\">\r\n                    <p>[field:pubdate function=\"MyDate('Y-m-d',@me)\"/]</p>\r\n                    <span>[field:click/]</span>\r\n                    <i class=\"am-icon-eye\"></i>\r\n                    <div class=\"clear\"></div>\r\n                </div>\r\n            </a>\r\n        </li>\r\n        ",3465,4118);
$z[6][4]['pagesize']="15";
$z[7]=Array("pagelist","",4160,4207);
$z[7][4]['listsize']="5";
$z[7][4]['listitem']="pageno";
$z[8]=Array("include","",4228,4267);
$z[8][4]['filename']="footer_m.htm";

?>