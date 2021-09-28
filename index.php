<?php 
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
clearstatcache();

require_once 'inc/security.php';
require_once 'inc/load.php';

$urlCompleta = $_SERVER['REQUEST_URI'];
$separandoGet = strpos($urlCompleta, '?');
if ($separandoGet) {
	$urlCompleta = substr($urlCompleta, 0, $separandoGet);
}
$serparandoExtensao = strpos($urlCompleta, '.php');
if ($serparandoExtensao) {
	$urlCompleta = substr($urlCompleta, 0, $serparandoExtensao);
}
$urlCompleta = substr($urlCompleta, 1);
$caminhoCompleto = explode('/', $urlCompleta);
$caminhoCompleto = array_splice($caminhoCompleto, 0, 4);
if (count($caminhoCompleto) > 1) {
	$caminhoCompleto = array_filter($caminhoCompleto, function($value) { return $value !== ''; } );
}
$quantidadeCaminho = count($caminhoCompleto);

$index = false;
if (count($caminhoCompleto) == 1 && $caminhoCompleto[0] == '') {
	$index = true;
}
else {	
	$linksHome = array('home', 'index', 'index.php', 'home.php', 'inicio', 'inicio.php');
	foreach ($linksHome as $linkInicial) {
		if ($linkInicial == $caminhoCompleto) {
			$index = true;
			break;
		}
	}
}
$home = 'pages/home/index.php';
$areaAtual = (isset($caminhoCompleto[0])) ? $caminhoCompleto[0] : '';

if ($caminhoCompleto[0] == 'conta') { require_once 'inc/login_verificar.php'; }
else if ($caminhoCompleto[0] == 'sair') { require_once 'inc/exit.php'; }

if (!in_array("script", $caminhoCompleto)) {
	if ($caminhoCompleto[0] == 'controle') { 
		if (isset($caminhoCompleto[1]) && $caminhoCompleto[1] != '') { 
			if ($caminhoCompleto[1] == 'sair') { require_once 'inc/admin_exit.php'; }
			require_once 'inc/admin_security.php';
			require_once 'inc/admin_header.php';
		}
	}
	else if ($caminhoCompleto[0] == 'conta') { 
		require_once 'inc/conta_header.php';
	}
	else { require_once 'inc/est_header.php'; }
}
if ($index == false) {
	$baseFinal = '';
	$chamadaPages = false;
	$posicaoFinal = $quantidadeCaminho - 1;
	$base = 'pages';
	if ($posicaoFinal == 0 || $caminhoCompleto[0] == 'inicio') {
		if ($caminhoCompleto[0] == '' && file_exists($home)) {
			$chamadaPages = true;
			require_once $home;
		}
		else if ($caminhoCompleto[0] == 'inicio') {
			$chamadaPages = true;
			require_once 'pages/inicio/index.php';
		}
		else if (file_exists($base . '/' . $caminhoCompleto[0] . '.php')) {
			$chamadaPages = true;
			require_once $base . '/' . $caminhoCompleto[0] . '.php';
		}
		else if (file_exists($base . '/' . $caminhoCompleto[0] . '/index.php')) {
			$chamadaPages = true;
			require_once $base . '/' . $caminhoCompleto[0] . '/index.php';
		}
	}
	else {
		for($h = 0; $h <= $posicaoFinal; $h++) {
			if ($caminhoCompleto[$h]) { $baseFinal .= '/' . $caminhoCompleto[$h]; } else { break; }
		}
		if (file_exists($base . $baseFinal . '.php')) {
				$chamadaPages = true;
				require_once $base . $baseFinal . '.php';
		}
		else if (file_exists($base . $baseFinal . '/index.php')) {
			$chamadaPages = true;
			require_once $base . $baseFinal . '/index.php';
		}
		else if (file_exists($base . $baseFinal . '/index.php')) {
			$chamadaPages = true;
			require_once $base . $baseFinal . '/index.php';
		}
		else if (file_exists($base . $baseFinal)) {
			$chamadaPages = true;
			require_once $base . $baseFinal;
		}
	}
	if (!$chamadaPages) {
		require_once $base . '/404/index.php';
	}
	
}
else {
	require_once $home;
}
if (!in_array("script", $caminhoCompleto)) {
	if ($caminhoCompleto[0] == 'controle') { 
		if (isset($caminhoCompleto[1]) && $caminhoCompleto[1] != '') { 
			require_once 'inc/admin_footer.php';
		}
	}
	else if ($caminhoCompleto[0] == 'conta') { 
		require_once 'inc/conta_footer.php';
	}
	else { require_once 'inc/est_footer.php'; }
}
?>