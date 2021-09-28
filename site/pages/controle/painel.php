<div class="row">
	<div class="col-md-6">
		<h2>Clientes</h2>
		<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Nome</th>
			  <th>Usuário</th>
			  <th>Ações</th>
			</tr>
		  </thead>
		  <tbody>
				<?php 
				$args = array(
					'table' => 'clientes',
					'where' => array(
						'status' => 'ativo'
					)
				);

				$pegarCliente = getData( $args );
				$quantidade = quantityData( $pegarCliente );
				if ( $quantidade > 0 ) {
					while ($impClientes = fetchData($pegarCliente)) {
						?>
						<tr>
							<td><?php echo $impClientes['id']; ?></td>
							<td><?php echo $impClientes['nome'] . ' ' . $impClientes['sobrenome']; ?></td>
							<td><?php echo $impClientes['usuario']; ?></td>
							<td>
								<a href="<?php echo baseUrl(); ?>controle/clientes/ver?id=<?php echo $impClientes['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Ver Cliente</button></a>
							</td>
						</tr>
						<?php
					}
				}
				?>
		  </tbody>
		</table>
		</div>
	</div>
	<div class="col-md-6">
		<h2>Pedidos</h2>
		<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>Artista</th>
			  <th>Projeto</th>
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
						'status' => 'ativo'
					)
				);

				$pegarPedidos = getData( $args );
				$quantidade = quantityData( $pegarPedidos );
				if ( $quantidade > 0 ) {
					while ($impPedidos = fetchData($pegarPedidos)) {
						?>
						<tr>
							<td><?php echo $impPedidos['artista']; ?></td>
							<td><?php echo $impPedidos['projeto']; ?></td>
							<td><?php echo strftime("%d/%m/%Y", strtotime($impPedidos['data'])); ?></td>
							<td>R$ <?php echo number_format($impPedidos['valor'], 2, ',', '.'); ?></td>
							<td>
								<a href="<?php echo baseUrl(); ?>controle/pedidos/ver?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Ver Pedido</button></a>
							</td>
						</tr>
						<?php
					}
				}
				?>
		  </tbody>
		</table>
		</div>
	</div>
</div>