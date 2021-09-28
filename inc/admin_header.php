<?php 

?>
<!DOCTYPE html>
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
	<link href="https://fonts.googleapis.com/css?family=Roboto|Lato|Open+Sans|Quicksand" rel="stylesheet">
	
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
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/bootstrap-datetimepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo baseUrl(); ?>css/bootstrap-datetimepicker-standalone.css" type="text/css" />
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
</head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-12 col-md-3 col-lg-2 mr-0" href="#"><img src="<?php echo baseUrl(); ?>images/title_logo.png" height="20" alt=""></a>
      <?php 
		// <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Pesquisar">
	  ?>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo baseUrl(); ?>controle/sair">Sair do Painel</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/painel">
                  <span data-feather="home"></span>
                  Resumo <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/pedidos">
                  <span data-feather="shopping-cart"></span>
                  Pedidos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/clientes">
                  <span data-feather="users"></span>
                  Clientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/informacao">
                  <span data-feather="bar-chart-2"></span>
                  Informações
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/configuracao">
                  <span data-feather="settings"></span>
                  Configurações
                </a>
              </li>
            </ul>
			<?php 
			 /*
			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Criar</span>
            </h6>
            <ul class="nav flex-column mb-2">
				
              <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/clientes/novo">
                  <span data-feather="file"></span>
                  Novo Cliente
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="<?php echo baseUrl(); ?>controle/pedidos/novo">
                  <span data-feather="file"></span>
                  Novo Pedido
                </a>
              </li>
			</ul>
			  */
			  ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Pedidos Recentes</span>
            </h6>
            <ul class="nav flex-column mb-2">
				
				<?php 
				$args = array(
					'table' => 'pedidos',
					'where' => array(
						'status' => 'ativo'
					)
				);

				$pegarPedidos = getData( $args );
				$quantidade = quantityData( $pegarPedidos );
				if ( $quantidade > 0 ) {
					while ($impPedidos = fetchData($pegarPedidos)) {
						?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo baseUrl(); ?>controle/pedidos/ver?id=<?php echo $impPedidos['id']; ?>">
							  <span data-feather="file-text"></span>
							 <?php echo $impPedidos['projeto'] . ' (' . $impPedidos['artista'] . ')'; ?>
							</a>
						  </li>
						<?php
					}
				}
				?>
            </ul>
          </div>
        </nav>
		  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">