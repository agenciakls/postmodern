<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
					<form class="needs-validation content-padding" novalidate="">
						<div class="row">
							<div class="col-md-6">
								<h4 class="mb-3"><?php echo langVar('page-conta-configuracao-dados'); ?></h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="nome"><?php echo langVar('page-conta-configuracao-nome'); ?></label>
										<input type="text" class="form-control" id="nome" placeholder="<?php echo langVar('page-conta-configuracao-informe-nome'); ?>" value="<?php echo $usuarioAtual['nome']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="sobrenome"><?php echo langVar('page-conta-configuracao-sobrenome'); ?></label>
										<input type="text" class="form-control" id="sobrenome" placeholder="<?php echo langVar('page-conta-configuracao-informe-sobrenome'); ?>" value="<?php echo $usuarioAtual['sobrenome']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="telefone"><?php echo langVar('page-conta-configuracao-telefone'); ?>Telefone</label>
										<input type="text" class="form-control" id="telefone" placeholder="<?php echo langVar('page-conta-configuracao-ínforme-telefone'); ?>" value="<?php echo $usuarioAtual['telefone']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="celular"><?php echo langVar('page-conta-configuracao-celular'); ?></label>
										<input type="text" class="form-control" id="celular" placeholder="<?php echo langVar('page-conta-configuracao-informe-celular'); ?>" value="<?php echo $usuarioAtual['celular']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="username"><?php echo langVar('page-conta-configuracao-usuario'); ?></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">@</span>
										</div>
										<input type="text" class="form-control" id="usuario" placeholder="<?php echo langVar('page-conta-configuracao-informe-usuario'); ?>" value="<?php echo $usuarioAtual['usuario']; ?>" required="">
										<div class="invalid-feedback" style="width: 100%;">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="email"><?php echo langVar('page-conta-configuracao-email'); ?></label>
									<input type="email" class="form-control" id="email" placeholder="<?php echo langVar('page-conta-configuracao-informe-email'); ?>" value="<?php echo $usuarioAtual['email']; ?>">
									<div class="invalid-feedback">
									<?php echo langVar('page-conta-configuracao-email-valido'); ?>
									</div>
								</div>
								<br />
								<h4 class="mb-3"><?php echo langVar('page-conta-configuracao-endereco'); ?></h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="novo_pais"><?php echo langVar('page-conta-configuracao-pais'); ?></label>
										<select name="pais" class="custom-select d-block w-100" id="pais" required="">
											<option value="" selected="selected" disabled="disabled"><?php echo langVar('page-conta-configuracao-selecionar'); ?></option>
											<?php 
											$args = array(
												'table' => 'list_pais',
											);
											$listCountries = getData( $args );
											while ($impCountry = fetchData($listCountries)) {
												?>
												<option value="<?php echo $impCountry['nome']; ?>" <?php if ( $usuarioAtual['pais'] == $impCountry['nome']) { echo 'selected="selected"'; } ?>><?php echo $impCountry['nome']; ?></option>
												<?php
											}
											?>
										</select>
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="estado"><?php echo langVar('page-conta-configuracao-estado'); ?></label>
										<input type="text" class="form-control" id="estado" placeholder="<?php echo langVar('page-conta-configuracao-informe-estado'); ?>" value="<?php echo $usuarioAtual['estado']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 mb-3">
										<label for="cidade"><?php echo langVar('page-conta-configuracao-cidade'); ?></label>
										<input type="text" class="form-control" id="cidade" placeholder="<?php echo langVar('page-conta-configuracao-informe-cidade'); ?>" value="<?php echo $usuarioAtual['cidade']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="bairro"><?php echo langVar('page-conta-configuracao-bairro'); ?></label>
										<input type="text" class="form-control" id="bairro" placeholder="<?php echo langVar('page-conta-configuracao-informe-bairro'); ?>" value="<?php echo $usuarioAtual['bairro']; ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="zip"><?php echo langVar('page-conta-configuracao-cep'); ?></label>
										<input type="text" class="form-control" id="cep" placeholder="<?php echo langVar('page-conta-configuracao-informe-cep'); ?>" required="" value="<?php echo $usuarioAtual['cep']; ?>">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="address"><?php echo langVar('page-conta-configuracao-endereco'); ?></label>
									<input type="text" class="form-control" id="endereco" placeholder="<?php echo langVar('page-conta-configuracao-dados'); ?>" required="" value="<?php echo $usuarioAtual['endereco']; ?>">
									<div class="invalid-feedback">
									<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
									</div>
								</div>
								<hr class="mb-4">
								<a onClick="atualizarDados('dados')"><button type="button" class="btn-post right"><?php echo langVar('page-conta-configuracao-atualizar'); ?></button></a>
							</div>
							<div class="col-md-6">
								<h4 class="mb-3"><?php echo langVar('page-conta-configuracao-alterar-senha'); ?></h4>
								<div class="row">
									<div class="col-md-12 md-3">
										<label for="senha"><?php echo langVar('page-conta-configuracao-senha-atual'); ?></label>
										<input type="password" class="form-control" id="atual_senha" placeholder="<?php echo langVar('page-conta-configuracao-informe-senha-atual'); ?>" required="required">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<br />
								<div class="row md-3">
									<div class="col-md-12">
										<label for="repete-senha"><?php echo langVar('page-conta-configuracao-nova-senha'); ?></label>
										<input type="password" class="form-control" id="novo_senha" placeholder="<?php echo langVar('page-conta-configuracao-informe-nova-senha'); ?>" required="required">
										<div class="invalid-feedback">
										<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<br />
								<div class="row md-3">
									<div class="col-md-12">
										<label for="repete-senha"><?php echo langVar('page-conta-configuracao-repita-senha'); ?></label>
										<input type="password" class="form-control" id="novo_repete_senha" placeholder="<?php echo langVar('page-conta-configuracao-informe-repita-senha'); ?>" required="required">
										<div class="invalid-feedback">
											<?php echo langVar('page-conta-configuracao-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<hr class="mb-4">
								<a onClick="atualizarDados('senha')"><button type="button" class="btn-post right"><?php echo langVar('page-conta-configuracao-alterar-senha'); ?></button></a>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
				<div class="col-md-12 content-price-total">
					<div class="row content-total">
						<div class="col-md-6 text-left">
							<a href="<?php echo baseUrl(); ?>conta/"><button class="btn-post left"><?php echo langVar('page-conta-configuracao-voltar'); ?></button></a>
						</div>
						<div class="col-md-6 text-right">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_configuracao.js?v=1"></script>