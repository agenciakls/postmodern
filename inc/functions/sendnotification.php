<?php

function sendnotification( $args ) {
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
	// $subject = $subject;

	global $basePrincipal;

	switch ($args['type']) {
		case 'email': 
			$subject = langVar('sendnotification-subject-email');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-email-1') . '</p>

				<br><p>' . langVar('sendnotification-content-email-2') . ' ' . $args['destinatario']['nome'] . ' - ' . $args['destinatario']['email'] .'</p>
				
				<br /><p><a href="https://postmodernmastering.com/controle">' . langVar('sendnotification-content-email-3') . '</a></p>
			</div>';
		break;
		case 'senha': 
			$subject = langVar('sendnotification-subject-senha');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-senha-1') . ' ' . $args['destinatario']['nome'] . ' ' . langVar('sendnotification-content-senha-2') . '</p>
			</div>';
		break;
		case 'upload': 
			$subject = langVar('sendnotification-subject-upload') . ' ' . $args['destinatario']['nome'] . ' - ' . $args['destinatario']['email'];
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-upload-1') . ' ' . $args['destinatario']['nome'] . '.</p>
				<br /><p><a href="https://postmodernmastering.com/controle">' . langVar('sendnotification-content-upload-2') . '</a></p>
			</div>';
		break;
		case 'download': 
			$subject = langVar('sendnotification-subject-download');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-download-1') . ' ' . $args['destinatario']['nome'] . '</p>
			</div>';
		break;
		case 'pagamento': 
			$subject = langVar('sendnotification-subject-pagamento');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-pagamento-1') . ' ' . $args['destinatario']['nome'] . ' ' . langVar('sendnotification-content-pagamento-2') . '</p>
			</div>';
		break;
		case 'descricao': 
			$subject = langVar('sendnotification-subject-descricao');
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>' . langVar('sendnotification-content-descricao-1') . ' ' . $args['destinatario']['nome'] . ' ' . langVar('sendnotification-content-descricao-2') . '</p>
				<p>' . langVar('sendnotification-content-descricao-3') . '</p>
			</div>';
		break;
	}
	// multiple recipients
	$to = 'postmodernmastering@gmail.com';
	// $to = 'fabiofreitassilvacontato@gmail.com';

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
	$headers .= 'To: ' . 'André Dias <' . $to . '>' . "\r\n";
	$headers .= 'From: ' . $args['remetente']['nome'] . ' <no-reply@postmodernmastering.com>' . "\r\n";
//	$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//	$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	// Mail it
	$enviarEmail = mail( $to, $subject, $message, $headers );
	return $enviarEmail;
}
?>