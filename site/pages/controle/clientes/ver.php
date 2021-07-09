<h2>Clientes</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
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
			<p><strong>Nome: </strong> <?php echo $impCliente['nome']; ?></p>
			<p><strong>Sobrenome: </strong> <?php echo $impCliente['sobrenome']; ?></p>
			<p><strong>Usuário: </strong> <?php echo $impCliente['usuario']; ?></p>
			<p><strong>E-mail: </strong> <?php echo $impCliente['email']; ?></p>
			<p><strong>Endereço: </strong> <?php echo $impCliente['endereco']; ?></p>
			<p><strong>Cidade: </strong> <?php echo $impCliente['cidade']; ?></p>
			<p><strong>Estado: </strong> <?php echo $impCliente['estado']; ?></p>
			<p><strong>País: </strong> <?php echo $impCliente['pais']; ?></p>
			<p><strong>CEP: </strong> <?php echo $impCliente['cep']; ?></p>
			<p>
				<a href="<?php echo baseUrl(); ?>controle/clientes/editar?id=<?php echo $impCliente['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
				<a href="<?php echo baseUrl(); ?>controle/clientes/excluir?id=<?php echo $impCliente['id']; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
			</p>

			<h2>Pedidos deste Cliente</h2>
			<div class="table-responsive">
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Artista</th>
				  <th>Projeto</th>
				  <th>Mixes</th>
				  <th>Versões</th>
				  <th>Data</th>
				  <th>Valor</th>
				  <th>Ações</th>
				</tr>
			  </thead>
			  <tbody>
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
						while ($impPedidos = fetchData($pegarPedidos)) {
							?>
							<tr>
								<td><?php echo $impPedidos['id']; ?></td>
								<td><?php echo $impPedidos['artista']; ?></td>
								<td><?php echo $impPedidos['projeto']; ?></td>
								<td><?php echo $impPedidos['mixes']; ?></td>
								<td><?php echo $impPedidos['versoes']; ?></td>
								<td><?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impPedidos['data'])); ?></td>
								<td>R$ <?php echo number_format($impPedidos['valor'], 2, ',', '.'); ?></td>
								<td>
									<a href="<?php echo baseUrl(); ?>controle/pedidos/ver?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Ver</button></a>
									<a href="<?php echo baseUrl(); ?>controle/pedidos/editar?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
									<a href="<?php echo baseUrl(); ?>controle/pedidos/excluir?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
								</td>
							</tr>
							<?php
						}
					}
					?>
			  </tbody>
			</table>
			</div>
			<?php
			
		}
	}
	else { echo 'nao_existe'; }
}
?>