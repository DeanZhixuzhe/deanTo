<?php
$z[0]=Array("field","",110,129);
$z[0][4]['name']="title";
$z[1]=Array("global","",132,158);
$z[1][4]['name']="cfg_webname";
$z[2]=Array("field","",199,221);
$z[2][4]['name']="keywords";
$z[3]=Array("field","",261,312);
$z[3][4]['name']="description";
$z[3][4]['function']="html2text(@me)";
$z[4]=Array("include","",318,355);
$z[4][4]['filename']="meta_m.htm";
$z[5]=Array("field","\r\n            		\$con = '';\r\n            		\$arr = explode('/>',@me);\r\n            		foreach(\$arr as \$v){\r\n            			\$con .= strpos(\$v,'<img')!==false ? '<li>'.\$v.'/></li>' : '';\r\n            		}\r\n            		@me = \$con;\r\n            	",712,1000);
$z[5][4]['name']="body";
$z[5][4]['runphp']="yes";
$z[6]=Array("field","",1049,1068);
$z[6][4]['name']="title";
$z[7]=Array("field","",1121,1144);
$z[7][4]['name']="trueprice";
$z[8]=Array("field","",3193,3211);
$z[8][4]['name']="body";

?>