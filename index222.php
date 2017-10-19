<?php
header('Content-Type: text/html; charset=utf-8');
$abc = 101;
if ($abc>100 and $abc<200) {
	echo $abc;
}

$arr = [
	'分类' => [
		'求婚','表白','生日'
	],
	'地区' => [
		'重庆','北京','上海'
	],
	'场景' => [
		'电影院','KTV','酒吧'
	],
	
];
foreach ($arr as $key => $value) {
	foreach ($value as $v) {
		if (strpos('酒吧求婚策划',$v)!==false) {
			switch($key){
				case "地区":
					echo $key.'：'.$v;
					break;
				case "场景":
					echo $key.'：'.$v;;
					break;
			}
		}
	}
}