<?php
$z[0]=Array("id","\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['keywords'])){\r\n    @me=\$row['keywords'];\r\n}else{\r\n    if(\$row['sortrank']<50){\r\n        @me=\$row['typename'];\r\n    }elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n        @me=\$row['typename'].','.\$row['typename'].'策划,'.\$row['typename'].'价格,'.\$row['typename'].'视频,'.\$row['typename'].'方案';\r\n    }\r\n}",0,457);
$z[0][4]['runphp']="yes";

?>