<?php 
function salvarPedidos($idCliente) {
	$campos = array("mixes", "versoes", "vinyl", "data", "dataprazo", "artista", "projeto");
	$GLOBALS['campos'] = $campos;
	if (verif_campo($campos)) {
		defineCampo($campos);
		global $mixes, $versoes, $vinyl, $data, $dataprazo;
		$valorMixe = returnSetting('mixe'); $valorVersao = returnSetting('versao'); $valorVinyl = returnSetting('vinyl');
		$_POST['id_cliente'] = $idCliente;  $campos[] = 'id_cliente'; $GLOBALS['campos'][] = 'id_cliente';
		$_POST['valor'] = ($valorMixe * $mixes) + ($valorVersao * $versoes) + ($valorVinyl * $vinyl); $campos[] = 'valor'; $GLOBALS['campos'][] = 'valor';
		$_POST['data'] = strftime("%Y-%m-%d %H:%M:%S", strtotime($data)); 
		$_POST['dataprazo'] = strftime("%Y-%m-%d %H:%M:%S", strtotime($dataprazo)); 
		$_POST['pagamento_status'] = 2; $campos[] = 'pagamento_status'; $GLOBALS['campos'][] = 'pagamento_status';
		$_POST['email_status'] = 'nao_confirmado'; $campos[] = 'email_status'; $GLOBALS['campos'][] = 'email_status';
		$_POST['situacao'] = 1;  $campos[] = 'situacao'; $GLOBALS['campos'][] = 'situacao';
		defineCampo($campos);
		if (adicionarCampos('pedidos')) { return true; }
		else { return 'nao_salvo'; }
	}
	else {
		return 'erro';
	}
}
?>