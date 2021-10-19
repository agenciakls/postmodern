<?php
$localhost = 'localhost';
$usuario = 'andremastering_user';
$senha = 'andremasteringbd@1234';
$banco = 'andremastering_bd';
$basePrincipal = 'https://postmodernmastering.com/';
$caminho = "/home/andremastering/public_html/";

// $localhost = 'localhost';
// $usuario = 'root';
// $senha = 'root';
// $banco = 'andre_dias';
// $basePrincipal = 'http://localhost:8888/andre_dias/';
// $caminho = "/Applications/MAMP/htdocs/andre_dias/";


$conectar = mysqli_connect($localhost, $usuario, $senha, $banco);
mysqli_set_charset($conectar, "utf8");

$link = array(
	'principal' => array(
		'home' => 'site',
		'painel' => 'site',
		'index' => 'index',
		'inicio' => 'site',
		'site' => 'site',
		'historia' => 'historia',
		'fotos' => 'fotos',
		'videos' => 'videos',
		'convidados' => 'convidados',
		'presentes' => 'presentes',
		'playlist' => 'playlist',
		'informacoes' => 'informacoes',
		'mensagem' => 'mensagem'
	)
);

if (isset($_COOKIE['usuario']) && isset($_COOKIE['senha'])) {
	$logUser = $_COOKIE['usuario'];
	$logPass = $_COOKIE['senha'];
	$verifLogin = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s' AND senha='%s'", $logUser, $logPass));
	$cont_num = mysqli_num_rows($verifLogin);
	if ($cont_num == 1) { while ($imp = mysqli_fetch_array($verifLogin)) {
		$usuarioAtual = $imp;
	}}
	else {
		setcookie("usuario", '', time()-3600*24, '/');
		setcookie("senha", '', time()-3600*24, '/');
	}
}
else {
	setcookie("usuario", '', time()-3600*24, '/');
	setcookie("senha", '', time()-3600*24, '/');
}
?>