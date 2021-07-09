<?php 
$campos = array("usuario", "senha");
if (verif_campo($campos)) {
	defineCampo($campos);
	$verifUser = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' && senha='%s'", $usuario, $senha));
	if ((mysqli_num_rows($verifUser)) == 1) { 
		$usuario = pegarCampo('usuario');
		$loggon = logarUsuario($usuario, $senha); 
		if ($loggon) {
			echo 'conectado';
		} 
		else { echo 'nao_conectado'; }
	}
	else { echo 'nao_encontrado'; }
}
else {
	echo 'erro';
}
?>