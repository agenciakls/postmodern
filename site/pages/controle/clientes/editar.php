<h2>Clientes</h2>
<?php
if (isset($_GET['id'])) {
	$idAtual = $_GET['id'];
	
	$campos = array("nome", "sobrenome", "usuario", "email", "endereco", "cidade", "estado", "pais", "cep");
	if (verif_campo($campos)) {
		defineCampo($campos);
		$atualizarCampos = atualizarCampos('clientes', $idAtual);
		if ($atualizarCampos) {
			?>
			<div class="alert alert-success" role="alert">Este cliente foi atualizado com sucesso</div>
			<?php
		}
		else {
			?>
			<div class="alert alert-danger" role="alert">Este cliente não foi atualizado com sucesso</div>
			<?php
		}
	}
	
	$args = array(
		'table' => 'clientes',
		'where' => array(
			'id' => $idAtual,
			'status' => 'ativo',
		)
	);
	
	$pegarDados = getData( $args );
	$quantidade = quantityData( $pegarDados );
	if ( $quantidade == 1 ) {
		while ($impCliente = fetchData($pegarDados)) {
			?>
			<form action="" method="post" class="needs-validation" novalidate="">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="nome">Nome:</label>
						<input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php echo $impCliente['nome']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="sobrenome">Sobrenome:</label>
						<input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="" value="<?php echo $impCliente['sobrenome']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="usuario">Usuário:</label>
						<input type="text" name="usuario" class="form-control" id="usuario" placeholder="" value="<?php echo $impCliente['usuario']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="email">E-mail:</label>
						<input type="text" name="email" class="form-control" id="email" placeholder="" value="<?php echo $impCliente['email']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="endereco">Endereço:</label>
						<input type="text" name="endereco" class="form-control" id="endereco" placeholder="" value="<?php echo $impCliente['endereco']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="cidade">Cidade:</label>
						<input type="text" name="cidade" class="form-control" id="cidade" placeholder="" value="<?php echo $impCliente['cidade']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="estado">Estado:</label>
						<input type="text" name="estado" class="form-control" id="estado" placeholder="" value="<?php echo $impCliente['estado']; ?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="pais">País</label>
						<select name="pais" class="form-control" id="pais" required="">
							<option value="" selected="selected" disabled="disabled">Selecionar</option>
							<?php 
							$args = array(
								'table' => 'list_pais',
							);
							$listCountries = getData( $args );
							while ($impCountry = fetchData($listCountries)) {
								$impSelected = ($impCliente['pais'] == $impCountry['nome']) ? ' selected="selected"': '';
								?>
								<option value="<?php echo $impCountry['nome']; ?>" <?php echo $impSelected; ?>><?php echo $impCountry['nome']; ?></option>
								<?php
							}
							?>
						</select>
						<div class="invalid-feedback">
							Este campo é obrigatório!
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="cep">CEP:</label>
						<input type="text" name="cep" class="form-control" id="cep" placeholder="" value="<?php echo $impCliente['cep']; ?>" required="">
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