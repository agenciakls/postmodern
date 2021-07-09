<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
					<?php
					$idPedido = $_GET[ 'p' ];
					$args = array(
						'table' => 'pedidos',
						'where' => array(
							'id' => $idPedido,
							'id_cliente' => $usuarioAtual[ 'id' ],
							'status' => 'ativo'
						)
					);
					$pegarPedido = getData( $args );
					$quantidade = quantityData( $pegarPedido );
					if ( $quantidade == 1 ) {
						while ( $impPedido = fetchData( $pegarPedido ) ) {
							?>
							<h4><strong><?php echo $impPedido['projeto']; ?></strong> | <?php echo formatData($impPedido['data'], 'data'); ?></h4>
							<input type="hidden" id="get-id-pedido" name="id-pedido" value="<?php echo $idPedido; ?>">
							<div class="row">
								<div class="col-md-4">
									<h5 class="card-title">
										<?php echo $impPedido['artista']; ?>
										<small class="text-muted">
											<?php echo $impPedido['projeto']; ?>
										</small>
									</h5>
									<div class="card-text">
										<div class="d-inline-block p-2 bg-dark text-white"><strong>Mixes:</strong> <span class="p-2 text-warning"><?php echo $impPedido['mixes']; ?></span></div>
										<div class="d-inline-block p-2 bg-dark text-white"><strong>Versões:</strong> <span class="p-2 text-warning"><?php echo $impPedido['versoes']; ?></span></div>
										<div class="d-inline-block p-2 bg-dark text-white"><strong>Vinyl:</strong> <span class="p-2 text-warning"><?php echo $impPedido['vinyl']; ?></span></div>
									</div>
									<p class="card-text pt-2"><strong>Data:</strong>
										<?php echo formatData($impPedido['data']); ?>
									</p>
									<p class="card-text"><strong>Entrega:</strong>
										<?php echo formatData($impPedido['dataprazo']); ?>
										<br />
										<small class="text-muted">A data pode sofrer alterações durante o processo.</small>
									</p>
									<p class="card-text"><strong>Status:</strong>
										<?php $situacao = relationData($impPedido['situacao']); echo $situacao['titulo']; ?> </p>
									<p class="card-text"><strong>Descrição:</strong> <small class="text-muted">(Informações para o Engenheiro.)</small><br /><br />
										<span id="descricao-pedido"></span>
									</p>
								</div>
								<div class="col-md-4">
									<h5 class="card-title">Pagamento</h5>
									<p><strong>Status: </strong> <?php $dataPay = relationData($impPedido['pagamento_status']); echo $dataPay['titulo']; ?>
									</p>
									<p><strong>Valor: </strong> R$ <?php echo number_format($impPedido['valor'], 2, ',', '.'); ?></p>
									<?php 
									if ($impPedido['pagamento_status'] == 1 || $impPedido['pagamento_status'] == 4) {
										?>
										<p class="card-text text-muted"><small>É necessário realizar o pagamento antes da data de sua sessão.</small></p>
										<a href="<?php echo baseUrl(); ?>conta/pagamento?p=<?php echo $impPedido['id']; ?>"><button type="button" class="btn-post right">Efetuar Pagamento</button></a>
										<?php
									}
									if ($impPedido['pagamento_status'] == 3) {
										?>
										<p class="card-text text-muted"><small>Seu recibo está disponível no link abaixo.</small></p>
										<a href="<?php echo baseUrl(); ?>conta/recibo?p=<?php echo $impPedido['id']; ?>"><button type="button" class="btn-post right">Recibo Disponível</button></a>
										<?php
									}
									?>
								</div>
								<div class="col-md-4">
									<h5 class="card-title">Meus Arquivos</h5>
									<span id="lista-arquivos"></span>
									<input type="hidden" name="pedido-atual" id="pedido-atual" value="<?php echo $impPedido['id']; ?>">
									<br />
									<div class="progress" id="progress-wrp">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
									</div>
									<div class="text-progress">
										Envio: <span class="mb-send">0</span> de <span class="mb-total">0</span>
									</div>
									<br />
									<input type="file" id="file-audio" class="btn btn-secondary upload-input float-right" />
									<br /><br />
									<button type="button" id="send-file" class="btn-post right">Enviar Arquivo</button>
									<button type="button" id="abort-button" class="btn-post right">Cancelar Envio</button>
								</div>
								<br /><br />
								
								<?php 
								if ($impPedido['informacoes']) {
									?>
									<div class="col-md-12">
										<h5 class="card-title">Notas do Engenheiro</h5>
										<div class="card"><div class="card-body"><?php echo $impPedido['informacoes']; ?></div></div>
									</div>
									<?php
								}
								?>
								<br /><br />
								<?php 
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
									<div class="col-md-12">
										<h5 class="card-title">Projeto Masterizado</h5>
										<div class="card">
											<div class="card-header">
												Arquivos Recebidos
											</div>
											<div class="card-body">
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Faixas</th>
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
																<td><a href="<?php echo $impFileCl['url']; ?>" download><i class="fas fa-download"></i> Baixar Arquivo</a></td>
															</tr>
															<?php 
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						}
					}
					?>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
				<div class="col-md-12 content-price-total">
					<div class="row content-total">
						<div class="col-md-6 text-left">
							<a href="<?php echo baseUrl(); ?>conta/"><button class="btn-post left">Voltar</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_pedido.js?v=1.1.12"></script>