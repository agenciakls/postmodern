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
					<h1><?php echo langVar('page-suporte-senha-title'); ?></h1>
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
							$verificarId = mysqli_query($conectar, sprintf("SELECT cliente_id FROM token_senha WHERE token='%s' AND status='ativo'", $tokenAtual));
							if (quantityData($verificarId) == 1) {
								while ($impToken = fetchData($verificarId)) {
									$idCliente = $impToken['cliente_id'];
									$dadosFuncionario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE id='%s'", $idCliente));
									if (quantityData($dadosFuncionario) == 1) {
										while ($impCliente = fetchData($dadosFuncionario)) {
											$ln = true;
											?>
											<h2 clas="text-center"><?php echo langVar('page-suporte-senha-insira'); ?></h2>
											<p><strong><?php echo langVar('page-suporte-senha-ola'); ?> <?Php echo $impCliente['nome']; ?>, <?php echo langVar('page-suporte-senha-digite'); ?></strong></p>
											<div class="form-group">
												<label for="exampleInputUser"><?php echo langVar('page-suporte-senha-nova-senha'); ?></label>
												<input type="password" class="form-control" id="get-senha" aria-describedby="userHelp" placeholder="<?php echo langVar('page-suporte-senha-informe-nova'); ?>">
											</div>
											<div class="form-group">
												<label for="exampleInputUser"><?php echo langVar('page-suporte-senha-confirme-senha'); ?></label>
												<input type="password" class="form-control" id="get-repete-senha" aria-describedby="userHelp" placeholder="<?php echo langVar('page-suporte-senha-informe-novamente'); ?>">
											</div>
											<input type="hidden" name="tkn" id="get-tkn" value="<?php echo $tokenAtual; ?>">
											<div class="row">
												<div class="col-md-12">
													<a onClick="salvarNovaSenha()"><button type="button" class="btn-post right"><?php echo langVar('page-suporte-senha-recuperar'); ?></button></a>
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
							<h2 clas="text-center"><?php echo langVar('page-suporte-senha-esqueci'); ?></h2>
							<div class="form-group">
								<label for="exampleInputUser"><?php echo langVar('page-suporte-senha-email'); ?></label>
								<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="<?php echo langVar('page-suporte-senha-informe-email'); ?>">
								<small id="userHelp" class="form-text text-muted"><?php echo langVar('page-suporte-senha-para-recuperar'); ?></small>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a onClick="recuperarSenha()"><button type="button" class="btn-post right"><?php echo langVar('page-suporte-senha-recuperar'); ?></button></a>
								</div>
							</div>
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
<script src="<?php echo baseUrl(); ?>js/script_senha.js"></script>