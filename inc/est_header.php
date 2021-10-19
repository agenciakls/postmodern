<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo langVar('title'); ?></title>
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
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/style.css?v=5.11.1" type="text/css" />
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
	<?php
	$whatLang = whatLang();
	switch ($whatLang) {
		case 'pt': $mixe = 'mixe'; $versao = 'versao'; $vinyl = 'vinyl'; break;
		case 'en': $mixe = 'mixe_en'; $versao = 'versao_en'; $vinyl = 'vinyl_en'; break;
		case 'es': $mixe = 'mixe_es'; $versao = 'versao_es'; $vinyl = 'vinyl_es'; break;
		default:  $mixe  = 'mixe'; $versao = 'versao'; $vinyl = 'vinyl';
	}
	?>
	var valorMixe = <?php echo number_format(returnSetting($mixe), 2, '.', ''); ?>;
	var valorVersion = <?php echo number_format(returnSetting($versao), 2, '.', ''); ?>;
	var valorVinyl = <?php echo number_format(returnSetting($vinyl), 2, '.', ''); ?>;
	var moedaValor = '<?php echo langVar('moeda'); ?>';
	</script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/functions.js"></script>
</head>
<body class="index-body">
	
<?php

if (!$index || $caminhoCompleto[0] == 'inicio') {
	?>
	<header>
		<nav class="navbar navbar-dark bg-dark box-shadow fixed-top">
			<div class="container d-flex justify-content-between">
				<a href="<?php echo baseUrl(); ?>inicio" class="navbar-brand d-flex align-items-center">
					<h2 class="title-logo">POST MODERN MASTERING</h2>
					<!-- <img src="<?php echo baseUrl(); ?>images/title_logo_3.png" height="50" alt=""> -->
				</a>

				<ul class="nav">
					<li><a href="<?php echo baseUrl(); ?>mastering"><?php echo langVar('menu-studio'); ?></a></li>
					<li>
						<a><?php echo langVar('menu-engenheiro'); ?></a>
						<ul class="submenu">
							<li><a href="<?php echo baseUrl(); ?>biografia"><?php echo langVar('menu-andre'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>discografia"><?php echo langVar('menu-discografia'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>premios"><?php echo langVar('menu-premio'); ?></a></li>
					</ul>
					<li>
						<a><?php echo langVar('menu-servicos'); ?></a>
						<ul class="submenu">
							<li><a href="<?php echo baseUrl(); ?>servicos/masterizacao"><?php echo langVar('menu-masterizacao-tradicional'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>servicos/pmm"><?php echo langVar('menu-masterizacao-pmm-tape-layback'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>servicos/itunes"><?php echo langVar('menu-apple-digital-masters-streaming'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>servicos/high"><?php echo langVar('menu-high-resolution-audio-mastering'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>servicos/vinyl"><?php echo langVar('menu-vinyl-mastering'); ?></a></li>
							<li><a href="<?php echo baseUrl(); ?>servicos/remastering"><?php echo langVar('menu-remastering-restoration'); ?></a></li>
						</ul>
					</li>
					<li><a href="<?php echo baseUrl(); ?>pmm"><?php echo langVar('menu-pmm-ddp-player'); ?></a></li>
					<li><a href="<?php echo baseUrl(); ?>agendamento"><?php echo langVar('menu-agende-sessao'); ?></a></li>
					<?php
					if (isset($usuarioAtual)) {
						?><li><a href="<?php echo baseUrl(); ?>conta"><i class="fa fa-user-circle"></i> <?php echo langVar('menu-conta'); ?></a></li><?php 
					}
					else {
						?><li><a href="<?php echo baseUrl(); ?>login"><i class="fas fa-sign-in-alt"></i> <?php echo langVar('menu-entra'); ?></a></li><?php 
					}
					?>
					<li><a href="https://www.facebook.com/PostModernMastering/"><i class="fab fa-facebook fa-2x" style="margin: -4px 0px;"></i></a></li>
					<li><a href="https://www.instagram.com/postmodernmastering/"><i class="fab fa-instagram fa-2x" style="margin: -4px 0px;"></i></a></li>
			</div>
		</nav>
	</header>
	<?php
}


?>