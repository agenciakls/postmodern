<?php
function formatData($data, $type = 'completo') {
	$dia = strftime("%d", strtotime($data));
	$mes = strftime("%m", strtotime($data));
	$ano = strftime("%Y", strtotime($data));
	$hora = strftime("%H", strtotime($data));
	$minuto = strftime("%M", strtotime($data));
	$segundo = strftime("%S", strtotime($data));
	$nomeMes = nomeMes($mes);
	switch ($type) {
		case 'completo': $dataRetorno = $dia . ' de ' . $nomeMes . ' de ' . $ano . ' - ' . $hora . ':' . $minuto; break;
		case 'data_extenso': $dataRetorno = $dia . ' de ' . $nomeMes . ' de ' . $ano; break;
		case 'data': $dataRetorno = $dia . ' de ' . $nomeMes . ' de ' . $ano; break;
		case 'data_normal': $dataRetorno = $dia . '/' . $mes . '/' . $ano; break;
	}
	return $dataRetorno;
}
?>