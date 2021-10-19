<?php 
$campos = array("nome", "sobrenome", "usuario", "email", "telefone", "celular", "senha", "endereco", "pais", "estado", "cidade", "bairro", "cep", "email_status");
$_POST['email_status'] = 'nao_confirmado';
$jsonResponse = array('status' => 'erro', 'response' => 'houve algum erro');
if (verif_campo($campos)) {
	defineCampo($campos);
	$verificarUsuario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s'", $usuario));
	$verificarEmail = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE email='%s'", $email));
	if ( quantityData($verificarUsuario) == 1 ) { $jsonResponse['status'] = 'usuario'; }
	else if ( quantityData($verificarEmail) == 1 ) { $jsonResponse['status'] = 'email'; }
	else {
		$retorno = adicionarCampos('clientes');
		$idCriada = ultimoIdInserido();
		$retornoPedidos = salvarPedidos($idCriada);
		if ($retorno && $retornoPedidos) {
			$tokenGerado = idUnica();
			$confirmacao = mysqli_query($conectar, sprintf("INSERT INTO token_email (cliente_id, token, status) VALUES ('%s', '%s', 'ativo') ", $idCriada, $tokenGerado));
			if ($confirmacao) {
				$argsEmail = array(
					'type' => 'email', 
					'destinatario' => array(
						'nome' => $nome,
						'email' => $email,
						'token' => $tokenGerado
					), 
					'remetente' => array(
						'nome' => 'Post Modern Mastering', 
						'email' => 'no-reply@postmodernmastering.com'
					),
				);
				$jsonResponse['status'] = 'salvo';
				$enviarEmail = sendmail($argsEmail);
				$sendnotification = sendnotification($argsEmail);
			}
		}
	}
}
echo json_encode($jsonResponse);
exit();
?>