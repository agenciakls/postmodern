<?php
function adicionarCampos($bancoDados) {
	global $conectar, $campos;
		// var_dump($_POST);
	foreach ($campos as $vl_campo) {
		$inserir_nome[] = sprintf("%s",$vl_campo);
		$inserir_campo[] = sprintf("'%s'", $_POST[$vl_campo]);
	}

	$insert_nome = implode(", ", $inserir_nome);
	$insert_campo = implode(", ", $inserir_campo);
	// SALVAR CATEGORIA
	$salvar_valor = mysqli_query($conectar, sprintf("INSERT INTO %s (%s, status) VALUES (%s, 'ativo')", $bancoDados, $insert_nome, $insert_campo));
	
	return $salvar_valor;
}
?>