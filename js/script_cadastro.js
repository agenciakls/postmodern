var conditionNumber = function (status = false) {
	if (status) {
		$( "#get-versions" ).prop( "disabled", false );
		$( "#get-vinyl" ).prop( "disabled", false );
	}
	else {
		$( "#get-versions" ).val("0");
		$( "#get-vinyl" ).val("0");
		$( "#get-versions" ).prop( "disabled", true );
		$( "#get-vinyl" ).prop( "disabled", true );
	}
}
conditionNumber();
// PREÇOS
$('.field-mix').on('keyup', function ( e ) {
	// teste
	var mixes = $("#get-mixes").val();

	if (mixes > 0) { conditionNumber(true); }
	else { conditionNumber(false); }

	var versions = $("#get-versions").val();
	var vinyl = $("#get-vinyl").val();

	var valorMixe = window.valorMixe;
	var valorVersion = window.valorVersion;
	var valorVinyl = window.valorVinyl;
	var setMixes = mixes * valorMixe;
	var setVersions = versions * valorVersion;
	var setVinyl = vinyl * valorVinyl;
	var setTotal = parseInt(setMixes + setVersions + setVinyl);
	var moedaValor = window.moedaValor;


	$("#set-mixes").html(moedaValor + ' ' + setMixes);
	$("#set-versions").html(moedaValor + ' ' + setVersions);
	$("#set-vinyl").html(moedaValor + ' ' + setVinyl);
	$("#set-total").html(moedaValor + ' ' + setTotal);
	$("#show-total").html(moedaValor + ' ' + setTotal);
	
});

// NÚMEROS 
$('.field-mix').val(0);
$('.field-mix').on('keypress', function ( e ) {
	var tecla = e.which;
	var quantidade = $(this).val();
	if (quantidade < 99) {
		if (quantidade == 0) { $(this).val(''); }
		if((tecla>47 && tecla<58)) { return true; } else{ if (tecla==8 || tecla==0) { return true; } else { return false; } }
	}
	else {$(this).val(0); return false;}
});

var selectMonth = function (month) {
	switch(month) {
		case 1: var month = 'Janeiro'; break;
		case 2: var month = 'Fevereiro'; break;
		case 3: var month = 'Março'; break;
		case 4: var month = 'Abril'; break;
		case 5: var month = 'Maio'; break;
		case 6: var month = 'Junho'; break;
		case 7: var month = 'Julho'; break;
		case 8: var month = 'Agosto'; break;
		case 9: var month = 'Setembro'; break;
		case 10: var month = 'Outubro'; break;
		case 11: var month = 'Novembro'; break;
		case 12: var month = 'Dezembro'; break;
	}
	return month;
}

