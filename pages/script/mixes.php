<?php 
$campos = array("mixes", "versoes", "vinyl", "data", "artista", "projeto", "moeda");
$jsonResponse = array('status' => 'erro', 'response' => 'Houve algum erro');
if (verif_campo($campos)) {
	$valorMixe = returnSetting('mixe');
	$valorVersao = returnSetting('versoes');
	$valorVinyl = returnSetting('vinyl');
	$_POST['valor'] = $mixes + $versoes + $vinyl; $campos[] = 'valor';
	$_POST['data'] = strftime("%Y-%m-%d %H:%M:%S", strtotime($data));
	$_POST['pagamento_status'] = 1; $campos[] = 'pagamento_status';
	$_POST['email_status'] = 'nao_confirmado'; $campos[] = 'email_status';
	$_POST['situacao'] = 1; $campos[] = 'situacao';
	$_POST['id_cliente'] = pegarIdCliente(); $campos[] = 'id_cliente';
	defineCampo($campos);
	if (adicionarCampos('pedidos')) { $jsonResponse['status'] = 'salvo'; }
	else { $jsonResponse['status'] = 'nao_salvo'; }
}
echo json_encode($arrayResponse);
exit();
?>