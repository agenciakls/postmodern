<?php 
$campos = array("nome", "sobrenome", "usuario", "email", "telefone", "celular", "senha", "endereco", "pais", "estado", "cidade", "bairro", "cep", "email_status");
$_POST['email_status'] = 'nao_confirmado';
if (verif_campo($campos)) {
	defineCampo($campos);

	$verificarUsuario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s'", $usuario));
	$verificarEmail = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE email='%s'", $email));
	if ( quantityData($verificarUsuario) == 1 ) { echo 'usuario'; }
	else if ( quantityData($verificarEmail) == 1 ) { echo 'email'; }
	else {
		$retorno = adicionarCampos('clientes');
		$idCriada = ultimoIdInserido();
		$retornoPedidos = salvarPedidos($idCriada);
		if ($retorno && $retornoPedidos) {
			$tokenGerado = idUnica();
			$confirmacao = mysqli_query($conectar, sprintf("INSERT INTO token_email (cliente_id, token, status) VALUES ('%s', '%s', 'ativo') ", $idCriada, $tokenGerado));
			if ($confirmacao) {
				$argsEmail = array(
					'titulo' => 'Cadastro Realizado com sucesso - Post Mastering', 
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
				$enviarEmail = sendmail($argsEmail);
				if ($enviarEmail) {
					echo 'salvo';
				}
				else {echo 'nao_enviado';}
			}
			else {
				echo 'nao_gerado';
			}
		}
		else { echo 'nao_salvo'; }
	}
}
else {
	echo 'erro';
}
?>