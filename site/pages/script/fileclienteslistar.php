<?php 
if (isset($_POST['id'])) {
	$idPedido = $_POST['id'];
	$argPedidos = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido,
			'id_cliente' => $usuarioAtual['id'],
			'status' => 'ativo'
		)
	);
	$pedidosUsuario = getData( $argPedidos );
	$qtPedidos = quantityData( $pedidosUsuario );
	if ($qtPedidos == 1) {
		$argClientes = array(
			'table' => 'arquivos_clientes',
			'where' => array(
				'id_pedido' => $idPedido,
				'status' => 'ativo'
			)
		);
		$fileClientes = getData( $argClientes );
		$qtFileCl = quantityData( $fileClientes );
		if ( $qtFileCl > 0 ) {
			?>
			<ul class="list-group list-group-flush">
			<?php
			while ( $impFileCl = fetchData( $fileClientes ) ) {
				?>
				<li class="list-group-item"><i class="fas fa-play"></i> <?php echo $impFileCl['titulo']; ?></li>
				<?php 
			}
			?>
			</ul>
			<?php
		}
		else {
			?>
			Nenhum arquivo anexado! <br />Envie seus arquivos antes da data informada.
			<?php
		}
	}
	else {
		?>
		Não permitido.
		<?php
	}
}
?>