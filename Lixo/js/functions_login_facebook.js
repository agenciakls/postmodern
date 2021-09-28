function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	if (response.status === 'connected') {
		testAPI(response.status);
	} else if (response.status === 'not_authorized') {
		window.location.href = "index.php";
	} else {
		window.location.href = "index.php";
	}
}

function testAPI(status) {
	console.log('Bem-vindo! Estamos processando seus dados...');
	FB.api('/me', 'GET', {fields: 'name,id,first_name,picture.width(150).height(150)'}, function(response) {
		console.log('Você foi conectado com sucesso: ' + response.name);
		$.post('inc/login_facebook.php', {
			primeiroNome: response.first_name,
			idUser: response.id,
			status: status
			}, 
		function(retorno) {
			if (retorno == 'connected') {console.log('O USUÁRIO ESTÁ CORRETO');}
			else {window.location.href = "home";}
		});

	});
}