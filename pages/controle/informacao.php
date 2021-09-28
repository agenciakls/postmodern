<?php

/* -------------------- FORMULÁRIO GET - FILTRO -------------------- */

$dateStart = (isset($_POST['datestart'])) ? strftime("%Y-%m-%d %H:%M:%S", strtotime($_POST['datestart'])): null;
$dateEnd = (isset($_POST['dateend'])) ? strftime("%Y-%m-%d %H:%M:%S", strtotime("+23 hours 59 seconds", strtotime($_POST['dateend']))): null;

$stampStart = (isset($_POST['datestart'])) ? strftime("%d/%m/%Y", strtotime($_POST['datestart'])): null;
$stampEnd = (isset($_POST['dateend'])) ? strftime("%d/%m/%Y", strtotime("+23 hours 59 seconds", strtotime($_POST['dateend']))): null;

$insertStart = (isset($_POST['datestart'])) ? strftime("%Y-%m-%d", strtotime($_POST['datestart'])): null;
$insertEnd = (isset($_POST['dateend'])) ? strftime("%Y-%m-%d", strtotime("+23 hours 59 seconds", strtotime($_POST['dateend']))): null;

$mensagemStamp = ($stampStart && $stampEnd) ? '' . $stampStart . ' - ' . $stampEnd . '': false;

$mensagemPeriodo = false;
$periodo = '';
$periodoServicos = [];
if ($dateStart and $dateEnd and ($dateStart <= $dateEnd)) {
	$periodo = sprintf(" AND data>='%s' AND data<='%s'", $dateStart, $dateEnd);
	$periodoServicos = $periodo;
}
else if ($dateStart and $dateEnd and ($dateStart >= $dateEnd)) {
	$mensagemPeriodo = 'A data inicial deve ser antes da data final.';
}

/* -------------------- MÉTRICAS -------------------- */
$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM clientes WHERE status='ativo'") );  $quantidade = quantityData( $pegarDados );
$quantidadeClientes = ($quantidade > 0 ) ? $quantidade . ' Cliente(s)': 'Nenhum Cliente';


$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE status='ativo' %s", $periodo) ); $quantidade = quantityData( $pegarDados );
$quantidadePedidos = ($quantidade > 0 ) ? $quantidade . ' Pedidos(s)': 'Nenhum Pedido';


$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE pagamento_status=='1' AND status='ativo' %s", $periodo) ); $quantidade = quantityData( $pegarDados ); $total = 0;
if ( $quantidade > 0 ) {
	while ($impDados = fetchData($pegarDados)) {
		$total += $impDados['valor'];
	}
	$valorPago = 'R$ ' . number_format($total, 2, ',', '.');
}
else {$valorPago = 'Nenhum Pagamento';}


$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE status='ativo' %s", $periodo) ); $quantidade = quantityData( $pegarDados ); $total = 0;
if ( $quantidade > 0 ) {
	while ($impDados = fetchData($pegarDados)) {
		$total += $impDados['valor'];
	}
	$valorTotal = 'R$ ' . number_format($total, 2, ',', '.');
}
else {$valorTotal = 'Nenhum Pagamento';}



$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE pagamento_status=='1' AND status='ativo' %s", $periodo) ); $quantidade = quantityData( $pegarDados );
$pagamentoEfetuado = ($quantidade > 0 ) ? $quantidade . ' Pagamento(s)': 'Nenhum Pagamento';


$pegarDados = mysqli_query($conectar, sprintf("SELECT * FROM pedidos WHERE pagamento_status!='1' AND status='ativo' %s", $periodo) ); $quantidade = quantityData( $pegarDados );
$pagamentoNaoEfetuado = ($quantidade > 0 ) ? $quantidade . ' Pagamento(s)': 'Nenhum Pagamento';
?>

<h2>Informações</h2>
<h3>
<?php  if ($mensagemStamp) { ?><h3><?php echo $mensagemStamp; ?></h3><?php } ?>
</h3>
<form action="" method="post">
	<div class="row my-4">
		<div class='col-md-4'>
			<input type="date" name="datestart" class="form-control" required="required" value="<?php if ($insertStart) { echo $insertStart; } ?>" data-validity-message="Este campo precisa ser preenchido" oninvalid="this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="date" step="1" value="">
		</div>
		<div class='col-md-4'>
			<input type="date" name="dateend" class="form-control" required="required" value="<?php if ($insertEnd) { echo $insertEnd; } ?>" data-validity-message="Este campo precisa ser preenchido" oninvalid="this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity('')" id="date" step="1" value="">
		</div>
		<div class="col-md-4">
			<button type="submit" class="btn mx-1 d-block">Filtrar</button>
		</div>
	</div>
</form>
<?php if ($mensagemPeriodo) { ?><div class="alert alert-warning" role="alert"><?php echo $mensagemPeriodo; ?></div><?php } ?>
<hr class="my-3">
<div class="row">
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Quantidade de Clientes</small>
					<h6 class="my-0">
					<?php
					
					echo $quantidadeClientes;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Quantidade de Pedidos</small>
					<h6 class="my-0">
					<?php
					echo $quantidadePedidos;
					?>	
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Valor Pago</small>
					<h6 class="my-0">
					<?php
						echo $valorPago;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Valor Total</small>
					<h6 class="my-0">
					<?php
						echo $valorTotal;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Pagamentos Efetuados</small>
					<h6 class="my-0">
					<?php
					echo $pagamentoEfetuado;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-3">
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<small class="text-muted">Pagamentos Não Efetuados</small>
					<h6 class="my-0">
					<?php
					echo $pagamentoNaoEfetuado;
					?>
					</h6>
				</div>
			</li>
		</ul>
	</div>
</div>