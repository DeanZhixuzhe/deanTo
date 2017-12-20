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
$z[4]=Array("include","",319,356);
$z[4][4]['filename']="meta_m.htm";
$z[5]=Array("field","",574,603);
$z[5][4]['name']="typename";
$z[6]=Array("list","\r\n		<li class=\"view\">\r\n            <a href=\"/m[field:arcurl/]\">\r\n                <div class=\"pic\">\r\n                    <img src=\"[field:litpic/]\">\r\n                    <div class=\"cont\">\r\n						<span class=\"price\">¥<em>[field:trueprice/]</em>起</span>\r\n					</div>\r\n                    <div class=\"clear\"></div>\r\n                </div>\r\n                <div class=\"con\">\r\n                    <h5>[field:title/]</h5>\r\n                    <p>[field:description function='cn_substr(@me,250)' /]...</p>\r\n                </div>\r\n            </a>\r\n        </li>",676,1272);
$z[6][4]['pagesize']="150";
$z[7]=Array("include","",1348,1387);
$z[7][4]['filename']="footer_m.htm";

?>