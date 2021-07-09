<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
					<div class="row">
						<div class="col-md-6">
							<h4>Meus Projetos</h4>
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
										<h6>R$ <?php echo $impPedidos['valor']; ?>,00</h6>
										<p class="card-text"><strong>Status:</strong> Este projeto está em analise </p>
										<a href="<?php echo baseUrl(); ?>conta/pedido?p=<?php echo $impPedidos['id']; ?>"><button class="btn-post right">Ver Detalhes</button></a>
									</div>
								</div>
								<?php
							}}
							else {
								?>
								<p>Não há pedidos feitos por você neste momento.</p>
								<?php 
							}
							?>
						</div>
						<div class="col-md-6">
							<h4>Configurações</h4>
							<p><strong>Usuário: </strong> <?php echo $usuarioAtual['usuario']; ?></p>
							<p><strong>Nome: </strong> <?php echo $usuarioAtual['nome'] . ' ' . $usuarioAtual['sobrenome']; ?></p>
							<p><strong>E-mail: </strong> <?php echo $usuarioAtual['email']; ?></p>
							<hr>
							<p><strong>CEP: </strong> <?php echo $usuarioAtual['cep']; ?></p>
							<p><strong>Endereço: </strong> <?php echo $usuarioAtual['endereco']; ?></p>
							<p><strong>Cidade: </strong> <?php echo $usuarioAtual['cidade']; ?></p>
							<p><strong>Estado: </strong> <?php echo $usuarioAtual['estado']; ?></p>
							<hr>
							<a href="<?php echo baseUrl(); ?>conta/configuracao"><button class="btn-post right">Alterar</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>