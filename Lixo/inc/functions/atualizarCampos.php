<?php
function atualizarCampos($bancoDados, $p) {
	global $conectar, $campos;
	$atualizar_campo = array();
	foreach ($campos as $vl_campo) {
		$atualizar_campo[] = sprintf("%s='%s'",$vl_campo, $_POST[$vl_campo]);
	}
	$update_campos = implode(", ", $atualizar_campo);
	// SALVAR CATEGORIA
	$salvar_valor = mysqli_query($conectar, sprintf("UPDATE %s SET %s WHERE id='%s'", $bancoDados, $update_campos, $p));
	
	// VERIFICAR SE FOI SALVA E ARMAZENAR RESPOSTA
	return $salvar_valor;
}
?>