<h2>Clientes</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
	if (isset($_POST['excluir']) && $_POST['excluir'] == 'sim' ) {
		$excluirPedidos = mysqli_query($conectar, sprintf("UPDATE pedidos SET status='excluido' WHERE id_cliente='%s'", $idAtual));
		if ($excluirPedidos) {
			$excluirCliente = excluirCampos('clientes', $idAtual);
			if ($excluirCliente) {
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
			?>
			<div class="alert alert-success" role="alert">Este pedido foi excluído verifique e tente novamente.</div>
			<?php
		}
	}
	else {
		$args = array(
			'table' => 'clientes',
			'where' => array(
				'id' => $idAtual,
				'status' => 'ativo',
			)
		);

		$pegarDados = getData( $args );
		$quantidade = quantityData( $pegarDados );
		if ( $quantidade == 1 ) {
			while ($impCliente = fetchData($pegarDados)) {
				?>
				<form action="" method="post">
					<strong>Tem certeza que deseja excluir este cliente? </strong><br />
					<strong>Nome: </strong> <?php echo $impCliente['nome']; ?><br />
					<strong>Sobrenome: </strong> <?php echo $impCliente['sobrenome']; ?><br />
					<strong>Usuário: </strong> <?php echo $impCliente['usuario']; ?><br />
					<strong>E-mail: </strong> <?php echo $impCliente['email']; ?><br />
					<strong>Endereço: </strong> <?php echo $impCliente['endereco']; ?><br />
					<strong>Cidade: </strong> <?php echo $impCliente['cidade']; ?><br />
					<strong>Estado: </strong> <?php echo $impCliente['estado']; ?><br />
					<strong>País: </strong> <?php echo $impCliente['pais']; ?><br />
					<strong>CEP: </strong> <?php echo $impCliente['cep']; ?><br /><br />
					<?php 
					$args = array(
						'table' => 'pedidos',
						'where' => array(
							'id_cliente' => $impCliente['id'], 
							'status' => 'ativo'
						)
					);

					$pegarPedidos = getData( $args );
					$quantidade = quantityData( $pegarPedidos );
					if ( $quantidade > 0 ) {
						?>
						<strong>Pedidos deste cliente:</strong><br />
						<?php
						while ($impPedidos = fetchData($pegarPedidos)) {
							?>
							<strong><?php echo $impPedidos['projeto']; ?></strong> de <?php echo $impPedidos['artista']; ?><br />
							<?php
						}
						?>
						Quando excluir este cliente os pedidos serão excluídos juntamente.<br /><br />
						<?php
					}
					?>
					<input type="hidden" name="excluir" value="sim">
					<p><button type="submit" class="btn btn-danger btn-sm">Excluir Cliente e Pedidos</button></p>
				</form>
				<?php

			}
		}
		else { echo 'nao_existe'; }
	}
}
?>