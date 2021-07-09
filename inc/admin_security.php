<?php
if (isset($_COOKIE['admin_user']) && isset($_COOKIE['admin_pass'])) {
	$usuario = $_COOKIE['admin_user'];
	$senha = $_COOKIE['admin_pass'];
	$args = array(
		'table' => 'admin_usuario',
		'where' => array(
			'usuario' => $usuario,
			'senha' => $senha,
			'status' => 'ativo'
		)
	);
	
	$pegarUsuario = getData( $args );
	$quantidade = quantityData( $pegarUsuario );
	if ( $quantidade == 1 ) {
		while ($impAdmin = fetchData($pegarUsuario)) {
			$adminUser = $impAdmin;
		}
	}
	else {
		header('location: ' . baseUrl() . 'controle');
		setcookie("admin_user", '', time()-3600*24, '/');
		setcookie("admin_senha", '', time()-3600*24, '/');
	}
}
?>