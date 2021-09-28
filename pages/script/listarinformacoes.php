<?php 
if (isset($_POST['id'])) {
	$idPedido = $_POST['id'];
	$argPedidos = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido,
			'status' => 'ativo'
		)
	);
	$pedidosUsuario = getData( $argPedidos );
	$qtPedidos = quantityData( $pedidosUsuario );
	if ($qtPedidos == 1) {
		while ($impPedido = fetchData($pedidosUsuario)) {
			$retorno = ($impPedido['informacoes'] != '') ? $impPedido['informacoes'] : 'none';
			echo $retorno;
		}
	}
	else {
		echo 'none';
	}
}
else {
	echo 'none';
}
?>