<h2>Configurações</h2>
<?php 
if (count($_POST) > 0) {
	$vl = false;
	$settings = $_POST;
	foreach ($settings as $settingCurrent => $settingValue) {
		$pegarDados = mysqli_query($conectar, sprintf("UPDATE admin_settings SET content='%s' WHERE name='%s'", $settingValue, $settingCurrent));
		$vl = ($pegarDados) ? true: false; 
		if (!$vl) { break;}
	}
	$impReturn = ($vl) ? '<div class="alert alert-success" role="alert">Os dados foram salvos com sucesso</div>': '<div class="alert alert-danger" role="alert">Os dados não foram salvos.</div>'; 
	echo $impReturn;
}
function configDados($info) {
	$args = array(
		'table' => 'admin_settings',
		'where' => array(
			'name' => $info
		)
	);
	$pegarDados = getData( $args );
	$quantidade = quantityData( $pegarDados );
	if ( $quantidade == 1 ) {
		while ($impDados = fetchData($pegarDados)) {
			return $impDados['content'];
		}
	}
}
function printLabel($title, $label) {
	?>
	<label for="<?php echo $label; ?>"><?php echo $title; ?></label>
	<input type="text" name="<?php echo $label; ?>" class="form-control" id="<?php echo $label; ?>" placeholder="" value="<?php echo configDados($label); ?>" required="">
	<?php
}
		?>
		<form class="needs-validation" novalidate="" method="post">
			<h5>Base de Valores</h5>
			<div class="row pb-3">
				<div class="col-md-4 mb-3">
					<?php printLabel('Valor p/ Mixe', 'mixe'); ?>
					<div class="invalid-feedback">
						Valid first name is required.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<?php printLabel('Valor p/ Versão', 'versao'); ?>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<?php printLabel('Valor p/ Vinyl', 'vinyl'); ?>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
				</div>
			</div>
			<h5>Chave de Integração - Paypal</h5>
			<div class="row pb-3">
				<div class="col-md-6 mb-3">
					<?php printLabel('Client ID', 'client_id'); ?>
					<div class="invalid-feedback">
						Valid first name is required.
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<?php printLabel('Secret', 'client_secret'); ?>
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
				</div>
			</div>
			<hr class="mb-4">
			<button class="btn btn-primary btn-lg btn-block" type="submit">Salvar Configurações</button>
		</form>
		<?php
?>