// DATEPICKER
dateSelected = '';
dateSelectedPrazo = '';
$("#datepicker").fadeOut(0);
$("#orcamento-detalhes").fadeOut(0);
$( function() {
	var idiomaAtual = window.idiomaAtual;
	$.datepicker.regional['pt'] = {
		closeText: 'Fechar',
		prevText: 'Anterior',
		nextText: 'Próximo',
		currentText: 'Hoje',
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
		'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
		dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.regional['en'] = {
		closeText: 'Close',
		prevText: 'Previous',
		nextText: 'Next',
		currentText: 'Today',
		monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
		monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
		dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
		dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
		dayNamesMin: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: 'Anterior',
		nextText: 'Próximo',
		currentText: 'Hoy dia',
		monthNames: ['Enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
		monthNamesShort: ['Ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
		dayNames: [ 'domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'sábado' ],
		dayNamesShort: [ 'dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'sáb' ],
		dayNamesMin: [ 'dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'sáb' ],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional[idiomaAtual]);
	$( "#datepicker" ).datepicker({
		language: idiomaAtual,
		minDate: new Date(),
		beforeShowDay: $.datepicker.noWeekends,
		onSelect: function (dateText, inst) {
			$("#datepicker").delay(100).fadeOut(100);
			var date = $(this).datepicker('getDate');
			var day  = date.getDate(); 
			var month = date.getMonth() + 1;
			var year  = date.getFullYear();
			var hour = '06:00';

			var prazoDate = $(this).datepicker('getDate');
			prazoDate = new Date(prazoDate);
			prazoDate.setDate(prazoDate.getDate() + 3);
			var prazoDay = prazoDate.getDate();
			var prazoMonth = prazoDate.getMonth() + 1;
			var prazoYear = prazoDate.getFullYear();
			var prazoHour = hour;

			dateSelected = year + '-' + month + '-' + day + ' ' + hour + ':00';
			dateSelectedPrazo = prazoYear + '-' + prazoMonth + '-' + prazoDay + ' ' + prazoHour + ':00';
			month = selectMonth(month);
			prazoMonth = selectMonth(prazoMonth);

			$("#setDate").html(day + ' de ' + month + ' de ' + year);
			$("#setHour").html(hour);
			$("#prazoDate").html(prazoDay + ' de ' + prazoMonth + ' de ' + prazoYear);
			$("#prazoHour").html(prazoHour);
			$("#orcamento-detalhes").fadeIn(0);
		}
	});
} );
$("#call-calendar").on('click', function () {
	$("#datepicker").fadeToggle(100);
});

// TELAS ADMINISTRAÇÃO 
$("#tela-1 #box-return").slideUp(0);
$("#tela-2 #box-return").slideUp(0);
$("#tela-3 #box-return").slideUp(0);
$("#tela-4 #box-return").slideUp(0);
$("#tela-1").slideUp(0);
$("#tela-2").slideUp(0);
$("#tela-3").slideUp(0);
$("#tela-4").slideUp(0);
var telaAtual = 1;

$("#tela-" + telaAtual).slideDown(600);
var mudaTela = function (acao) {
	if (acao == 'proximo') {
		var validacaoAtual = validacao(telaAtual);
		if (validacaoAtual.retorno && telaAtual == 3) {
			acaoLogin();
		}
		else if (validacaoAtual.retorno && telaAtual == 4) {
			acaoCadastro();
		}
		else if (validacaoAtual.retorno) {
			$("#tela-" + telaAtual).slideUp(600, function () {
				telaProxima = telaAtual + 1;
				$("#tela-" + telaProxima).slideDown(600);
				telaAtual = telaProxima;
			});
			$("#tela-" + telaAtual + " #box-return").slideUp(600);
		}
		else { 
			messageErro(validacaoAtual.msg);
		}
	}
	else if (acao == 'novo') {
		$("#tela-" + telaAtual).slideUp(600, function () {
			telaProxima = telaAtual + 1;
			$("#tela-" + telaProxima).slideDown(600);
			telaAtual = telaProxima;
		});
	}
	else if (acao == 'anterior') {
		$("#tela-" + telaAtual).slideUp(600, function () {
			telaAnterior = telaAtual - 1;
			$("#tela-" + telaAnterior).slideDown(600);
			telaAtual = telaAnterior;
		});
	}
}

var messageErro = function (msgResponse = 'Preencha todos os campos', style = 'danger') {
	$("#tela-" + telaAtual + " #box-return").stop().slideUp(600, function () {
		$("#tela-" + telaAtual + " #box-return").removeClass('success');
		$("#tela-" + telaAtual + " #box-return").removeClass('warning');
		$("#tela-" + telaAtual + " #box-return").removeClass('danger');
		$("#tela-" + telaAtual + " #box-return").addClass(style);
		$("#tela-" + telaAtual + " #return-message").html(msgResponse);
		$("#tela-" + telaAtual + " #box-return").stop().slideDown(600);
	});
}


var acaoLogin = function () {
	messageErro('Aguarde enquanto processamos os seus dados.', 'warning');
	// USUÁRIO E SENHA
	var usuario = $("#get-usuario").val();
	var senha = $("#get-senha").val();
	
	// MIXES E VERSÕES
	var mixes = $("#get-mixes").val();
	var versions = $("#get-versions").val();
	var vinyl = $("#get-vinyl").val();
	var dataHora = dateSelected;
	var dataHoraPrazo = dateSelectedPrazo;
	
	// ARTISTA E PROJETO
	var artista = $("#get-artista").val();
	var projeto = $("#get-projeto").val();
	
	var novo_moeda = window.moedaValor;

	$.post(window.basePrincipal + 'script/login/', {
		usuario: usuario,
		senha: senha,
		mixes: mixes,
		versoes: versions,
		vinyl: vinyl,
		data: dataHora,
		dataprazo: dataHoraPrazo,
		artista: artista,
		projeto: projeto,
		moeda: novo_moeda
	}, function (rLogin){
		responseLogin = JSON.parse(rLogin);
		if (responseLogin.status == 'conectado') { 
			messageErro('Dados salvos com sucesso, você será redirecionado!', 'success');
			window.location = window.basePrincipal + "conta/";
		}
		else if (responseLogin.status == 'nao_conectado') { messageErro('Usuário ou Senha inválido, tente novamente.'); }
		else { messageErro('Houve algum erro, tente novamente mais tarde!'); }
	});
}

var acaoCadastro = function () {
	messageErro('Aguarde enquanto processamos os seus dados.', 'warning');
	// CADASTRO
	var novo_nome = $("#novo_nome").val();
	var novo_sobrenome = $("#novo_sobrenome").val();
	var novo_usuario = $("#novo_usuario").val();
	var novo_email = $("#novo_email").val();
	var novo_telefone = $("#novo_telefone").val();
	var novo_celular = $("#novo_celular").val();
	var novo_senha = $("#novo_senha").val();
	var novo_repete_senha = $("#novo_repete_senha").val();
	var novo_endereco = $("#novo_endereco").val();
	var novo_pais = $("#novo_pais").val();
	var novo_estado = $("#novo_estado").val();
	var novo_cidade = $("#novo_cidade").val();
	var novo_bairro = $("#novo_bairro").val();
	var novo_cep = $("#novo_cep").val();
	var novo_moeda = window.moedaValor;
	
	// MIXES E VERSÕES
	var mixes = $("#get-mixes").val();
	var versions = $("#get-versions").val();
	var vinyl = $("#get-vinyl").val();
	var dataHora = dateSelected;
	var dataHoraPrazo = dateSelectedPrazo;
	
	// ARTISTA E PROJETO
	var artista = $("#get-artista").val();
	var projeto = $("#get-projeto").val();
	
	$.post(window.basePrincipal + 'script/cadastro/', {
		nome: novo_nome,
		sobrenome: novo_sobrenome,
		usuario: novo_usuario,
		email: novo_email,
		telefone: novo_telefone,
		celular: novo_celular,
		senha: novo_senha,
		endereco: novo_endereco,
		pais: novo_pais,
		estado: novo_estado,
		cidade: novo_cidade,
		bairro: novo_bairro,
		cep: novo_cep,
		
		mixes: mixes,
		versoes: versions,
		vinyl: vinyl,
		data: dataHora,
		dataprazo: dataHoraPrazo,
		artista: artista,
		projeto: projeto,
		moeda: novo_moeda,
	}, function (rCadastro){
		var responseCadastro = JSON.parse(rCadastro);
		if (responseCadastro.status == 'salvo') { 
			messageErro('Dados salvos com sucesso, você será redirecionado!', 'success');
			window.location = window.basePrincipal + "cadastro/";
		}
		else if (responseCadastro.status == 'nao_salvo') { messageErro('Usuário ou Senha inválido, tente novamente.'); }
		else if (responseCadastro.status == 'usuario') { messageErro('O nome de usuário já existe em nosso sistema.'); }
		else if (responseCadastro.status == 'email') { messageErro('O E-mail já existe em nosso sistema.'); }
		else if (responseCadastro.status == 'nao_conectado') { messageErro('Houve algum problema, entre em contato para resolver o problema.'); }
		else { messageErro('Houve algum erro, tente novamente mais tarde!'); }
	});
}

var salvarMixes = function () {
	var returnSalvar = false;
	// MIXES E VERSÕES
	var mixes = $("#get-mixes").val();
	var versions = $("#get-versions").val();
	var vinyl = $("#get-vinyl").val();
	var dataHora = dateSelected;
	var dataHoraPrazo = dateSelectedPrazo;
	var novo_moeda = window.moedaValor;
	
	// ARTISTA E PROJETO
	var artista = $("#get-artista").val();
	var projeto = $("#get-projeto").val();
	
	$.post(window.basePrincipal + 'script/mixes/', {
		mixes: mixes,
		versoes: versions,
		vinyl: vinyl,
		data: dataHora,
		dataprazo: dataHoraPrazo,
		artista: artista,
		projeto: projeto,
		moeda: novo_moeda,
	}, function (rMixe){
		var responseMixe = JSON.parse(rMixe);
		if (responseMixe.status == 'salvo') { 
			returnSalvar = true;
		}
	});
	return returnSalvar;
}

var validacao = function (etapa = 1) {
	
	// MIXES E VERSÕES
	var mixes = $("#get-mixes").val();
	var versions = $("#get-versions").val();
	var vinyl = $("#get-vinyl").val();
	var dataHora = dateSelected;
	var dataHoraPrazo = dateSelectedPrazo;
	
	// ARTISTA E PROJETO
	var artista = $("#get-artista").val();
	var projeto = $("#get-projeto").val();
	
	// USUÁRIO E SENHA
	var usuario = $("#get-usuario").val();
	var senha = $("#get-senha").val();
	
	// CADASTRO
	var novo_nome = $("#novo_nome").val();
	var novo_sobrenome = $("#novo_sobrenome").val();
	var novo_usuario = $("#novo_usuario").val();
	var novo_email = $("#novo_email").val();
	var novo_telefone = $("#novo_telefone").val();
	var novo_celular = $("#novo_celular").val();
	var novo_senha = $("#novo_senha").val();
	var novo_repete_senha = $("#novo_repete_senha").val();
	var novo_endereco = $("#novo_endereco").val();
	var novo_pais = $("#novo_pais").val();
	var novo_estado = $("#novo_estado").val();
	var novo_cidade = $("#novo_cidade").val();
	var novo_bairro = $("#novo_bairro").val();
	var novo_cep = $("#novo_cep").val();
	var termos_check = $("#termos").is(':checked');
	
	var validacaoAtual = { 
		'retorno': false, 
		'msg': 'Preencha todos os campos'
	};
	
	if (etapa == 1) {
		if (mixes == 0 && versions == 0 && vinyl == 0) { validacaoAtual.msg = 'Selecione a quantidade de Mixes e Versões'; }
		else if (dataHora == '') { validacaoAtual.msg = 'Selecione a data para continuar'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	else if (etapa == 2) {
		if (artista == '' || projeto == '') { }
		if (!termos_check) { validacaoAtual.msg = 'Para continuar é necessário aceitar os termos.'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	else if (etapa == 3) {
		if (usuario == '') { validacaoAtual.msg = 'Digite o nome de usuário.';}
		else if (senha == '') { validacaoAtual.msg = 'Digite a sua senha para continuar.'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	else if (etapa == 4) {
		if (novo_nome.length < 3) { validacaoAtual.msg = 'O Nome digitado é muito pequeno'; }
		else if (novo_sobrenome.length < 3) { validacaoAtual.msg = 'O Sobrenome digitado é muito pequeno'; }
		else if (novo_usuario.length < 4) { validacaoAtual.msg = 'O Nome de Usuário digitado é muito pequeno'; }
		else if (novo_email.length < 6) { validacaoAtual.msg = 'O e-mail digitado não é valido'; }
		else if (novo_senha.length < 8) { validacaoAtual.msg = 'A senha digitada é muito pequena'; }
		else if (novo_senha != novo_repete_senha) { validacaoAtual.msg = 'As senhas digitadas são diferentes'; }
		else if (novo_pais == '') { validacaoAtual.msg = 'O País não foi selecionado'; }
		else if (novo_telefone == '' || novo_celular == '') { validacaoAtual.msg = 'Digite um telefone pelo menos.'; }
		else if (novo_estado.length < 3) { validacaoAtual.msg = 'Nome do estado muito pequeno'; }
		else if (novo_cidade.length < 3) { validacaoAtual.msg = 'Nome da cidade muito pequeno'; }
		else if (novo_cep.length < 4) { validacaoAtual.msg = 'O CEP informado não é válido'; }
		else if (novo_endereco.length < 4) { validacaoAtual.msg = 'O endereço informado é muito curto'; }
		else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
	}
	return validacaoAtual;
	
}