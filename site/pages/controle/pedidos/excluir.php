<h2>Pedidos</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
	if (isset($_POST['excluir']) && $_POST['excluir'] == 'sim' ) {
		$excluirPedido = excluirCampos('pedidos', $idAtual);
		if ($excluirPedido) {
			?>
			<div class="alert alert-success" role="alert">Este pedido foi excluído com sucesso, você não o verá novamente.</div>
			<?php
		}
		else {
			?>
			<div class="alert alert-success" role="alert">Este pedido foi excluído verifique e tente novamente.</div>
			<?php
		}
	}
	else {
		$args = array(
			'table' => 'pedidos',
			'where' => array(
				'id' => $idAtual,
				'status' => 'ativo',
			)
		);

		$pegarDados = getData( $args );
		$quantidade = quantityData( $pegarDados );
		if ( $quantidade == 1 ) {
			while ($impPedidos = fetchData($pegarDados)) {
				$args = array(
					'table' => 'clientes',
					'where' => array(
						'id' =>$impPedidos['id_cliente'],
						'status' => 'ativo',
					)
				);

				$pegarDados = getData( $args );
				$quantidade = quantityData( $pegarDados );
				if ( $quantidade == 1 ) {
					while ($impClientes = fetchData($pegarDados)) {
						$relacionarCliente = $impClientes;
					}
				}
				?>
				<form action="" method="post">
					<strong>Tem certeza que deseja excluir este pedido? </strong><br />
					<strong>Cliente: </strong> <?php echo $relacionarCliente['nome'] . ' ' . $relacionarCliente['sobrenome'] . ' - ' . $relacionarCliente['email']; ?> <a href="<?php echo baseUrl(); ?>controle/clientes/ver?id=<?php echo $relacionarCliente['id']; ?>"><strong>(Ver Cliente)</strong></a><br />
					<strong>Artista: </strong> <?php echo $impPedidos['artista']; ?><br />
					<strong>Projeto: </strong> <?php echo $impPedidos['projeto']; ?><br />
					<strong>Descrição: </strong> <br /><?php echo $impPedidos['descricao']; ?><br />
					<strong>Mixes: </strong> <?php echo $impPedidos['mixes']; ?><br />
					<strong>Versões: </strong> <?php echo $impPedidos['versoes']; ?><br />
					<strong>Data Agendada: </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impPedidos['data'])); ?><br />
					<strong>Data Prazo: </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impPedidos['dataprazo'])); ?><br />
					<strong>valor: </strong> R$ <?php echo number_format($impPedidos['valor'], 2, ',', '.'); ?><br />
					<strong>Pagamento: </strong> <?php echo $impPedidos['pagamento_status']; ?><br />
					<strong>Status: </strong> <?php echo $impPedidos['status']; ?><br /><br />
					<input type="hidden" name="excluir" value="sim">
					<p>
						<button type="submit" class="btn btn-danger btn-sm">Excluir Pedido</button>
					</p>
				</form>
				<?php

			}
		}
		else { echo 'nao_existe'; }
	}
}
?>