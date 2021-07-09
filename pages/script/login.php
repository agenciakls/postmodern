<?php 
$campos = array("usuario", "senha");
if (verif_campo($campos)) {
	defineCampo($campos);
	$verifUser = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' && senha='%s' OR email='%s' && senha='%s'", $usuario, $senha, $usuario, $senha));
	if ((quantityData($verifUser)) == 1) { 
		while ($impUser = fetchData($verifUser)) {
			if ($impUser['email_status'] == 'confirmado') {
				salvarPedidos($impUser['id']);
				$usuario = $impUser['usuario'];
				$loggon = logarUsuario($usuario, $senha); 
				if ($loggon) {
					echo 'conectado';
				} 
				else { echo 'nao_conectado'; }
			}
			else { echo 'nao_confirmado'; }
		}
	}
	else { echo 'nao_conectado'; }
}
else {
	echo 'erro';
}
?>