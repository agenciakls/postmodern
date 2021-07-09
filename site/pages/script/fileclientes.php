<?php 
// Flag que indica se há erro ou não
$erro = null;
// Quando enviado o formulário
if (isset($_FILES) && isset($_POST['id'])) {
	$idUser = $usuarioAtual['id'];
	$idPedido = $_POST['id'];
	$verificarPedido = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE id='%s' AND id_cliente='%s'", $idPedido, $idUser));
	if ((mysqli_num_rows($verificarPedido)) == 1) {
		
		foreach ($_FILES as $arquivo) {
			// Extensões permitidas
			$extensoes = array(".mp3", ".wav", ".ogg", ".wma");
			$caminhoLocal = $caminho . 'audio_clientes/';
			$caminhoSite = $basePrincipal . 'audio_clientes/';
			// Recuperando informações do arquivo
			$nome = $arquivo['name'];
			$temp = $arquivo['tmp_name'];
			$nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
			$novoCaminho = $caminhoLocal . $nomeAleatorio;
			$novoCaminhoSite = $caminhoSite . $nomeAleatorio;
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
					$salvarArquivo = mysqli_query($conectar, sprintf("INSERT INTO arquivos_clientes (id_pedido, titulo, url, status) VALUES ('%s', '%s', '%s', 'ativo')", $idPedido, $nome, $novoCaminhoSite));
					if ($salvarArquivo) {
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