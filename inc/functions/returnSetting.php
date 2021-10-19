<?php 
function returnSetting($nameField) {
	global $conectar;
	if ($nameField) {
		$args = array(
			'table' => 'admin_settings',
			'where' => array(
				'name' => $nameField
			)
		);
		$pegarValor = getData( $args );
		$quantidade = quantityData( $pegarValor );
		if ( $quantidade == 1 ) {
			while ($impArquivo = fetchData($pegarValor)) {
				return $impArquivo['content'];
			}
		}
		else { return false; }
	}
}
?>