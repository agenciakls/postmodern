<h2>Pedidos</h2>
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