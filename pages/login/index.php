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
					<h1>Iniciar Sessão</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-4 offset-md-4">
					<form action="" method="post" class="content-padding" id="form-login">
						<h2 clas="text-center">Entrar em sua conta</h2>
						<div class="form-group">
							<label for="exampleInputUser">Usuário</label>
							<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="Insira seu usuário e e-mail">
							<small id="userHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="exampleInputSenha">Senha</label>
							<input type="password" class="form-control" id="get-senha" placeholder="Digite sua senha">
						</div>
						<p><a href="<?php echo baseUrl(); ?>suporte/senha">Esqueci minha senha</a></p>
						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo baseUrl(); ?>agendamento"><button type="button" class="btn-post right">Novo Cliente</button></a>
							</div>
							<div class="col-md-6">
								<button type="submit" class="btn-post right">Entrar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_login.js"></script>