<?php 
$campos = array("mixes", "versoes", "vinyl", "data", "artista", "projeto", "moeda");
if (verif_campo($campos)) {
	
	/*
	var valorMixe = <?php echo number_format(returnSetting('mixe') / langVar('mixe'), 2); ?>;
	var valorVersion = <?php echo number_format(returnSetting('versao') / langVar('version'), 2); ?>;
	var valorVinyl = <?php echo number_format(returnSetting('vinyl') / langVar('vinyl'), 2); ?>;
	*/

	$valorMixe = returnSetting('mixe') / langVar('mixe');
	$valorVersao = returnSetting('versoes') / langVar('version');
	$valorVinyl = returnSetting('vinyl') / langVar('vinyl');
	$_POST['valor'] = ($valorMixe * $mixes) + ($valorVersao * $versoes) + ($valorVinyl * $vinyl); $campos[] = 'valor';
	$_POST['data'] = strftime("%Y-%m-%d %H:%M:%S", strtotime($data));
	$_POST['pagamento_status'] = 1; $campos[] = 'pagamento_status';
	$_POST['email_status'] = 'nao_confirmado'; $campos[] = 'email_status';
	$_POST['situacao'] = 1; $campos[] = 'situacao';
	$_POST['id_cliente'] = pegarIdCliente(); $campos[] = 'id_cliente';
	defineCampo($campos);
	if (adicionarCampos('pedidos')) { echo 'salvo'; }
	else { echo 'nao_salvo'; }
}
else {
	echo 'erro';
}
exit();
?>