<main role="main">
	<?php headerPainel($usuarioAtual['nome'], $usuarioAtual['sobrenome']); ?>
	<div class="pn-main">
		<div class="container">
			<div class="row pn-content">
				<div class="col-md-12 pn-inside">
					<form class="needs-validation content-padding" novalidate="">
						<div class="row">
							<div class="col-md-6">
								<h4 class="mb-3">Dados Pessoais</h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="nome">Nome</label>
										<input type="text" class="form-control" id="nome" placeholder="Informe o seu Nome" value="<?php echo $usuarioAtual['nome']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="sobrenome">Sobrenome</label>
										<input type="text" class="form-control" id="sobrenome" placeholder="Informe o seu Sobrenome" value="<?php echo $usuarioAtual['sobrenome']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="telefone">Telefone</label>
										<input type="text" class="form-control" id="telefone" placeholder="Informe o seu telefone" value="<?php echo $usuarioAtual['telefone']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="celular">Celular</label>
										<input type="text" class="form-control" id="celular" placeholder="Informe o seu celular" value="<?php echo $usuarioAtual['celular']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="username">Usuário</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">@</span>
										</div>
										<input type="text" class="form-control" id="usuario" placeholder="Nome de Usuário" value="<?php echo $usuarioAtual['usuario']; ?>" required="">
										<div class="invalid-feedback" style="width: 100%;">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Insira o seu E-mail" value="<?php echo $usuarioAtual['email']; ?>">
									<div class="invalid-feedback">
										Insira um e-mail válido para continuar.
									</div>
								</div>
								<br />
								<h4 class="mb-3">Endereço</h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="novo_pais">País</label>
										<select name="pais" class="custom-select d-block w-100" id="pais" required="">
											<option value="" selected="selected" disabled="disabled">Selecionar</option>
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
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="estado">Estado</label>
										<input type="text" class="form-control" id="estado" placeholder="Nome da Estado" value="<?php echo $usuarioAtual['estado']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 mb-3">
										<label for="cidade">Cidade</label>
										<input type="text" class="form-control" id="cidade" placeholder="Nome da Cidade" value="<?php echo $usuarioAtual['cidade']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="bairro">Bairro</label>
										<input type="text" class="form-control" id="bairro" placeholder="Nome do Bairro" value="<?php echo $usuarioAtual['bairro']; ?>" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="zip">CEP</label>
										<input type="text" class="form-control" id="cep" placeholder="" required="" value="<?php echo $usuarioAtual['cep']; ?>">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="address">Endereço</label>
									<input type="text" class="form-control" id="endereco" placeholder="Insira o seu endereço" required="" value="<?php echo $usuarioAtual['endereco']; ?>">
									<div class="invalid-feedback">
										Este campo é obrigatório!
									</div>
								</div>
								<hr class="mb-4">
								<a onClick="atualizarDados('dados')"><button type="button" class="btn-post right">Atualizar</button></a>
							</div>
							<div class="col-md-6">
								<h4 class="mb-3">Alterar Senha</h4>
								<div class="row">
									<div class="col-md-12 md-3">
										<label for="senha">Senha Atual</label>
										<input type="password" class="form-control" id="atual_senha" placeholder="Digite a sua senha" required="required">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<br />
								<div class="row md-3">
									<div class="col-md-12">
										<label for="repete-senha">Nova Senha</label>
										<input type="password" class="form-control" id="novo_senha" placeholder="Digite a nova senha" required="required">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<br />
								<div class="row md-3">
									<div class="col-md-12">
										<label for="repete-senha">Repita a Nova Senha</label>
										<input type="password" class="form-control" id="novo_repete_senha" placeholder="Confirme sua senha" required="required">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<hr class="mb-4">
								<a onClick="atualizarDados('senha')"><button type="button" class="btn-post right">Alterar Senha</button></a>
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
							<a href="<?php echo baseUrl(); ?>conta/"><button class="btn-post left">Voltar</button></a>
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