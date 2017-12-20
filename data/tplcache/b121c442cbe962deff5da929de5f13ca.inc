[field:id runphp="yes"]
						global $cfg_Cs, $dsql;
						$reid = $dsql->GetOne("SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' ");
						if($reid['reid'] != 0){
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%$reid[reid]%' AND id NOT IN(27) AND sortrank < 50");
						}else{
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%@me%' AND id NOT IN(27) AND sortrank < 900");
						}
						while ($mbid = $dsql->GetArray('mbidss')) {
        					$mbids .= $mbid['id'] . ',';
        				}
        				$mbidsnew = substr($mbids,0,strlen($mbdis)-1);
        				if ($mbids !='') {
        					$sql = "SELECT typename,typedir FROM dede_arctype WHERE id IN ($mbidsnew) ORDER BY id ASC";
							$dsql->Execute('me', $sql);
							while ($row = $dsql->GetArray('me')) {
								$s .= '<li><a href="' . str_replace('{cmspath}','',$row['typedir']) . '/">' . $row['typename'] . '</a></li>';
        					}
        				}
        				@me = $s;
					[/field:id]