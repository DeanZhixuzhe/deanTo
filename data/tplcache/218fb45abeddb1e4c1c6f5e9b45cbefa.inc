[field:id runphp="yes"]
						global $dsql;
						$reid = $dsql->GetOne("SELECT reid,sortrank FROM dede_arctype WHERE id LIKE '%@me%' ");
						if($reid['sortrank'] < 50){
							$where = "sortrank < 50";
						}
						if($reid['sortrank'] > 50 AND $reid['sortrank'] < 100){
							$where = "sortrank > 50 AND sortrank < 100";
						}
						if($reid['sortrank'] > 100 AND $reid['sortrank'] < 150){
							$where = "sortrank > 100 AND sortrank < 150";
						}
						if($reid['sortrank'] > 900){
							$where = "sortrank < 50";
						}
						if($reid['reid'] != 0){
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%$reid[reid]%' AND id NOT IN(27) AND $where");
						}else{
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%@me%' AND id NOT IN(27) AND $where");
						}
						while ($mbid = $dsql->GetArray('mbidss')) {
        					$mbids .= $mbid['id'] . ',';
        				}
        				$mbidsnew = substr($mbids,0,strlen($mbdis)-1);
        				if ($mbids !='') {
        					$sql = "SELECT typename,typedir FROM dede_arctype WHERE id IN ($mbidsnew) ORDER BY sortrank ASC";
							$dsql->Execute('me', $sql);
							while ($row = $dsql->GetArray('me')) {
								$s .= '<li><a href="' . str_replace('{cmspath}','',$row['typedir']) . '/">' . $row['typename'] . '</a></li>';
        					}
        				}
        				@me = $s;
					[/field:id]