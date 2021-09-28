<?php
function relationData($id) {
	$conectar;
	$argClientes = array(
		'table' => 'pagamento_tipos',
		'where' => array(
			'id' => $id,
		)
	);
	$relationPay = getData( $argClientes );
	if (quantityData($relationPay) == 1) {while ($impPay = fetchData($relationPay)) { 
		return $impPay;
	}}
	else {return false;}
}
?>