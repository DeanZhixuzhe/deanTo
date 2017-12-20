[field:id runphp='yes']
global $dsql; 
$row = $dsql->GetOne('SELECT * FROM dede_arctype WHERE id='.@me); 
if(!empty($row['seotitle'])){
    @me=$row['seotitle'];
}else{
    if($row['sortrank']<50){
        @me=$row['typename'];
    }elseif($row['sortrank']>50 and $row['sortrank']<100){
        @me=$row['typename'].'_'.$row['typename'].'策划_'.$row['typename'].'价格_'.$row['typename'].'视频';
    }
}[/field:id]