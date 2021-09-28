<?php
function headerPainel($nome, $sobrenome = '') {
	?>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Minha Conta <small class="text-muted"><?php echo $nome . ' ' . $sobrenome; ?></small></h1>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>