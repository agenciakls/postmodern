<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
					<div class="row">
						<div class="col-md-6">
							<h4><?php echo langVar('page-conta-home-projetos'); ?></h4>
							<?php
							$idCliente = $usuarioAtual['id'];
							$pegarPedidos = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE status='ativo' AND id_cliente='%s'", $idCliente));
							if ((mysqli_num_rows($pegarPedidos)) > 0) { while ($impPedidos = mysqli_fetch_array($pegarPedidos)) {
								?>
								<div class="card">
									<div class="card-header">
										<strong><?php echo $impPedidos['projeto']; ?></strong> | <?php echo formatData($impPedidos['data']); ?>
									</div>
									<div class="card-body">
										<h5 class="card-title"><?php echo $impPedidos['artista']; ?> <small class="text-muted"><?php echo $impPedidos['projeto']; ?></small></h5>
										<h6><?php echo $impPedidos['moeda']; ?> <?php echo number_format($impPedidos['valor'], 2, ',', '.'); ?></h6>
										<p class="card-text"><strong><?php echo langVar('page-conta-home-status'); ?></strong> <?php $situacao = relationData($impPedidos['situacao']); echo $situacao['titulo']; ?>  </p>
										<a href="<?php echo baseUrl(); ?>conta/pedido?p=<?php echo $impPedidos['id']; ?>"><button class="btn-post right"><?php echo langVar('page-conta-home-ver-detalhes'); ?></button></a>
									</div>
								</div>
								<?php
							}}
							else {
								?>
								<p><?php echo langVar('page-conta-home-nenhum-pedido'); ?></p>
								<?php 
							}
							?>
						</div>
						<div class="col-md-6">
							<h4><?php echo langVar('page-conta-home-configuracoes'); ?></h4>
							<p><strong><?php echo langVar('page-conta-home-usuario'); ?> </strong> <?php echo $usuarioAtual['usuario']; ?></p>
							<p><strong><?php echo langVar('page-conta-home-nome'); ?></strong> <?php echo $usuarioAtual['nome'] . ' ' . $usuarioAtual['sobrenome']; ?></p>
							<p><strong><?php echo langVar('page-conta-home-email'); ?></strong> <?php echo $usuarioAtual['email']; ?></p>
							<hr>
							<p><strong><?php echo langVar('page-conta-home-cep'); ?> </strong> <?php echo $usuarioAtual['cep']; ?></p>
							<p><strong><?php echo langVar('page-conta-home-endereco'); ?> </strong> <?php echo $usuarioAtual['endereco']; ?></p>
							<p><strong><?php echo langVar('page-conta-home-cidade'); ?> </strong> <?php echo $usuarioAtual['cidade']; ?></p>
							<p><strong><?php echo langVar('page-conta-home-cidade'); ?> </strong> <?php echo $usuarioAtual['estado']; ?></p>
							<hr>
							<a href="<?php echo baseUrl(); ?>conta/configuracao"><button class="btn-post right"><?php echo langVar('page-conta-home-alterar'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>