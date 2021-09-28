<?php 
if (isset($_POST['id']) && isset($_POST['pagamento_status'])) {
	$idPedido = $_POST['id'];
	$campos = array('pagamento_status');
	$argPedidos = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido
		)
	);
	$pedidosUsuario = getData( $argPedidos );
	$qtPedidos = quantityData( $pedidosUsuario );
	if ($qtPedidos == 1) {
		if (verif_campo($campos)) {
			defineCampo($campos);
			$atualizarCampo = atualizarCampos('pedidos', $idPedido);
			if ($atualizarCampo) {
				echo 'enviado';
				$argsEmail = array(
					'type' => 'pagamento',
					'destinatario' => array(
						'nome' => $usuarioAtual['nome'],
						'email' => $usuarioAtual['email']
					), 
					'remetente' => array(
						'nome' => 'Post Modern Mastering', 
						'email' => 'no-reply@postmodernmastering.com'
					),
				);
				sendmail($argsEmail);
				sendnotification($argsEmail);
				echo 'salvo';
			}
			else { echo 'nao_salvo4'; }
		}
		else { echo 'nao_salvo3'; }
	}
	else {
		echo 'nao_salvo2';
	}
}
else { echo 'nao_salvo1'; }
?>