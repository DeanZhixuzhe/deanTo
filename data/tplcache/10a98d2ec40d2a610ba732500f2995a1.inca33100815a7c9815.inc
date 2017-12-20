<?php
$z[0]=Array("id","\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['description'])){\r\n    @me=\$row['description'];\r\n}else{\r\n    if(\$row['sortrank']<50){\r\n        @me=\$row['typename'];\r\n    }elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n        @me=\$row['typename'].'攻略包括'.\$row['typename'].'策划、'.\$row['typename'].'视频、'.\$row['typename'].'价格、'.\$row['typename'].'方案等，更多'.\$row['typename'].'多少钱、创意、布置、歌曲等信息尽在TheOne求婚策划公司。';\r\n    }\r\n}",0,590);
$z[0][4]['runphp']="yes";

?>