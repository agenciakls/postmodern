<main role="main">
	<section class="jumbotron text-center header-slogan" style="background-image: url(<?php echo baseUrl(); ?>images/background_05.jpg) !important;">
		<div class="container">
			<img src="<?php echo baseUrl(); ?>images/title_logo_2.png" width="450" alt="">
		</div>
	</section>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo langVar('page-suporte-email-title'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-4 offset-md-4">
					<form class="content-padding">
						<?php
						$tokenAtual = (isset($_GET['tkn'])) ? $_GET['tkn']: null;
						$ln = false;
						if ($tokenAtual) {
							$verificarId = mysqli_query($conectar, sprintf("SELECT cliente_id FROM token_email WHERE token='%s' AND status='ativo'", $tokenAtual));
							if (quantityData($verificarId) == 1) {
								while ($impToken = fetchData($verificarId)) {
									$idCliente = $impToken['cliente_id'];
									$dadosFuncionario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE id='%s'", $idCliente));
									if (quantityData($dadosFuncionario) == 1) {
										while ($impCliente = fetchData($dadosFuncionario)) {
											$ln = true;
											?>
											<h2 class="text-center"><?php echo langVar('page-suporte-email-concluir'); ?></h2>
											<p><?php echo langVar('page-suporte-email-identificado'); ?></p>
											<div class="form-group">
												<label for="exampleInputUser"><?php echo langVar('page-suporte-email-usuario'); ?></label>
												<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="Insira seu usuário e e-mail">
												<small id="userHelp" class="form-text text-muted"></small>
											</div>
											<div class="form-group">
												<label for="exampleInputSenha"><?php echo langVar('page-suporte-email-usuario'); ?></label>
												<input type="password" class="form-control" id="get-senha" placeholder="Digite sua senha">
											</div>
											<input type="hidden" id="get-token" name="token" value="<?php echo $tokenAtual; ?>">
											<div class="row">
												<div class="col-md-12">
													<a onClick="efetuarLogin()"><button type="button" class="btn-post right"><?php echo langVar('page-suporte-email-confirmado'); ?></button></a>
												</div>
											</div>
											<?php
										}
									}
								}
							}
						}
						
						if (!$ln) {
							?>
							<h2 class="text-center"><?php echo langVar('page-suporte-email-nao-identificado'); ?></h2>
							<p><?php echo langVar('page-suporte-email-dados-nao-identificado'); ?></p>
							<?php
						}
						?>
					</form>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_confirmar_email.js"></script>