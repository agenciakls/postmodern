$("#box-return").slideUp(0);

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

var recuperarSenha = function () {
    var validacaoAtual = validacao();
    if (validacaoAtual.retorno) {
        acaoLogin();
    }
    else {
        messageErro(validacaoAtual.msg);
    }
}
var acaoLogin = function () {
    var usuario = $("#get-usuario").val();
    $.post(window.basePrincipal + 'script/recuperarsenha/', {
        usuario: usuario
    }, function (resSenha) {
        var responseSenha = JSON.parse(resSenha);
        if (responseSenha.status == true) { messageErro(responseSenha.response, 'success'); }
        else { messageErro(responseSenha.response); }
    });
}

var validacao = function () {
    var usuario = $("#get-usuario").val();

    var validacaoAtual = {
        'retorno': false,
        'msg': 'Preencha todos os campos'
    };

    if (usuario == '') { validacaoAtual.msg = 'Digite o nome de usuário ou e-mail.'; }
    else if (usuario.length < 4) { validacaoAtual.msg = 'O nome de usuário ou e-mail é muito pequeno.'; }
    else { validacaoAtual = { 'retorno': true, 'msg': '' }; }
    console.log(validacaoAtual);
    return validacaoAtual;
}

var salvarNovaSenha = function () {
    var validacaoAtual = validacaoSenha();
    if (validacaoAtual.retorno) {
        acaoSenha();
    }
    else {
        messageErro(validacaoAtual.msg);
    }
}

var acaoSenha = function () {
    var novo_senha = $("#get-senha").val();
    var novo_repete_senha = $("#get-repete-senha").val();
    var token = $("#get-tkn").val();

    $.post(window.basePrincipal + 'script/salvarsenha/', {
        senha: novo_senha,
        confirme_senha: novo_repete_senha,
        token: token
    }, function (resSenha) {
        var responseLogin = JSON.parse(resSenha);
        if (responseLogin.response == 'salvo') {
            messageErro('Sua senha foi alterada com sucesso, tente entrar em sua conta agora!', 'success');
        }
        else if (responseLogin.response == 'nao_salvo') { messageErro('Houve algum erro e a senha não foi salva.'); }
        else { messageErro('Houve algum erro, tente novamente mais tarde!'); }
    });
}

var validacaoSenha = function () {
    var novo_senha = $("#get-senha").val();
    var novo_repete_senha = $("#get-repete-senha").val();

    var validacaoAtual = {
        'retorno': false,
        'msg': 'Preencha todos os campos'
    };

    if (novo_senha == '' || novo_repete_senha == '') { validacaoAtual.msg = 'Informe a senha desejada'; }
    else if (novo_senha != novo_repete_senha) { validacaoAtual.msg = 'As senhas digitadas são diferentes'; }
    else if (novo_senha.length < 8) { validacaoAtual.msg = 'A senha digitada é muito curta'; }
    else { validacaoAtual = { 'retorno': true, 'msg': '' }; }

    return validacaoAtual;
}