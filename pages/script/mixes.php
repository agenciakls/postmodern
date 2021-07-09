<?php 
$campos = array("mixes", "versoes", "data", "artista", "projeto");
if (verif_campo($campos)) {
	$valorMixe = 250; $valorVersao = 150;
	$_POST['valor'] = ($valorMixe * $mixes) + ($valorVersao * $versoes); $campos[] = 'valor';
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