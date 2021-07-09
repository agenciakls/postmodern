<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Post Modern Mastering</title>
	<meta charset="UTF-8" />
	<meta name="description" content="André Dias - Post Modern Mastering">
	<meta name="author" content="Agência WS" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!--	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Lato|Open+Sans|Quicksand" rel="stylesheet">
	
	<!-- STYLES -->
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-brands.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-regular.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-solid.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fontawesome.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fontawesome-all.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.structure.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.theme.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/style.css" type="text/css" />
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/button_right.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/button_left.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/button_right_hover.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/button_left_hover.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/logo.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/title_logo.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/title_logo_2.png">
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/capa_5.jpg">
	
	<!-- ÍCONE -->
	<link rel="icon" type="image/x-icon" href="<?php echo baseUrl(); ?>img/icon.ico" />
	
	<!-- JAVASCRIPT -->
	<script>
	var basePrincipal = '<?php echo $basePrincipal; ?>';
	var valorMixe = <?php echo returnSetting('mixe'); ?>;
	var valorVersion = <?php echo returnSetting('versao'); ?>;
	var valorVinyl = <?php echo returnSetting('vinyl'); ?>;
	</script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/functions.js"></script>
</head>
<body class="index-body">
	
<header>
	<nav class="navbar navbar-dark bg-dark box-shadow fixed-top">
		<div class="container d-flex justify-content-between">
			<a href="<?php echo baseUrl(); ?>" class="navbar-brand d-flex align-items-center">
				<h2 class="title-logo">POST MODERN MASTERING</h2>
				<!-- <img src="<?php echo baseUrl(); ?>images/title_logo_3.png" height="50" alt=""> -->
			</a>

			<ul class="nav">
				<li><a href="<?php echo baseUrl(); ?>mastering">Studio</a></li>
				<li>
					<a>Engenheiro</a>
					<ul class="submenu">
						<li><a href="<?php echo baseUrl(); ?>biografia">André Dias</a></li>
						<li><a href="<?php echo baseUrl(); ?>discografia">Discografia</a></li>
						<li><a href="<?php echo baseUrl(); ?>premios">Prêmios</a></li>
				</ul>
				<li>
					<a>Serviços</a>
					<ul class="submenu">
						<li><a href="<?php echo baseUrl(); ?>servicos/masterizacao">Masterização tradicional</a></li>
						<li><a href="<?php echo baseUrl(); ?>servicos/pmm">Masterização PMM Tape Layback®</a></li>
						<li><a href="<?php echo baseUrl(); ?>servicos/itunes">Mastered for iTunes e Streaming</a></li>
						<li><a href="<?php echo baseUrl(); ?>servicos/high">High Resolution Audio Mastering</a></li>
						<li><a href="<?php echo baseUrl(); ?>servicos/vinyl">Vinyl Mastering</a></li>
						<li><a href="<?php echo baseUrl(); ?>servicos/remastering">Remastering / Restoration</a></li>
					</ul>
				</li>
				<li><a href="<?php echo baseUrl(); ?>pmm">PMM DDP Player</a></li>
				<li><a href="<?php echo baseUrl(); ?>agendamento">Agende uma Sessão</a></li>
				<?php
				if (isset($usuarioAtual)) {
					?>
					<li><a href="<?php echo baseUrl(); ?>conta"><i class="fa fa-user-circle"></i> Minha Conta</a></li>
					<?php 
				}
				else {
					?>
					<li><a href="<?php echo baseUrl(); ?>login"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>
					<?php 
				}
				?>

		
		</div>
	</nav>
</header>