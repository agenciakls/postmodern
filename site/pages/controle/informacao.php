<h2>Informações</h2>
<div class="row">
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Quantidade de Clientes</small>
					<h6 class="my-0">
					<?php
					$args = array(
						'table' => 'clientes',
						'where' => array(
							'status' => 'ativo'
						)
					);
					$pegarDados = getData( $args );
					$quantidade = quantityData( $pegarDados );
					$quantidadeGet = ($quantidade > 0 ) ? $quantidade . ' Cliente(s)': 'Nenhum Cliente';
					echo $quantidadeGet;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Quantidade de Pedidos</small>
					<h6 class="my-0">
					<?php
					$args = array(
						'table' => 'pedidos',
						'where' => array(
							'status' => 'ativo'
						)
					);
					$pegarDados = getData( $args );
					$quantidade = quantityData( $pegarDados );
					$quantidadeGet = ($quantidade > 0 ) ? $quantidade . ' Pedidos(s)': 'Nenhum Pedido';
					echo $quantidadeGet;
					?>	
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Valor Pago</small>
					<h6 class="my-0">
					<?php
						$args = array(
							'table' => 'pedidos',
							'where' => array(
								'pagamento_status' => 1,
								'status' => 'ativo'
							)
						);
						$pegarDados = getData( $args );
						$quantidade = quantityData( $pegarDados );
						$total = 0;
						if ( $quantidade > 0 ) {
							while ($impDados = fetchData($pegarDados)) {
								$total += $impDados['valor'];
							}
							echo 'R$ ' . number_format($total, 2, ',', '.');
						}
						else {echo 'Nenhum Pagamento';}
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Valor Total</small>
					<h6 class="my-0">
					<?php
						$args = array(
							'table' => 'pedidos',
							'where' => array(
								'status' => 'ativo'
							)
						);
						$pegarDados = getData( $args );
						$quantidade = quantityData( $pegarDados );
						$total = 0;
						if ( $quantidade > 0 ) {
							while ($impDados = fetchData($pegarDados)) {
								$total += $impDados['valor'];
							}
							echo 'R$ ' . number_format($total, 2, ',', '.');
						}
						else {echo 'Nenhum Pagamento';}
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Pagamentos Efetuados</small>
					<h6 class="my-0">
					<?php
					$args = array(
						'table' => 'pedidos',
						'where' => array(
							'pagamento_status' => 1,
							'status' => 'ativo'
						)
					);
					$pegarDados = getData( $args );
					$quantidade = quantityData( $pegarDados );
					$quantidadeGet = ($quantidade > 0 ) ? $quantidade . ' Pagamento(s)': 'Nenhum Pagamento';
					echo $quantidadeGet;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Pagamentos Não Efetuados</small>
					<h6 class="my-0">
					<?php
					$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE pagamento_status!='1' AND status='ativo'") );;
					$quantidade = quantityData( $pegarDados );
					$quantidadeGet = ($quantidade > 0 ) ? $quantidade . ' Pagamento(s)': 'Nenhum Pagamento';
					echo $quantidadeGet;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
</div>