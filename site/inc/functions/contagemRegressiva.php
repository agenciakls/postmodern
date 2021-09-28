<?php
function contagemRegressiva($dataEvento, $mostrarDados = 'dia') {
	#Informamos as datas e horários de início e fim no formato Y-m-d H:i:s e os convertemos para o formato timestamp
	$dia_hora_atual = strtotime(date("Y-m-d H:i:s"));
	$dia_hora_evento = strtotime(date($dataEvento));

	#Achamos a diferença entre as datas...
	$diferenca = $dia_hora_evento - $dia_hora_atual;

	#Fazemos a contagem...
	$dias = intval($diferenca / 86400);
	$marcador = $diferenca % 86400;
	$hora = intval($marcador / 3600);
	$marcador = $marcador % 3600;
	$minuto = intval($marcador / 60);
	$segundos = $marcador % 60;
	if ($mostrarDados == 'dia') {
		$print = $dias;
	}
	else {
		$print = $dias;
	}
	echo $print;
}
?>