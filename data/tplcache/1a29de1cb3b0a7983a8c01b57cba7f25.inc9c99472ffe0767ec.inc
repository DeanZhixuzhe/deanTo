<?php
$z[0]=Array("id","\r\n						global \$cfg_Cs, \$dsql;\r\n						\$dsql->Execute('mbidss',\"SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' \");\r\n						while (\$mbid = \$dsql->GetArray('mbidss')) {\r\n        	\$mbids .= \$mbid['id'] . ',';\r\n        }\r\n					",0,260);
$z[0][4]['runphp']="yes";

?>