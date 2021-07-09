<?php
function associarUsuario() {
	global $conectar;
	$nome = addslashes($_POST['nome']);
	$sobrenome = addslashes($_POST['sobrenome']);
	$procurarUsuario = mysqli_query($conectar, "SELECT * FROM convidados WHERE status='ativo' AND (nome LIKE '%$nome%' AND nome LIKE '%$sobrenome%')");
	if ((mysqli_num_rows($procurarUsuario)) == 1) {
		while ($impUser = mysqli_fetch_array($procurarUsuario)) {
			return $impUser['id'];
		}
	}
	else {
		return 0;
	}
}
?>