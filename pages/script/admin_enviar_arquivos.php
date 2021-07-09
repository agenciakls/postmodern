<?php 
// Flag que indica se há erro ou não
$erro = null;
// Quando enviado o formulário
if (isset($_FILES) && isset($_POST['id']) && isset($_POST['id_cliente'])) {
	$idUser = $_POST['id_cliente'];
	$idPedido = $_POST['id'];
	$verificarPedido = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE id='%s' AND id_cliente='%s'", $idPedido, $idUser));
	$singUser = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE id='%s'", $idUser));
	$cont_num = mysqli_num_rows($singUser);
	if ($cont_num == 1) { while ($imp = mysqli_fetch_array($singUser)) {
		$impSingUser = $imp;
	}}
	if ((mysqli_num_rows($verificarPedido)) == 1) {
		foreach ($_FILES as $arquivo) {
			// Extensões permitidas
			$extensoes = array(".mp3", ".wav", ".ogg", ".wma");
			$caminhoLocal = $caminho . 'audio_concluidos/';
			$caminhoSite = $basePrincipal . 'audio_concluidos/';
			
			$hash = strLimit(md5(uniqid(time())), 20, '');
			// $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
			// $nomeAleatorio = slugify($nome) . '-' . $hash . strrchr($nome, ".");

			mkdir( $caminhoLocal . $hash, 0755 );

			// Recuperando informações do arquivo
			$nome = $arquivo['name'];
			$temp = $arquivo['tmp_name'];
			$size = $arquivo['size'] / 1024 / 1024;
			$sizeMb = number_format($size, 2, ',', '.');

			date_default_timezone_set('America/Sao_Paulo');
			$strTime = strftime("%Y-%m-%d %H:%M:%S", strtotime('NOW'));

			$novoCaminho = $caminhoLocal . $hash . '/' . $nome;
			$novoCaminhoSite = $caminhoSite . $hash . '/' . $nome;
			// Verifica se a extensão é permitida
//			if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
//				$erro = 'Extensão inválida';
//			}
			// Se não houver erro
			if (!isset($erro)) {
				// Gerando um nome aleatório para o arquivo
				// Movendo arquivo para servidor
				$salvar = move_uploaded_file($temp, $novoCaminho);
				if ($salvar) { 
					$salvarArquivo = mysqli_query($conectar, sprintf("INSERT INTO arquivos_concluidos (id_pedido, titulo, url, size, date_created, status) VALUES ('%s', '%s', '%s', '%s', '%s', 'ativo')", $idPedido, $nome, $novoCaminhoSite, $sizeMb, $strTime));
					if ($salvarArquivo) {
						$argsEmail = array(
							'type' => 'download',
							'destinatario' => array(
								'nome' => $impSingUser['nome'],
								'email' => $impSingUser['email']
							), 
							'remetente' => array(
								'nome' => 'Post Modern Mastering', 
								'email' => 'no-reply@postmodernmastering.com'
							),
						);
						sendmail($argsEmail);
						sendnotification($argsEmail);
						echo 'salvo';
					}
					else { echo 'O arquivo não foi salvo.'; }
				}
				else { echo 'O arquivo não foi salvo.'; }
			}
			else {
				echo 'Extensão de arquivo inválida ou não permitida.';
			}
		}
	}
	else { echo 'Não conseguimos identificar os dados a respeito deste arquivo.'; }
}
else { echo 'Não conseguimos enviar o seu arquivo, tente novamente mais tarde ou entre em contato.'; }
?>