<?php
$z[0]=Array("id","\r\nglobal \$dsql; \r\n\$row = \$dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); \r\nif(!empty(\$row['seotitle'])){\r\n	@me=\$row['seotitle'];\r\n}else{\r\n	if(\$row['sortrank']<50){\r\n		@me=\$row['typename'];\r\n	}elseif(\$row['sortrank']>50 and \$row['sortrank']<100){\r\n		@me=\$row['typename'].'_'.\$row['typename'].'策划_'.\$row['typename'].'价格_'.\$row['typename'].'视频';\r\n	}\r\n}",0,406);
$z[0][4]['runphp']="yes";

?>