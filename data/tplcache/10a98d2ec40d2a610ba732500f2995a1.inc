[field:id runphp='yes']
global $dsql; 
$row = $dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); 
if(!empty($row['description'])){
    @me=$row['description'];
}else{
    if($row['sortrank']<50){
        @me=$row['typename'];
    }elseif($row['sortrank']>50 and $row['sortrank']<100){
        @me=$row['typename'].'攻略包括'.$row['typename'].'策划、'.$row['typename'].'视频、'.$row['typename'].'价格、'.$row['typename'].'方案等，更多'.$row['typename'].'多少钱、创意、布置、歌曲等信息尽在TheOne求婚策划公司。';
    }
}[/field:id]