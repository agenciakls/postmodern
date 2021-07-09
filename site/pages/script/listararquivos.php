<?php 
if (isset($_POST['id'])) {
	$idPedido = $_POST['id'];
	$idUser = $usuarioAtual['id'];
	$args = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idPedido,
			'id_cliente' => $usuarioAtual[ 'id' ],
			'status' => 'ativo'
		)
	);
	$pegarPedido = getData( $args );
	$quantidade = quantityData( $pegarPedido );
	if ( $quantidade == 1 ) {
		$fileClient = array(
			'table' => 'arquivos_clientes',
			'where' => array(
				'id' => $idPedido,
				'status' => 'ativo'
			)
		);
		$pegarArquivos = getData( $fileClient );
		$quantidade = quantityData( $pegarArquivos );
		if ( $quantidade > 0 ) {
			while ($impArquivo = fetchData($pegarArquivos)) {
				echo json_encode($pegarArquivos);
			}
		}
	}
}
?>