<?php
global $usuarioAtual;
if (isset($_POST['action']) && $_POST['action'] == 'dados') {
	$dadosVerificar = false;
	$campos = array("nome", "sobrenome", "telefone", "celular", "usuario", "email", "pais", "endereco", "estado", "cidade", "bairro", "cep");
	defineCampo($campos);
	
	$verificarEmail = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE email='%s'", $email));
	$verificarUsuario = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE usuario='%s'", $usuario));
	
	if ($usuarioAtual['usuario'] != $usuario && (mysqli_num_rows($verificarUsuario)) > 0) { echo 'Este nome de usuário não está disponível.'; }
	else if ($usuarioAtual['email'] != $email && (mysqli_num_rows($verificarEmail)) > 0) { echo 'Este e-mail já existe no sistema.'; }
	else if (strlen($nome) < 3) { echo 'O nome digitado é muito pequeno.'; }
	else if (strlen($sobrenome) < 3) { echo 'O sobrenome digitado é muito pequeno.'; }
	else if (strlen($telefone) < 4 && strlen($celular) < 4) { echo 'Insira um telefone ou um celular'; }
	else if (strlen($usuario) < 4) { echo 'O usuário digitado é pequeno.'; }
	else if (strlen($email) < 6) { echo 'O e-mail digitado é muito pequeno.'; }
	else if ($pais == '') { echo 'Selecione um pais válido.'; }
	else if (strlen($endereco) < 4) { echo 'O endereço digitado é muito pequeno.'; }
	else if (strlen($cidade) < 4) { echo 'A cidade digitada é muito pequena.'; }
	else if (strlen($estado) < 4) { echo 'O estado digitado é muito pequeno.'; }
	else if (strlen($bairro) < 3) { echo 'O bairro digitado é muito pequeno.'; }
	else if (strlen($cep) < 5) { echo 'O CEP digitado não é válido.'; }
	else { $dadosVerificar = true; }
	
	if ($dadosVerificar == true) {
		$atualizarDados = atualizarCampos('clientes', $usuarioAtual['id']);
		if ($atualizarDados) {
			$loggon = logarUsuario($usuario, $usuarioAtual['senha']);
			echo 'salvo';
		}
		else { echo 'Os dados não foram salvos com sucesso.'; }
	}
}
else if (isset($_POST['action']) && $_POST['action'] == 'senha') {
	$senhaVerificar = false;
	$campos = array("atual_senha", "novo_senha", "novo_repete_senha");
	defineCampo($campos);
	$verificarSenha = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE id='%s' AND senha='%s'", $usuarioAtual['id'], $atual_senha));
	if ($novo_senha != $novo_repete_senha) { echo 'As novas senhas digitadas estão diferentes.'; }
	else if (strlen($novo_senha) < 8) { echo 'A nova senha digitada é muito pequena.'; }
	else if ((mysqli_num_rows($verificarSenha)) != 1) { echo 'A sua senha atual está errada.'; }
	else { $senhaVerificar = true; }
	
	if ($senhaVerificar == true) {
		$atualizarSenha = mysqli_query($conectar, sprintf("UPDATE clientes SET senha='%s' WHERE id='%s'", $novo_senha, $usuarioAtual['id']));
		if ($atualizarSenha) {
			$loggon = logarUsuario($usuarioAtual['usuario'], $novo_senha);
			echo 'salvo';
		}
		else { echo 'A senha não foi salva com sucesso.'; }
	}
}
exit();
?>