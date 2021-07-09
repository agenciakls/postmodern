<?php
if (isset($_COOKIE['admin_user']) && isset($_COOKIE['admin_pass'])) {
	$usuario = $_COOKIE['admin_user'];
	$senha = $_COOKIE['admin_pass'];
	$args = array(
		'table' => 'admin_usuario',
		'where' => array(
			'usuario' => $usuario,
			'senha' => $senha,
			'status' => 'ativo'
		)
	);
	
	$pegarUsuario = getData( $args );
	$quantidade = quantityData( $pegarUsuario );
	if ( $quantidade == 1 ) {
		while ($impAdmin = fetchData($pegarUsuario)) {
			header('location: ' . baseUrl() . 'controle/painel');
		}
	}
	else {
		setcookie("admin_user", '', time()-3600*24, '/');
		setcookie("admin_senha", '', time()-3600*24, '/');
	}
}
else {
	if (isset($_POST['usuario']) && isset($_POST['senha'])) {
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$args = array(
			'table' => 'admin_usuario',
			'where' => array(
				'usuario' => $usuario,
				'senha' => $senha,
				'status' => 'ativo'
			)
		);

		$pegarUsuario = getData( $args );
		$quantidade = quantityData( $pegarUsuario );
		if ( $quantidade == 1 ) {
			while ($impAdmin = fetchData($pegarUsuario)) {
				$loggon = logarAdmin($usuario, $senha); 
				if ($loggon) {
					header('location: ' . baseUrl() . 'controle/painel');
				} 
				else { echo 'nao_conectado'; }
			}
		}
		
	}
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Post Modern Mastering</title>
	<meta charset="UTF-8" />
	<meta name="description" content="André Dias - Post Modern Mastering">
	<meta name="author" content="Agência WS" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!--	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">-->
<!--	<link href="https://fonts.googleapis.com/css?family=Roboto|Lato|Open+Sans|Quicksand" rel="stylesheet">-->
	
	<!-- STYLES -->
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-brands.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-regular.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fa-solid.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fontawesome.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/fontawesome-all.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.structure.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/jquery-ui.theme.css" type="text/css" /> 
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/admin.css" type="text/css" />
	
	<!-- ÍCONE -->
	<link rel="icon" type="image/x-icon" href="<?php echo baseUrl(); ?>img/icon.ico" />
	
	<!-- JAVASCRIPT -->
	<script>
	var basePrincipal = '<?php echo $basePrincipal; ?>'; window.basePrincipal = '<?php echo $basePrincipal; ?>';
	</script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo baseUrl(); ?>js/functions.js"></script>
	  <style>
	  html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	  </style>
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="post">
      <img class="mb-4" src="<?php echo baseUrl(); ?>images/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Painel de Controle</h1>
      <label for="inputEmail" class="sr-only">Usuário</label>
      <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; Post Modern Mastering</p>
    </form>
  </body>
</html>
