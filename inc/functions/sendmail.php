<?php

function sendmail( $args ) {
//	$args = array(
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

	// subject
	// $subject = ($args['titulo']) ? $args['titulo'] : $subject;


	global $basePrincipal;
	switch ($args['type']) {
		case 'email': 
			$subject = 'Cadastro Realizado com sucesso';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Obrigado por escolher o Post Modern Mastering para cuidar de sua música. Esperamos que aproveite a experiência.</p>
				<p>Nosso sistema envia notificações automatizadas de todas as ações realizadas em cada conta certificada para eliminar chamadas telefônicas e e-mails manuais. Quando o projeto estiver pronto, cada cliente recebe uma notificação para fazer o download dos arquivos masterizados em sua conta certificada.</p>
				<p>Clique no link abaixo para confirmar seu e-mail: <br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<br /><p><em>Se não foi você que fez o cadastro não clique no link e nenhuma alteração será feita…</em></p>
			</div>';
		break;
		case 'senha': 
			$subject = 'Recuperar Senha';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Você enviou para seu e-mail um link de pedido de alteração de senha, para alterar sua senha entre no link abaixo e digite seu nome de usuário e senha.</p>
				<p>Clique no link abaixo: <br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<p>Se houver algum problema entre em contato imediatamente para que possa ser resolvido</p>
			</div>';
		break;
		case 'upload': 
			$subject = 'Arquivos Enviados com Sucesso';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>“Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Seus arquivos foram recebidos com sucesso em sua conta certificada.</p>
				<p>Lembramos que o pagamento total do serviço contratado deve ser efetuado até 24 horas antes da data de sua sessão.</p>
				<p>Caso o pagamento não seja confirmado dentro do prazo, um novo agendamento deverá ser feito e estará sujeito å disponibilidade do Engenheiro.</p>

				<br /><p><a href="https://postmodernmastering.com/login">Link para a página de login</a></p>
			</div>';
		break;
		case 'download': 
			$subject = 'Você recebeu um arquivo masterizado em sua conta certificada';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Os arquivos masterizados do seu projeto já estão disponíveis.</p>
				<p>Por favor, acesse sua conta certificada para ter acesso aos arquivos.</p>
				<br /><p><a href="https://postmodernmastering.com/login">Link para a página de login</a></p>
				<br /><p>Esperamos ouvir de você em breve.</p>
			</div>';
		break;
		case 'pagamento': 
			$subject = 'Pagamento Efetuado';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Você efetuou o pagamento em nosso site, já notificamos ao engenheiro que dê prosseguimento ao processo.</p>
			</div>';
		break;
		case 'descricao': 
			$subject = 'Alteração de Descrição';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>Você alterou a descriação de um serviço no site. Já recebemos a sua descrição atualizada.</p>
			</div>';
		break;
	}
	// multiple recipients
	$to = $args['destinatario']['email'];

	// message
	$message = '
	<!DOCTYPE html>
	<html>
		<head>
			<title>' . $subject . '</title>
			<meta charset="utf-8">
		</head>
		<body>
			<table align="center" width="700" border="0" style="border: none;">
				<tr>
					<td>
						<div style="background-color: #343a40 !important; padding: 15px 10px;">
							<img src="' . $basePrincipal . 'images/title_logo_site.png" style="display: block; margin: 0px auto; width: 416px;" width="416" alt="">
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
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

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