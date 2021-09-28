<h2>Clientes</h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
	<tr>
	  <th>#</th>
	  <th>Nome</th>
	  <th>Usuário</th>
	  <th>E-mail</th>
	  <th>Endereço</th>
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
					<td><?php echo $impClientes['email']; ?></td>
					<td><?php echo $impClientes['cidade']; ?> / <?php echo $impClientes['estado']; ?></td>
					<td>
						<a href="<?php echo baseUrl(); ?>controle/clientes/ver?id=<?php echo $impClientes['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Ver</button></a>
						<a href="<?php echo baseUrl(); ?>controle/clientes/editar?id=<?php echo $impClientes['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
						<a href="<?php echo baseUrl(); ?>controle/clientes/excluir?id=<?php echo $impClientes['id']; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
					</td>
				</tr>
				<?php
			}
		}
		?>
  </tbody>
</table>
</div>