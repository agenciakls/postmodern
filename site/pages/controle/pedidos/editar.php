<h2>Pedidos</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
	
	$campos = array("artista", "projeto", "descricao", "mixes", "versoes", "data", "valor", "pagamento_status", "situacao");
	if (verif_campo($campos)) {
		defineCampo($campos);
		$atualizarCampos = atualizarCampos('pedidos', $idAtual);
		if ($atualizarCampos) {
			?>
			<div class="alert alert-success" role="alert">Este pedido foi atualizado com sucesso</div>
			<?php
		}
		else {
			?>
			<div class="alert alert-danger" role="alert">Este pedido não foi atualizado com sucesso</div>
			<?php
		}
	}
	
	$args = array(
		'table' => 'pedidos',
		'where' => array(
			'id' => $idAtual,
			'status' => 'ativo',
		)
	);
	
	$pegarDados = getData( $args );
	$quantidade = quantityData( $pegarDados );
	if ( $quantidade == 1 ) {
		while ($impPedidos = fetchData($pegarDados)) {
			?>
			<form action="" method="post" class="needs-validation" novalidate="">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="artista">Artista:</label>
						<input type="text" name="artista" class="form-control" id="artista" placeholder="" value="<?php echo $impPedidos['artista']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="projeto">Projeto:</label>
						<input type="text" name="projeto" class="form-control" id="projeto" placeholder="" value="<?php echo $impPedidos['projeto']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="descricao">Descrição:</label>
						<input type="text" name="descricao" class="form-control" id="descricao" placeholder="" value="<?php echo $impPedidos['descricao']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="mixes">mixes:</label>
						<input type="number" name="mixes" class="form-control" id="mixes" placeholder="" value="<?php echo $impPedidos['mixes']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="versoes">Versões:</label>
						<input type="number" name="versoes" class="form-control" id="versoes" placeholder="" value="<?php echo $impPedidos['versoes']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="data">Data Agendada:</label>
						<input type="text" name="data" class="form-control" id="data" placeholder="" value="<?php echo $impPedidos['data']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="data">Data de Entrega:</label>
						<input type="text" name="dataprazo" class="form-control" id="dataprazo" placeholder="" value="<?php echo $impPedidos['dataprazo']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<script type="text/javascript">
						$(function () {
							$('#data').datetimepicker({
								daysOfWeekDisabled: [0, 6]
							});
							$('#dataprazo').datetimepicker({
								daysOfWeekDisabled: [0, 6]
							});
						});
					</script>
					<div class="col-md-12 mb-3">
						<label for="valor">Valor:</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">R$</span>
							</div>
							<input type="text" name="valor" value="<?php echo $impPedidos['valor']; ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
							<div class="input-group-append">
								<span class="input-group-text">,00</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="pagamento">Pagamento:</label>
						<select name="pagamento_status" id="pagamento" class="form-control">
							<?php
							$args = array(
								'table' => 'pagamento_tipos'
							);

							$pegarPay = getData( $args );
							$quantidade = quantityData( $pegarPay );
							if ( $quantidade > 0 ) {
								while ($impPay = fetchData($pegarPay)) {
									$pagamentoStatus = ($impPedidos['pagamento_status'] == $impPay['id']) ? ' selected="selected"': '';
									?>
									<option value="<?php echo $impPay['id']; ?>" <?php echo $pagamentoStatus; ?>><?php echo $impPay['titulo']; ?></option>
									<?php
								}
							}
							?>
						</select>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="situacao">Situação:</label>
						<select name="situacao" id="situacao" class="form-control">
							<?php
							$args = array(
								'table' => 'situacao_tipos'
							);

							$pegarPay = getData( $args );
							$quantidade = quantityData( $pegarPay );
							if ( $quantidade > 0 ) {
								while ($impPay = fetchData($pegarPay)) {
									$situacaoStatus = ($impPedidos['situacao'] == $impPay['id']) ? ' selected="selected"': '';
									?>
									<option value="<?php echo $impPay['id']; ?>" <?php echo $situacaoStatus; ?>><?php echo $impPay['titulo']; ?></option>
									<?php
								}
							}
							?>
						</select>
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg" type="submit">Salvar Alterações</button>
			</form>
			<?php
			
		}
	}
	else { echo 'nao_existe'; }
}
?>