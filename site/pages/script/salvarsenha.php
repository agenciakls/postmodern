<?php 
$campos = array('senha', 'confirme_senha', 'token');
if (verif_campo($campos)) {
	defineCampo($campos);
	$args = array(
		'table' => 'clientes_token',
		'where' => array(
			'token' => $token,
			'status' => 'ativo',
		)
	);
	
	$pegarUsuario = getData( $args );
	$quantidade = quantityData( $pegarUsuario );
	if ( $quantidade == 1 ) {
		while ($impToken = fetchData($pegarUsuario)) {
			$idCliente = $impToken['cliente_id'];
			$salvarSenha = mysqli_query($conectar, sprintf("UPDATE clientes SET senha='%s' WHERE id='%s'", $senha, $idCliente));
			$atualizarToken = mysqli_query($conectar, sprintf("UPDATE token_senha SET status='inativo' WHERE token='%s'", $token));
			if ($salvarSenha && $atualizarToken) { echo 'salvo'; }
			else { echo 'nao_salvo'; }
		}
	}
	else { echo 'nao_existe'; }
}
else {echo 'erro'; }
?>