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
	<link rel="prefetch" href="<?php echo baseUrl(); ?>images/capa.jpg">
	
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
	<div class="collapse bg-dark" id="navbarHeader">
		<div id="navbarList">
			<ul class="list-unstyled">
				<li><a href="<?php echo baseUrl(); ?>conta" class="text-white">Minha Conta</a></li>
				<li><a href="<?php echo baseUrl(); ?>" class="text-white">Novo Pedido</a></li>
				<li><a href="<?php echo baseUrl(); ?>conta/configuracao" class="text-white">Configuração</a></li>
				<li><a href="<?php echo baseUrl(); ?>" class="text-white">Voltar ao Site</a></li>
				<li><a href="<?php echo baseUrl(); ?>sair" class="text-white">Sair</a></li>
			</ul>
		</div>
	</div>
	<nav class="navbar navbar-dark bg-dark box-shadow fixed-top">
		<div class="container d-flex justify-content-between">
			<a href="#" class="navbar-brand d-flex align-items-center">
				<h2 class="title-logo">POST MODERN MASTERING</h2>
				<!-- <img src="<?php echo baseUrl(); ?>images/title_logo_3.png" height="50" alt=""> -->
			</a>
			<nav class="navbar navbar-dark bg-dark box-shadow fixed-top">
				<div class="container d-flex justify-content-between">
					<a href="#" class="navbar-brand d-flex align-items-center">
						<img src="<?php echo baseUrl(); ?>images/title_logo_3.png" height="50" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</nav>
		</div>
	</nav>
</header>