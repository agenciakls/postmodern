<script src="https://www.paypal.com/sdk/js?client-id=<?php echo returnSetting('client_id'); ?>&currency=BRL"></script>
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
							// $contentPay = actionPay($impPedido['id'], $impPedido['valor']);
							// if ($contentPay) {
								

							// }
							?>
							<h4><strong><?php echo $impPedido['projeto']; ?></strong> | <?php echo formatData($impPedido['data'], 'data'); ?></h4>
							<div class="row">
								<div class="col-md-12">
									<p><?php echo langVar('page-conta-pagamento-obrigado'); ?><?php echo $impPedido['artista']; ?> <?php echo langVar('page-conta-pagamento-e'); ?> <?php echo $impPedido['projeto']; ?> <?php echo langVar('page-conta-pagamento-with'); ?></p>
									<h5 class="card-title"><?php echo langVar('page-conta-pagamento-pagamento'); ?> <small class="text-muted"><?php $dataPay = relationData($impPedido['pagamento_status']); echo $dataPay['titulo']; ?></small></h5>
									<p><strong><?php echo langVar('page-conta-pagamento-valor'); ?> </strong> <?php echo $impPedido['moeda']; ?> <?php echo number_format($impPedido['valor'], 2, ',', '.'); ?></p>
									<?php 
									if ($impPedido['pagamento_status'] == 1 || $impPedido['pagamento_status'] == 4) {
										?>
										<p><?php echo langVar('page-conta-pagamento-abaixo-metodos'); ?></p>
										<div class="row">
											<div class="col-md-6">
												<h5 class="card-title"><?php echo langVar('page-conta-pagamento-cartao-credito'); ?></h5>
												<div id="paypal-button-container"></div>
												<script>
												paypal.Buttons({
													style: {
														color: 'blue',
														shape: 'pill'
													},
													createOrder: function(data, actions) {
													// This function sets up the details of the transaction, including the amount and line item details.
														return actions.order.create({
															purchase_units: [{
															amount: {
																value: '<?php echo (float) $impPedido['valor']; ?>', 
															}
															}]
														});
													},
													onApprove: function(data, actions) {
														// This function captures the funds from the transaction.
														return actions.order.capture().then(function(details) {
															console.log(details);
															// This function shows a transaction success message to your buyer.
															$.post(window.basePrincipal + 'script/paypal/', {
																pagamento_status: 3,
																id: <?php echo $impPedido['id']; ?>
															}, function (returnAction){
																alert('Pagamento efetuado com sucesso!');
																document.location.reload(true);

															});
														});
													}
												}).render('#paypal-button-container');
												</script>
											</div>
											<div class="col-md-6">
												<div class="list-payment">
													<div class="item-payment" id="boleto">
														<h5 class="card-title"><?php echo langVar('page-conta-pagamento-transferencia'); ?></h5>
														<p><strong><?php echo langVar('page-conta-pagamento-banco'); ?></strong> Bradesco</p>
														<p><strong><?php echo langVar('page-conta-pagamento-agencia'); ?></strong> AG 2359 </p>
														<p><strong><?php echo langVar('page-conta-pagamento-conta'); ?></strong> 411982-7</p>
														<p><strong><?php echo langVar('page-conta-pagamento-nome'); ?></strong> André Luiz de Andrade Dias</p>
														<p><strong><?php echo langVar('page-conta-pagamento-cpf'); ?></strong> 033.620.147-80</p>
														<p><small><?php echo langVar('page-conta-pagamento-efetuar'); ?></small></p>
													</div>
												</div>
											</div>
										</div>
										<?php
									}
									else if ($impPedido['pagamento_status'] == 3) {
										?>
										<p><?php echo langVar('page-conta-pagamento-efetuado'); ?></p>
										<?php
									}
									?>
								</div>
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
							<a href="<?php echo baseUrl(); ?>conta/pedido?p=<?php echo $idPedido; ?>"><button class="btn-post left"><?php echo langVar('page-conta-pagamento-voltar'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>