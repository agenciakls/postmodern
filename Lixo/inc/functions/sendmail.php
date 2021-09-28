<?php

function sendmail( $args ) {
//	$args = array(
//		'titulo' => 'Recuperar Senha - Post Mastering', 
//		'type' => 'recuperar_senha',
//		'destinatario' => array(
//			'nome' => $impUsuario['nome'],
//			'email' => $impUsuario['email'],
//			'token' => $tokenGerado
//		), 
//		'remetente' => array(
//			'nome' => 'Post Modern Mastering', 
//			'email' => 'no-reply@postmodernmastering.com'
//		),
//	);
	global $basePrincipal;
	switch ($args['type']) {
		case 'email': 
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $args['titulo'] . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Bem-vindo a sua nova conta no site do Post Modern Mastering, recebemos todos os dados e precisamos que você confirme sua conta de e-mail clicando no link abaixo!</p>
				<p>Clique no link abaixo: <br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<p>Se não foi você que fez a inscrição, não clique e nenhuma alteração será feita.</p>
				<p>Obrigado pela sua preferência!</p>
			</div>';
		break;
		case 'senha': 
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $args['titulo'] . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Você enviou para seu e-mail um link de pedido de alteração de senha, para alterar sua senha entre no link abaixo e digite seu nome de usuário e senha.</p>
				<p>Clique no link abaixo: <br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<p>Se houver algum problema entre em contato imediatamente para que possa ser resolvido</p>
				<p>Obrigado pela sua preferência!</p>
			</div>';
		break;
	}
	// multiple recipients
	$to = $args['destinatario']['email'];

	// subject
	$subject = $args['titulo'];

	// message
	$message = '
	<!DOCTYPE html>
	<html>
		<head>
			<title>' . $args['titulo'] . '</title>
			<meta charset="utf-8">
		</head>
		<body>
			<table align="center" width="700" border="0" style="border: none;">
				<tr>
					<td>
						<div style="background-color: #343a40 !important; padding: 15px 10px;">
							<img src="' . $basePrincipal . 'images/title_logo.png" style="display: block; margin: 0px auto;" alt="">
						</div>
						' . $dataContent . '
						<div style="padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\'; text-align: center;">
							<p><a href="http://www.postmodernmastering.com/" target="_blank" style="text-decoration: none; color: #007bff;">www.postmodernmastering.com</a></p>
						</div>
					</td>
				</tr>
			</table>
		</body>
	</html>
	';

	// To send HTML mail, the Content-type header must be set
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'To: ' . $args['destinatario']['nome'] . ' <' . $args['destinatario']['email'] . '>' . "\r\n";
	$headers .= 'From: ' . $args['remetente']['nome'] . ' <' . $args['remetente']['email'] . '>' . "\r\n";
//	$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//	$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	// Mail it
	$enviarEmail = mail( $to, $subject, $message, $headers );
	return $enviarEmail;
}
?>