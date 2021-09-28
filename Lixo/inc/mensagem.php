<?php 
$action = $_POST['action'];
$retorno = array();
switch ($action) {
	case 'enviar': 
		$retorno['tipo'] = 'danger';
		$mensagem = $_POST['mensagem'];
		
		if (strlen($mensagem) <= 5) {
			$retorno['mensagem'] = 'A mensagem é muito pequena para ser enviada.';
		}
		else {
			$enviarMensagem = mysqli_query($conectar, sprintf("INSERT INTO mensagens (id_usuario, mensagem, status) VALUES ('%s', '%s', 'ativo') ", $usuarioAtual['id'], $mensagem));
			if ($enviarMensagem) {
				$retorno['mensagem'] = 'Sua mensagem foi enviada com sucesso.';
				$retorno['tipo'] = 'success';	
				registrarAcao($usuarioAtual['nome_completo'], $usuarioAtual['nome_completo'] . " enviou uma mensagem ");
			}
			else {
				$retorno['mensagem'] = 'Mensagem não enviada, tente novamente mais tarde!';
			}
		}
	break;
	case 'mostrar':
		$retorno['mensagens'] = '';
		$mostrarMensagens = mysqli_query($conectar, sprintf("SELECT * FROM mensagens WHERE status='ativo' ORDER BY id DESC"));
		while ($impMensagem = mysqli_fetch_array($mostrarMensagens)) {
			$usuarioMensagem = mysqli_query($conectar, sprintf("SELECT * FROM usuarios WHERE id='%s' AND status='ativo'", $impMensagem['id_usuario']));
			while ($impUsuario = mysqli_fetch_array($usuarioMensagem)) {
				$retorno['mensagens'] .= '
				<div class="single-message">
					<div class="thumbnail-message">
						<img src="' . $impUsuario['img'] . '" alt="" class="img-circle person-img" align="center">
					</div>
					<div class="content-message">
						<div class="name-user-message">
							' . $impUsuario['nome_completo'] . '
						</div>
						<div class="content-text-message">
							' . $impMensagem['mensagem'] . '
						</div>
					</div>
				</div>';
			}	
		}
	break;
	case 'excluir':

	break;
}
echo json_encode($retorno);
?>