<?php 
if (isset($_POST['id']) && isset($_POST['informacoes'])) {
	$idPedido = $_POST['id'];
	$campos = array('informacoes');
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
			$atualizarCampo = atualizarCampos('pedidos', $idPedido);
			if ($atualizarCampo) {
				echo 'salvo';
			}
			else { echo 'nao_salvo'; }
		}
		else { echo 'nao_salvo'; }
	}
	else {
		echo 'nao_salvo';
	}
}
else { echo 'nao_salvo'; }
?>