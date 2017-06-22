[field:id runphp="yes"]
						global $cfg_Cs, $dsql;
						$reid = $dsql->GetOne("SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' ");
						if($reid != 0){
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%$redi%' ");
						}else{
							$dsql->Execute('mbidss',"SELECT id FROM dede_arctype WHERE reid LIKE '%$@me%' ");
						}
						while ($mbid = $dsql->GetArray('mbidss')) {
        					$mbids .= $mbid['id'] . ',';
        				}
        				$mbidsnew = substr($mbids,0,strlen($mbdis)-1);
        				if ($mbids !='') {
        					$sql = 'SELECT typename,typedir FROM dede_arctype WHERE id IN (' . $mbidsnew . ')';
							$dsql->Execute('me', $sql);
							while ($row = $dsql->GetArray('me')) {
								$s .= '<li><a href="' . str_replace('{cmspath}','',$row['typedir']) . '/">' . $row['typename'] . '</a></li>';
        					}
        				}
        				@me = $mbids;
					[/field:id]