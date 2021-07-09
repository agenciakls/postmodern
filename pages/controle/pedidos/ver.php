<h2>Pedidos</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
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
						'id' => $impPedidos['id_cliente'],
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

				$args = array(
					'table' => 'pagamento_tipos',
					'where' => array(
						'id' => $impPedidos['pagamento_status']
					)
				);

				$pegarDados = getData( $args );
				$quantidade = quantityData( $pegarDados );
				if ( $quantidade == 1 ) {
					while ($impPay = fetchData($pegarDados)) {
						$payData = $impPay;
					}
				}
			?>
			<div class="row">
				<div class="col-lg-6">
					<p><strong>Cliente: </strong> <?php echo $relacionarCliente['nome'] . ' ' . $relacionarCliente['sobrenome'] . ' - ' . $relacionarCliente['email']; ?> <a href="<?php echo baseUrl(); ?>controle/clientes/ver?id=<?php echo $relacionarCliente['id']; ?>"><strong>(Ver Cliente)</strong></a></p>
					<p><strong>Artista: </strong> <?php echo $impPedidos['artista']; ?></p>
					<p><strong>Projeto: </strong> <?php echo $impPedidos['projeto']; ?></p>
					<p><strong>Descrição: </strong> <br /><?php echo $impPedidos['descricao']; ?></p>
					<p><strong>Mixes: </strong> <?php echo $impPedidos['mixes']; ?></p>
					<p><strong>Versões: </strong> <?php echo $impPedidos['versoes']; ?></p>
					<p><strong>Data agendada: </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impPedidos['data'])); ?></p>
					<p><strong>Entrega: </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impPedidos['dataprazo'])); ?></p>
					<p><strong>valor: </strong> R$ <?php echo number_format($impPedidos['valor'], 2, ',', '.'); ?></p>
					<p><strong>Pagamento: </strong> <?php echo $payData['titulo']; ?></p>
					<p>
						<a href="<?php echo baseUrl(); ?>controle/pedidos/editar?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
						<a href="<?php echo baseUrl(); ?>controle/pedidos/excluir?id=<?php echo $impPedidos['id']; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
					</p>
				</div>
				<div class="col-lg-6">
					<h5 class="card-title">Status do Pedido</h5>
					<div class="row">
						<div class="col-md-6">
							<label for="">Status do Pedido</label>
							<select name="situacao_status" id="get-pedido-situacao" class="form-control">
								<?php
								$args = array(
									'table' => 'situacao_tipos'
								);

								$pegarPay = getData( $args );
								$quantidade = quantityData( $pegarPay );
								if ( $quantidade > 0 ) {
									while ($impPay = fetchData($pegarPay)) {
										$situacaoStatus = ($impPedidos['situacao'] == $impPay['id']) ? ' selected="selected"': '';
										?>
										<option value="<?php echo $impPay['id']; ?>" <?php echo $situacaoStatus; ?>><?php echo $impPay['titulo']; ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="">Status do Pagamento</label>
							<select name="pagamento_status" id="get-pedido-pagamento" class="form-control">
								<?php
								$args = array(
									'table' => 'pagamento_tipos'
								);

								$pegarPay = getData( $args );
								$quantidade = quantityData( $pegarPay );
								if ( $quantidade > 0 ) {
									while ($impPay = fetchData($pegarPay)) {
										$pagamentoStatus = ($impPedidos['pagamento_status'] == $impPay['id']) ? ' selected="selected"': '';
										?>
										<option value="<?php echo $impPay['id']; ?>" <?php echo $pagamentoStatus; ?>><?php echo $impPay['titulo']; ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-12">
							<br /><small class="text-danger">Selecionando um status acima você pode alterar rapidamente o status do pagamento ou do pedido.</small>
							<span id="asd"></span>
						</div>
					</div>
					<br />
					<h5 class="card-title">Arquivos do Cliente</h5>
					
							<?php 
							$argClientes = array(
								'table' => 'arquivos_clientes',
								'where' => array(
									'id_pedido' => $idAtual,
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
												<td><a href="<?php echo $impFileCl['url']; ?>" download><i class="fas fa-download"></i> Baixar</a> 
												<a href="<?php echo baseUrl(); ?>controle/pedidos/deletararquivo?id=<?php echo $impFileCl['id']; ?>"><i class="fas fa-trash-alt"></i> Excluir</a></td>
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
								<p>Nenhum arquivo anexado, aguarde ou peça ao cliente para anexar</p>
								<?php
							}
						?>
					<br />
					<h5 class="card-title">Notas do Engenheiro</h5>
					<p class="card-text"><strong>Informação:</strong> <small class="text-muted">(Informações para o cliente.)</small><br /><br />
						<span id="descricao-pedido"></span>
					</p>
					<br />
					<h5 class="card-title">Projetos Concluídos</h5>
					<span id="lista-arquivos"></span>
					<input type="hidden" name="pedido-atual" id="pedido-atual" value="<?php echo $impPedidos['id']; ?>">
					<input type="hidden" name="cliente-atual" id="cliente-atual" value="<?php echo $impPedidos['id_cliente']; ?>">
					<br />

					<div class="progress" id="progress-wrp">
					<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
					</div>
					<div class="text-progress">
						Envio: <span class="mb-send">0</span> de <span class="mb-total">0</span>
					</div>
					<br />
					<input type="file" id="file-audio" class="btn btn-secondary upload-input" />
					<input type="hidden" id="get-id-pedido" name="id-pedido" value="<?php echo $impPedidos['id']; ?>" />
					<input type="hidden" id="get-id-cliente" name="id-cliente" value="<?php echo $impPedidos['id_cliente']; ?>" />
					<button type="button" id="send-file" class="btn btn-primary">Enviar Arquivo</button>
				</div>
			</div>
			<?php 
		}
	}
	else { echo 'nao_existe'; }
}
?>
<script src="<?php echo baseUrl(); ?>js/script_admin_pedido.js?v=1.1.11"></script>