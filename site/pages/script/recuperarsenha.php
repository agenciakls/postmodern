<?php 
if (isset($_POST['usuario'])) {
	$usuarioEmail = $_POST['usuario'];
	$args = array(
		'table' => 'clientes',
		'or' => array(
			'usuario' => $usuarioEmail,
			'email' => $usuarioEmail
		)
	);
	$pegarUsuario = getData( $args );
	$quantidade = quantityData( $pegarUsuario );
	if ( $quantidade == 1 ) {
		while ($impUsuario = fetchData($pegarUsuario)) {
			$tokenGerado = idUnica();
			$recuperacao = mysqli_query($conectar, sprintf("INSERT INTO token_senha (cliente_id, token, status) VALUES ('%s', '%s', 'ativo') ", $impUsuario['id'], $tokenGerado));
			if ($recuperacao) {
				echo 'enviado';
				$argsEmail = array(
					'titulo' => 'Recuperar Senha - Post Mastering', 
					'type' => 'senha',
					'destinatario' => array(
						'nome' => $impUsuario['nome'],
						'email' => $impUsuario['email'],
						'token' => $tokenGerado
					), 
					'remetente' => array(
						'nome' => 'Post Modern Mastering', 
						'email' => 'no-reply@postmodernmastering.com'
					),
				);
				sendmail($argsEmail);
			}
			else {
				echo 'nao_gerado';
			}
		}
	}
	else { echo 'nao_existe'; }
}
else {echo 'nao_existe'; }
?>