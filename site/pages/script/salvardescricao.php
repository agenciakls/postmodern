<?php 
if (isset($_POST['id']) && isset($_POST['descricao'])) {
	$idPedido = $_POST['id'];
	$campos = array('descricao');
	$argPedidos = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido,
			'id_cliente' => $usuarioAtual['id'],
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