<?php 
$jsonResponse = array('status' => false, 'response' => langVar('script-recupera-senha-erro'));

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
				$jsonResponse['status'] = true;
				$jsonResponse['response'] = langVar('script-recupera-senha-recuperacao');
				$argsEmail = array(
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
				sendnotification($argsEmail);
			}
			else { $jsonResponse['status'] = false; }
		}
	}
	else { $jsonResponse['status'] = false; $jsonResponse['response'] = langVar('script-recupera-senha-usuario-nao-existe'); }
}
else {$jsonResponse['status'] = false; $jsonResponse['response'] = lanVar('script-recupera-senha-verifique'); }

echo json_encode($jsonResponse);
