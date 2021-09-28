<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
                    <?php
                    if (isset($_GET['id'])) {
                        $idAtual = $_GET['id'];
                        if (isset($_POST['excluir']) && $_POST['excluir'] == 'sim' ) {
                            $args = array(
                                'table' => 'arquivos_clientes',
                                'where' => array(
                                    'id' => $idAtual,
                                    'status' => 'ativo',
                                )
                            );

                            $pegarDados = getData( $args );
                            $quantidade = quantityData( $pegarDados );
                            if ($quantidade == 1) {
                                while ($impFile = fetchData($pegarDados)) {
                                    $idPedido = $impFile['id_pedido'];
                                    $argsPedido = array(
                                        'table' => 'pedidos',
                                        'where' => array(
                                            'id' => $idPedido,
                                            'id_cliente' => $usuarioAtual['id'],
                                            'status' => 'ativo',
                                        )
                                    );
        
                                    $dadosPedido = getData( $argsPedido );
                                    $qtPedido = quantityData( $dadosPedido );
                                    if ( $qtPedido == 1 ) {
                                        $excluirPedido = excluirCampos('arquivos_clientes', $idAtual);
                                        if ($excluirPedido) {?><div class="alert alert-success" role="alert"><?php echo langVar('page-conta-excluido-arquivo'); ?></div><?php
                                        } else { ?> <div class="alert alert-warning" role="alert"><?php echo langVar('page-conta-excluido-nenhum'); ?></div> <?php }
                                    }
                                    else { ?> <div class="alert alert-danger" role="alert"><?php echo langVar('page-conta-excluido-nenhum'); ?></div> <?php }

                                }
                                
                            }
                            else { ?> <div class="alert alert-danger" role="alert"><?php echo langVar('page-conta-excluido-nenhum'); ?></div> <?php }
                        }
                        else {
                            $args = array(
                                'table' => 'arquivos_clientes',
                                'where' => array(
                                    'id' => $idAtual,
                                    'status' => 'ativo',
                                )
                            );

                            $pegarDados = getData( $args );
                            $quantidade = quantityData( $pegarDados );
                            if ( $quantidade == 1 ) {
                                while ($impFile = fetchData($pegarDados)) {
                                    $idPedido = $impFile['id_pedido'];
                                    $argsPedido = array(
                                        'table' => 'pedidos',
                                        'where' => array(
                                            'id' => $idPedido,
                                            'id_cliente' => $usuarioAtual['id'],
                                            'status' => 'ativo',
                                        )
                                    );
        
                                    $dadosPedido = getData( $argsPedido );
                                    $qtPedido = quantityData( $dadosPedido );
                                    if ( $qtPedido == 1 ) {
                                        ?>
                                        <form action="" method="post">
                                            <strong><?php echo langVar('page-conta-excluido-certeza'); ?> </strong><br />
                                            <strong><?php echo langVar('page-conta-excluido-nenhum'); ?> </strong> <?php echo $impFile['titulo']; ?><br />
                                            <strong><?php echo langVar('page-conta-excluido-nenhum'); ?> </strong> <a href="<?php echo $impFile['url']; ?>" download><?php echo $impFile['url']; ?></a><br />
                                            <strong><?php echo langVar('page-conta-excluido-nenhum'); ?> </strong> <?php echo $impFile['size']; ?> mb<br />
                                            <strong><?php echo langVar('page-conta-excluido-nenhum'); ?> </strong> <?php echo strftime("%d/%m/%Y - %H:%M", strtotime($impFile['date_created'])); ?><br />

                                            <input type="hidden" name="excluir" value="sim">
                                            <br />
                                            <p>
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo langVar('page-conta-excluido-nenhum'); ?></button>
                                            </p>
                                        </form>
                                        <?php
                                    }
                                    else { ?> <div class="alert alert-danger" role="alert"><?php echo langVar('page-conta-excluido-nenhum'); ?></div> <?php }

                                }
                            }
                            
                            else { ?> <div class="alert alert-danger" role="alert"><?php echo langVar('page-conta-excluido-nenhum'); ?></div> <?php }
                        }
                    }
                    ?>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
				<div class="col-md-12 content-price-total">
					<div class="row content-total">
						<div class="col-md-6 text-left">
							<a href="<?php echo baseUrl(); ?>conta/"><button class="btn-post left"><?php echo langVar('page-conta-excluido-nenhum'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_pedido.js?v=1.1.7"></script>