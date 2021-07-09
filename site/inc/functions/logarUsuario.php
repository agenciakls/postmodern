<?php
function logarUsuario($usuario, $senha) {
	$log = false;
	global $conectar;
	$verificarUsuario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' AND senha='%s'", $usuario, $senha));
	if ((mysqli_num_rows($verificarUsuario)) == 1) { while ($impUser = mysqli_fetch_array($verificarUsuario)) { 
		setcookie('usuario', $usuario, time()+60*60*24*3, '/');
		setcookie('senha', $senha, time()+60*60*24*3, '/');
		$log = true;
	}}
	return $log;
}
?>