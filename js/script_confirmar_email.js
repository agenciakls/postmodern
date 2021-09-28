$("#box-return").slideUp(0);
var efetuarLogin = function () {
	var validacaoAtual = validacao();
	if (validacaoAtual.retorno) {
		acaoLogin();
	}
	else {
		messageErro(validacaoAtual.msg);
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

var acaoLogin = function () {
	// USUÁRIO E SENHA
	var usuario = $("#get-usuario").val();
	var senha = $("#get-senha").val();
	var token = $("#get-token").val();
	
	$.post(window.basePrincipal + 'script/confirmar_email/', {
		usuario: usuario,
		senha: senha,
		token: token
	}, function (rLogin){
		if (rLogin == 'conectado') {
			window.location = window.basePrincipal + "conta/";
		}
		else if (rLogin == 'nao_encontrado') { messageErro('Não foi possível identificar seus dados, entre em contato.'); }
		else if (rLogin == 'nao_conectado') { messageErro('Usuário ou Senha inválido, tente novamente.'); }
		else { messageErro('Houve algum erro, tente novamente mais tarde!'); }
	});
}

var validacao = function () {
	
	// USUÁRIO E SENHA
	var usuario = $("#get-usuario").val();
	var senha = $("#get-senha").val();
	
	var validacaoAtual = { 
		'retorno': false, 
		'msg': 'Preencha todos os campos'
	};
	
	if (usuario == '') { validacaoAtual.msg = 'Digite o nome de usuário.';}
	else if (senha == '') { validacaoAtual.msg = 'Digite a sua senha para continuar.'; }
	else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	console.log(validacaoAtual);
	return validacaoAtual;
	
}