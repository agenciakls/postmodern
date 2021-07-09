// TELAS ADMINISTRAÇÃO 
$("#box-return").slideUp(0);
var atualizarDados = function (acao) {
	if (acao == 'dados') {
		var validacaoAtual = validacao(acao);
		if (validacaoAtual.retorno) { acaoDados(); }
		else { messageErro(validacaoAtual.msg); }
	}
	else if (acao == 'senha') {
		var validacaoAtual = validacao(acao);
		if (validacaoAtual.retorno) { acaoSenha(); }
		else { messageErro(validacaoAtual.msg); }
	}
}

var messageErro = function (msgResponse = 'Preencha todos os campos', style = 'danger') {
	$("#box-return").stop().slideUp(600, function () {
		$("#box-return").removeClass('success');
		$("#box-return").removeClass('warning');
		$("#box-return").removeClass('danger');
		$("#box-return").addClass(style);
		$("#return-message").html(msgResponse);
		$("#box-return").stop().slideDown(600);
	});
}



var acaoSenha = function () {
	// CADASTRO
	var atual_senha = $("#atual_senha").val();
	var novo_senha = $("#novo_senha").val();
	var novo_repete_senha = $("#novo_repete_senha").val();
	
	$.post(window.basePrincipal + 'script/configuracao/', {
		action: 'senha',
		atual_senha: atual_senha,
		novo_senha: novo_senha,
		novo_repete_senha: novo_repete_senha
	}, function (rLogin){
		if (rLogin == 'salvo') { 
			messageErro('As informações foram salvas com sucesso.', 'success'); 
		}
		else { messageErro(rLogin); }
	});
}

var acaoDados = function () {
	// CADASTRO
	var nome = $("#nome").val();
	var sobrenome = $("#sobrenome").val();
	var telefone = $("#telefone").val();
	var celular = $("#celular").val();
	var usuario = $("#usuario").val();
	var email = $("#email").val();
	var pais = $("#pais").val();
	var endereco = $("#endereco").val();
	var cidade = $("#cidade").val();
	var estado = $("#estado").val();
	var bairro = $("#bairro").val();
	var cep = $("#cep").val();
	
	$.post(window.basePrincipal + 'script/configuracao/', {
		action: 'dados',
		nome: nome,
		sobrenome: sobrenome,
		telefone: telefone,
		celular: celular,
		usuario: usuario,
		email: email,
		pais: pais,
		endereco: endereco,
		cidade: cidade,
		estado: estado,
		bairro: bairro,
		cep: cep,

	}, function (rLogin){
		if (rLogin == 'salvo') { 
			messageErro('As informações foram salvas com sucesso.', 'success'); 
		}
		else { messageErro(rLogin); }
	});
}

var validacao = function (acao) {
	
	// CADASTRO
	var nome = $("#nome").val();
	var sobrenome = $("#sobrenome").val();
	var telefone = $("#telefone").val();
	var celular = $("#celular").val();
	var usuario = $("#usuario").val();
	var email = $("#email").val();
	var pais = $("#pais").val();
	var endereco = $("#endereco").val();
	var cidade = $("#cidade").val();
	var estado = $("#estado").val();
	var bairro = $("#bairro").val();
	var cep = $("#cep").val();
	
	// CADASTRO
	var atual_senha = $("#atual_senha").val();
	var novo_senha = $("#novo_senha").val();
	var novo_repete_senha = $("#novo_repete_senha").val();
	
	var validacaoAtual = { 
		'retorno': false, 
		'msg': 'Preencha todos os campos'
	};
	
	if (acao == 'dados') {
		if (nome.length < 3) { validacaoAtual.msg = 'O Nome digitado é muito pequeno'; }
		else if (sobrenome.length < 3) { validacaoAtual.msg = 'O Sobrenome digitado é muito pequeno'; }
		else if (telefone.length < 4 && celular.length < 4) { validacaoAtual.msg = 'Informe ao menos um telefone.'; }
		else if (usuario.length < 4) { validacaoAtual.msg = 'O Nome de Usuário digitado é muito pequeno'; }
		else if (email.length < 6) { validacaoAtual.msg = 'O e-mail digitado não é valido'; }
		else if (pais == '') { validacaoAtual.msg = 'Informe um país válido.'; }
		else if (endereco.length < 4) { validacaoAtual.msg = 'O endereço informado é muito curto'; }
		else if (cidade.length < 3) { validacaoAtual.msg = 'Nome da cidade muito pequeno'; }
		else if (estado.length < 3) { validacaoAtual.msg = 'Nome do estado muito pequeno'; }
		else if (bairro.length < 3) { validacaoAtual.msg = 'Nome do bairro muito pequeno'; }
		else if (cep.length < 4) { validacaoAtual.msg = 'O CEP informado não é válido'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	if (acao == 'senha') {
		if (novo_senha != novo_repete_senha) { validacaoAtual.msg = 'As senhas digitadas não são iguais.'; }
		if (atual_senha.length < 8) { validacaoAtual.msg = 'A senha digitada é muito pequena.'; }
		if (novo_senha.length < 8) { validacaoAtual.msg = 'A senha digitada é muito pequena.'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	return validacaoAtual;
	
}