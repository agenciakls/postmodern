<?php
function registrarAcao($nome, $detalhe) {
	global $conectar;
	date_default_timezone_set("Brazil/East");
	$dataAtual = date("Y-m-d H:i:s");
	$data_hora = strftime("%Y-%m-%d %H:%M:%S", strtotime($dataAtual));
	$inserirRegistro = mysqli_query($conectar, sprintf("INSERT INTO registro (nome, detalhe, data_hora) VALUES ('%s', '%s', '%s')", $nome, $detalhe, $data_hora));
}
?>