<?php
$z[0]=Array("id","\r\n						global \$cfg_Cs, \$dsql;\r\n						\$dsql->GetOne('mbidss',\"SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' \");\r\n						while (\$mbid = \$dsql->GetArray('mbidss')) {\r\n        	\$mbids .= \$mbid['reid'] . ',';\r\n        }@me = \$mbids;\r\n					",0,274);
$z[0][4]['runphp']="yes";

?>