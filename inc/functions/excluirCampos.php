<?php
function excluirCampos($bancoDados, $p) {
	global $conectar;
	if (isset($_POST['excluir'])) {
		// SALVAR STATUS EXCLUÍDO
		$salvar_valor = mysqli_query($conectar, sprintf("UPDATE %s SET status='excluido' WHERE id='%s'", $bancoDados, $p));
		
		// VERIFICAR SE FOI SALVA E ARMAZENAR RESPOSTA
		return $salvar_valor;
	}
}
?>