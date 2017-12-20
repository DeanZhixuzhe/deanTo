[field:id runphp='yes']
global $dsql; 
$row = $dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); 
if(!empty($row['keywords'])){
    @me=$row['keywords'];
}else{
    if($row['sortrank']<50){
        @me=$row['typename'];
    }elseif($row['sortrank']>50 and $row['sortrank']<100){
        @me=$row['typename'].','.$row['typename'].'策划,'.$row['typename'].'价格,'.$row['typename'].'视频,'.$row['typename'].'方案';
    }
}[/field:id]