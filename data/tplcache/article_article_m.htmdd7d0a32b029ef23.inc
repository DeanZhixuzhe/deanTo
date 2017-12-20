<?php
$z[0]=Array("field","",110,129);
$z[0][4]['name']="title";
$z[1]=Array("type","[field:id runphp=\"yes\"]global \$dsql;\$row = \$dsql->GetOne(\"SELECT typename FROM dede_arctype WHERE id = \".@me);if(strpos(\$row['typename'],'求婚')===false){@me='TheOne浪漫策划公司';}else{@me='TheOne求婚策划公司';}[/field:id]",132,391);
$z[2]=Array("field","",432,454);
$z[2][4]['name']="keywords";
$z[3]=Array("field","",494,545);
$z[3][4]['name']="description";
$z[3][4]['function']="html2text(@me)";
$z[4]=Array("include","",551,588);
$z[4][4]['filename']="meta_m.htm";
$z[5]=Array("field","",2173,2193);
$z[5][4]['name']="litpic";
$z[6]=Array("field","",2489,2508);
$z[6][4]['name']="title";
$z[7]=Array("field","",2533,2585);
$z[7][4]['name']="pubdate";
$z[7][4]['function']="MyDate('Y-m-d',@me)";
$z[8]=Array("field","",2759,2778);
$z[8][4]['name']="click";
$z[9]=Array("field","",2850,2868);
$z[9][4]['name']="body";
$z[10]=Array("include","",2890,2929);
$z[10][4]['filename']="footer_m.htm";

?>