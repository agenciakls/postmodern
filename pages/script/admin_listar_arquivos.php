<?php 
if (isset($_POST['id'])) {
	$idPedido = $_POST['id'];
	$argPedidos = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido,
			'status' => 'ativo'
		)
	);
	$pedidosUsuario = getData( $argPedidos );
	$qtPedidos = quantityData( $pedidosUsuario );
	if ($qtPedidos == 1) {
		$argClientes = array(
			'table' => 'arquivos_concluidos',
			'where' => array(
				'id_pedido' => $idPedido,
				'status' => 'ativo'
			)
		);
		$fileClientes = getData( $argClientes );
		$qtFileCl = quantityData( $fileClientes );
		if ( $qtFileCl > 0 ) {
			?>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Áudio</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ( $impFileCl = fetchData( $fileClientes ) ) {
						?>
						<tr>
							<th scope="row"><i class="fas fa-play"></i> <?php 
								$size = $impFileCl['size']; $size = ($size) ? ' - ' .  $size . ' mb ': '';
								$timeCreated = strftime("%d/%m/%Y %H:%M", strtotime($impFileCl['date_created'])); $timeCreated = (strftime("%Y-%m-%d %H:%M:%S", strtotime($impFileCl['date_created'])) != strftime("%Y-%m-%d %H:%M:%S", strtotime('0000-00-00 00:00:00'))) ? ' - ' . $timeCreated : '';
								echo $impFileCl['titulo'] . $size . $timeCreated; ?></th>
							<td>
							<a href="<?php echo $impFileCl['url']; ?>" download><i class="fas fa-download"></i> Baixar</a>
							<a href="<?php echo baseUrl(); ?>controle/pedidos/deletarmixer?id=<?php echo $impFileCl['id']; ?>"><i class="fas fa-trash-alt"></i> Excluir</a>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
		}
		else {
			?>
			<p>Não há arquivos, você pode anexar e seu cliente verá.</p>
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