<?php 
$campos = array("usuario", "senha", "token");
if (verif_campo($campos)) {
	defineCampo($campos);
	$verificarId = mysqli_query($conectar, sprintf("SELECT cliente_id FROM token_email WHERE token='%s' AND status='ativo'", $token));
	if (quantityData($verificarId) == 1) {
		while ($impToken = fetchData($verificarId)) {
			$idCliente = $impToken['cliente_id'];
			$verifUser = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' && senha='%s' OR email='%s' && senha='%s'", $usuario, $senha, $usuario, $senha));
			if ((quantityData($verifUser)) == 1) { 
				while ($impUser = fetchData($verifUser)) {
					if ($impUser['email_status'] == 'nao_confirmado') {
						mysqli_query($conectar, sprintf("UPDATE clientes SET email_status='confirmado' WHERE id='%s'", $impUser['id']));
						mysqli_query($conectar, sprintf("UPDATE token_email SET status='inativo' WHERE token='%s'", $token));
						if ($idCliente == $impUser['id']) {
							$usuario = $impUser['usuario'];
							$loggon = logarUsuario($usuario, $senha); 
							if ($loggon) {
								echo 'conectado';
							} 
							else { echo 'nao_conectado'; }
						}
						else { echo 'nao_encontrado'; }
					}
					else { echo 'nao_conectado'; }
				}
			}
			else { echo 'nao_encontrado'; }
		}
	}
	else { echo 'nao_encontrado'; }
}
else {
	echo 'erro';
}
?>