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
			$subject = 'Um novo projeto foi adicionado no Sistema.';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Um novo projeto foi adicionado no Sistema.</p>

				<br><p> Dados do cliente: ' . $args['destinatario']['nome'] . ' - ' . $args['destinatario']['email'] .'</p>
				
				<br /><p><a href="https://postmodernmastering.com/controle">Link para acesso ao Painel.</a></p>
			</div>';
		break;
		case 'senha': 
			$subject = 'Um cliente fez uma recuperação de senha';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>O cliente ' . $args['destinatario']['nome'] . ' acaba de fazer um pedido de alteração de senha através do site.</p>
			</div>';
		break;
		case 'upload': 
			$subject = 'Um novo upload foi realizado na conta de ' . $args['destinatario']['nome'] . ' - ' . $args['destinatario']['email'];
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Um novo upload foi realizado na conta de ' . $args['destinatario']['nome'] . '.</p>
				<br /><p><a href="https://postmodernmastering.com/controle">Link para acesso ao Painel.</a></p>
			</div>';
		break;
		case 'download': 
			$subject = 'Você acaba de enviar uma faixa masterizada para um cliente';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>Você acaba de enviar uma faixa para o cliente: ' . $args['destinatario']['nome'] . '</p>
			</div>';
		break;
		case 'pagamento': 
			$subject = 'Um cliente fez o pagamento no site';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>O cliente ' . $args['destinatario']['nome'] . ' acaba de efetuar o pagamento através do site.</p>
			</div>';
		break;
		case 'descricao': 
			$subject = 'Um cliente fez a alteração de descrição';
			$dataContent = '
			<div style="background-color: #191919 !important; color: #efefef; padding: 19px 22px; font-size: 23px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				' . $subject . '
			</div>
			<div style="background-color: #f8f9fa; padding: 19px 22px; font-family: \'sans-serif\', \'Trebuchet MS\';">
				<p>O cliente ' . $args['destinatario']['nome'] . ' alterou a descrição de um serviço, verifique no sistema a descrição.</p>
				<p>Nesses casos pode conter alguma informação importante!</p>
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
	$headers .= 'From: ' . $args['remetente']['nome'] . ' <' . $args['remetente']['email'] . '>' . "\r\n";
//	$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//	$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

	// Mail it
	$enviarEmail = mail( $to, $subject, $message, $headers );
	return $enviarEmail;
}
?>