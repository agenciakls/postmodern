<main role="main">
	<section class="jumbotron text-center header-slogan">
		<div class="container">
			<h1 class="jumbotron-heading">Post Modern Mastering</h1>
			<p class="lead text-muted text-slogan">Entre em contato com o atendimento deste engenheiro se você está interessado em reservar uma sessão</p>
		</div>
	</section>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Recuperar Senha</h1>
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
											<h2 clas="text-center">Insira sua Senha</h2>
											<p><strong>Olá <?Php echo $impCliente['nome']; ?>, digite sua nova senha para entrar em sua conta. </strong></p>
											<div class="form-group">
												<label for="exampleInputUser">Nova Senha</label>
												<input type="password" class="form-control" id="get-senha" aria-describedby="userHelp" placeholder="Digite a nova senha">
											</div>
											<div class="form-group">
												<label for="exampleInputUser">Confirme a Senha</label>
												<input type="password" class="form-control" id="get-repete-senha" aria-describedby="userHelp" placeholder="Confirme a sua senha">
											</div>
											<input type="hidden" name="tkn" id="get-tkn" value="<?php echo $tokenAtual; ?>">
											<div class="row">
												<div class="col-md-12">
													<a onClick="salvarNovaSenha()"><button type="button" class="btn-post right">Recuperar Senha</button></a>
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
							<h2 clas="text-center">Esqueci Minha Senha</h2>
							<div class="form-group">
								<label for="exampleInputUser">E-mail ou Nome de usuário</label>
								<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="Insira seu usuário e e-mail">
								<small id="userHelp" class="form-text text-muted">Para recuperar a senha insira os dados abaixo e enviaremos um link para você recuperar sua senha.</small>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a onClick="recuperarSenha()"><button type="button" class="btn-post right">Recuperar Senha</button></a>
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