<?php
function getData($args = array()) {
	$returnQuery = false;
	global $conectar;
	if (isset($args['table'])) {
		$condition = (isset($args['where'])) ? $args['where'] : null;
		if ($args['where'] || $args['or']) {
			$vlCondition = ' WHERE ';
		}
		if ($condition) {
			$cont = 1;
			foreach ($condition as $nomeCampo => $valorCampo ) {
				if ($cont > 1) {
					$vlCondition .= ' AND ';
				}
				$vlCondition .= sprintf(" %s='%s' ", $nomeCampo, $valorCampo);
				$cont++;
			}
		}
		$condition = (isset($args['or'])) ? $args['or'] : null;
		if ($condition) {
			$cont = 1;
			foreach ($condition as $nomeCampo => $valorCampo ) {
				if ($cont > 1) {
					$vlCondition .= ' OR ';
				}
				$vlCondition .= sprintf(" %s='%s' ", $nomeCampo, $valorCampo);
				$cont++;
			}
		}
		$returnQuery = mysqli_query($conectar, sprintf("SELECT * FROM %s %s", $args['table'], $vlCondition));
	}
	return $returnQuery;
}
?>