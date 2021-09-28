<?php 
if (isset($_POST['id']) && isset($_POST['status']) && isset($_POST['action'])) {
	$idPedido = $_POST['id'];
	$status = $_POST['status'];
	$action = $_POST['action'];
	$campos = array($action); $_POST[$action] = $status;
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
		if (verif_campo($campos)) {
			defineCampo($campos);
			$atualizarStatus = atualizarCampos('pedidos', $idPedido);
			if ($atualizarStatus) { echo 'salvo'; }
			else { echo 'nao_salvo'; }
		}
		else { echo 'nao_salvo'; }
	}
	else { echo 'nao_salvo'; }
}
else { echo 'nao_salvo'; }
?>