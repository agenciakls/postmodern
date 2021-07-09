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
							// After Step 1
							$clientId = returnSetting('client_id'); $clientSecret = returnSetting('client_secret');
							$apiContext = new \PayPal\Rest\ApiContext(
								new \PayPal\Auth\OAuthTokenCredential( $clientId, $clientSecret )
							);
														// After Step 2
							$payer = new \PayPal\Api\Payer();
							$payer->setPaymentMethod('paypal');

							$amount = new \PayPal\Api\Amount();
							$amount->setTotal($impPedido['valor']);
							$amount->setCurrency('BRL');

							$transaction = new \PayPal\Api\Transaction();
							$transaction->setAmount($amount);

							$redirectUrls = new \PayPal\Api\RedirectUrls();
							$redirectUrls->setReturnUrl("http://www.postmodernmastering.com.br/paypal/redirect")
								->setCancelUrl("http://www.postmodernmastering.com.br/paypal/cancel");

							$payment = new \PayPal\Api\Payment();
							$payment->setIntent('sale')
								->setPayer($payer)
								->setTransactions(array($transaction))
								->setRedirectUrls($redirectUrls);
														// After Step 3
							try {
								$payment->create($apiContext);
							}
							catch (\PayPal\Exception\PayPalConnectionException $ex) {
								// This will print the detailed information on the exception.
								//REALLY HELPFUL FOR DEBUGGING
								echo $ex->getData();
							}
							?>
							<h4><strong><?php echo $impPedido['projeto']; ?></strong> | <?php echo formatData($impPedido['data'], 'data'); ?></h4>
							<div class="row">
								<div class="col-md-12">
									<h5 class="card-title">Pagamento <small class="text-muted"><?php $dataPay = relationData($impPedido['pagamento_status']); echo $dataPay['titulo']; ?></small></h5>
									<p><strong>Valor: </strong> R$
										<?php echo $impPedido['valor']; ?>,00</p>
									<p>Faça o pagamento antes da data programada para a sessão.</p>
									<p>
										<a href="<?php echo $payment->getApprovalLink(); ?>"><button class="btn-post right" type="button"><i class="fas fa-credit-card"></i> Cartão ou Boleto</button></a>
										<a class="show-payment" payment-cl="list" payment-it="boleto"><button class="btn-post right" type="button"><i class="far fa-money-bill-alt"></i> Depósito Bancário</button></a>

									</p>
									<div class="list-payment">
										<div class="item-payment" id="boleto">
											<p><strong>Banco: </strong>999 - Exemplo</p>
											<p><strong>Agência: </strong>9999</p>
											<p><strong>Conta: </strong>9999999-9</p>
											<p><strong>Tipo: </strong>Conta Corrente</p>
										</div>
									</div>
									<script>
										$(".item-payment").fadeOut(0);
										$(".show-payment").on('click', function () {
											var itemSlide = $(this).attr('payment-it');
											$(".item-payment").fadeOut(300, function () {
												$("#"+itemSlide).fadeIn(300);
											});
										});
									</script>
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
							<a href="<?php echo baseUrl(); ?>conta/pedido?p=<?php echo $idPedido; ?>"><button class="btn-post left">Voltar</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>