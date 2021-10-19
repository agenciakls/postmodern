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
			$subject = langVar('sendmail-subject-email');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendmail-content-email-1') . '</p>
				<p>' . langVar('sendmail-content-email-2') . '</p>
				<p>' . langVar('sendmail-content-email-3') . ' <br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<br /><p><em>' . langVar('sendmail-content-email-4') . '</em></p>
			</div>';
		break;
		case 'senha': 
			$subject = langVar('sendmail-subject-senha');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Olá ' . $args['destinatario']['nome'] . ',</p>
				<p>' . langVar('sendmail-content-senha-1') . '</p>
				<p>' . langVar('sendmail-content-senha-2') . '<br /> <a href="' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '" target="_blank">' . $basePrincipal . 'suporte/email?tkn=' . $args['destinatario']['token'] . '</a></p>
				<p>' . langVar('sendmail-content-senha-3') . '</p>
			</div>';
		break;
		case 'upload': 
			$subject = langVar('sendmail-subject-upload');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>“' . langVar('sendmail-content-upload-1') . ' ' . $args['destinatario']['nome'] . ',</p>
				<p>' . langVar('sendmail-content-upload-2') . '</p>
				<p>' . langVar('sendmail-content-upload-3') . '</p>
				<p>' . langVar('sendmail-content-upload-4') . '</p>

				<br /><p><a href="https://postmodernmastering.com/login">' . langVar('sendmail-content-upload-4') . '</a></p>
			</div>';
		break;
		case 'download': 
			$subject = langVar('sendmail-subject-download');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendmail-content-upload-1') . ' ' . $args['destinatario']['nome'] . ',</p>
				<p>' . langVar('sendmail-content-upload-2') . '</p>
				<p>' . langVar('sendmail-content-upload-3') . '</p>
				<br /><p><a href="https://postmodernmastering.com/login">' . langVar('sendmail-content-upload-4') . '</a></p>
				<br /><p>' . langVar('sendmail-content-upload-5') . '</p>
			</div>';
		break;
		case 'pagamento': 
			$subject = langVar('sendmail-subject-pagamento');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendmail-content-pagamento-1') . ' ' . $args['destinatario']['nome'] . ',</p>
				<p>' . langVar('sendmail-content-pagamento-1') . '</p>
			</div>';
		break;
		case 'descricao': 
			$subject = langVar('sendmail-subject-descricao');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendmail-content-descricao-1') . ' ' . $args['destinatario']['nome'] . ',</p>
				<p>' . langVar('sendmail-content-descricao-1') . '</p>
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
	$headers .= 'From: ' . $args['remetente']['nome'] . ' <no-reply@postmodernmastering.com>' . "\r\n";
//	$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//	$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	// Mail it
	$enviarEmail = mail( $to, $subject, $message, $headers );
	return $enviarEmail;
}
?>