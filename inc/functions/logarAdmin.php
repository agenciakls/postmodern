<?php
function logarAdmin($usuario, $senha) {
	$log = false;
	global $conectar;
	$verificarUsuario = mysqli_query($conectar, sprintf("SELECT * FROM admin_usuario WHERE usuario='%s' AND senha='%s'", $usuario, $senha));
	if ((mysqli_num_rows($verificarUsuario)) == 1) { while ($impUser = mysqli_fetch_array($verificarUsuario)) { 
		setcookie('admin_user', $usuario, time()+60*60*24*3, '/');
		setcookie('admin_pass', $senha, time()+60*60*24*3, '/');
		$log = true;
	}}
	return $log;
}
?>