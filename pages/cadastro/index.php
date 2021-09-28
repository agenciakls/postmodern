<main role="main">
	<section class="jumbotron text-center header-slogan" style="background-image: url(<?php echo baseUrl(); ?>images/background_05.jpg) !important;">
		<div class="container">
			<img src="<?php echo baseUrl(); ?>images/title_logo_2.png" width="450" alt="">
			<!-- <p class="lead text-muted text-slogan">Entre em contato com o atendimento deste engenheiro se você está interessado em reservar uma sessão</p> -->
		</div>
	</section>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo langVar('page-cadastro-title'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-6 offset-md-3">
					<form class="content-padding">
						<?php echo langVar('page-cadastro-content'); ?>
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