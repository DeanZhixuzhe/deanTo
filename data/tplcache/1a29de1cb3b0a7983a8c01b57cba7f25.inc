[field:id runphp="yes"]
						global $cfg_Cs, $dsql;
						$dsql->Execute('mbidss',"SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' ");
						while ($mbid = $dsql->GetArray('mbidss')) {
        	$mbids .= $mbid['id'] . ',';
        }
					[/field:id]