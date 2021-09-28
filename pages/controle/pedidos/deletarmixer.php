<h2>Pedidos</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
	if (isset($_POST['excluir']) && $_POST['excluir'] == 'sim' ) {
		$excluirPedido = excluirCampos('arquivos_concluidos', $idAtual);
		if ($excluirPedido) {
			?>
			<div class="alert alert-success" role="alert">Este arquivo foi excluído com sucesso, você não o verá novamente.</div>
			<?php
		}
		else { ?> <div class="alert alert-success" role="alert">Este arquivo foi excluído verifique e tente novamente.</div> <?php }
	}
	else {
		$args = array(
			'table' => 'arquivos_concluidos',
			'where' => array(
				'id' => $idAtual,
				'status' => 'ativo',
			)
		);

		$pegarDados = getData( $args );
		$quantidade = quantityData( $pegarDados );
		if ( $quantidade == 1 ) {
			while ($impFile = fetchData($pegarDados)) {
				?>
				<form action="" method="post">
					<strong>Tem certeza que deseja excluir este arquivo? </strong><br />
					<strong>Título: </strong> <?php echo $impFile['titulo']; ?><br />
					<strong>Arquivo: </strong> <a href="<?php echo $impFile['url']; ?>" download><?php echo $impFile['url']; ?></a><br />
					<strong>Tamanho: </strong> <?php echo $impFile['size']; ?> mb<br />
					<strong>Arquivo Enviado: </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impFile['date_created'])); ?><br />

					<input type="hidden" name="excluir" value="sim">
					<br />
					<p>
						<button type="submit" class="btn btn-danger btn-sm">Excluir Arquivo</button>
					</p>
				</form>
				<?php

			}
		}
		else { echo 'nao_existe'; }
	}
}
?>