[field:id runphp="yes"]
						global $cfg_Cs, $dsql;
						$dsql->GetOne('mbidss',"SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' ");
						while ($mbid = $dsql->GetArray('mbidss')) {
        	$mbids .= $mbid['reid'] . ',';
        }@me = $mbids;
					[/field:id]