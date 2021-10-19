<?php 
$campos = array("usuario", "senha");
$jsonResponse = array('status' => 'erro', 'response' => 'Houve algum erro');
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
					$jsonResponse['status'] = 'conectado';
				} 
			}
		}
	}
}
echo json_encode($jsonResponse);
?>