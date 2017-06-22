[field:id runphp="yes"]
						global $cfg_Cs, $dsql;
						$reid = $dsql->GetOne("SELECT reid FROM dede_arctype WHERE id LIKE '%@me%' ");
						@me = $reid['reid'];
					[/field:id]