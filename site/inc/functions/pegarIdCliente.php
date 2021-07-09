<?php
function pegarIdCliente() {
	$get = false;
	global $conectar;
	if (isset($_COOKIE['usuario']) && isset($_COOKIE['senha'])) {
		$dataUser = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' AND senha='%s'", $_COOKIE['usuario'], $_COOKIE['senha']));
		if ((mysqli_num_rows($dataUser)) == 1) { while ($impUser = mysqli_fetch_array($dataUser)) {  
			$get = $impUser['id'];
		} }
	}
	return $get;
}
?>