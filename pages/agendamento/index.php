<main role="main">
	<section class="jumbotron text-center header-slogan" style="background-image: url(<?php echo baseUrl(); ?>images/background_05.jpg) !important;">
		<div class="container">
			<img src="<?php echo baseUrl(); ?>images/title_logo_2.png" width="450" alt="">
		</div>
	</section>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo langVar('page-agendamento-title'); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens" id="tela-1">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-5 set-mixagens">
					<h3><?php echo langVar('page-agendamento-projeto'); ?></h3>
					<div class="box-mixes">
						<p><?php echo langVar('page-agendamento-faixas'); ?></p>
						<div class="form-mixes row">
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="mixagens" id="get-mixes" class="field-mix" maxlength="3">
								<span class="text-mix"><?php echo langVar('page-agendamento-mixagens'); ?></span>
							</div>
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="versoes" id="get-versions" class="field-mix" maxlength="3">
								<span class="text-mix"><?php echo langVar('page-agendamento-alternativas'); ?></span>
							</div>
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="vinyl" id="get-vinyl" class="field-mix" maxlength="3">
								<span class="text-mix"><?php echo langVar('page-agendamento-adicional-vinyl'); ?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 set-agendamento">
					<h3><?php echo langVar('page-agendamento-sessao'); ?> <a id="call-calendar"><small class="text-muted"> <i class="fas fa-calendar-alt"></i> <?php echo langVar('page-agendamento-data'); ?> </small></a></h3>
					<div id="datepicker"></div>
					<div class="box-mixes row" id="orcamento-detalhes">
						<div class="col-md-6">
							<p><?php echo langVar('page-agendamento-data-horario'); ?> </p>
							<div class="form-mixes row">
								<div class="detail-mixes detail-date-hours col-md-12">
									<span><i class="far fa-2x fa-calendar-alt"></i></span>
									<span><span id="setDate"></span> - <span id="setHour"></span></span>
								</div>
								<div class="detail-mixes detail-date-hours col-md-12">
									<span><i class="far fa-2x fa-calendar-check"></i></span>
									<span><span id="prazoDate"></span> - <span id="prazoHour"></span></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<p><?php echo langVar('page-agendamento-valores-detalhados'); ?></p>
							<div class="form-mixes row">
								<div class="detail-mixes col-md-12">
									<table class="table text-left">
									  <thead class="thead-dark">
										<tr>
										  <th scope="col"><?php echo langVar('page-agendamento-descricao'); ?></th>
										  <th scope="col"><?php echo langVar('page-agendamento-valor'); ?></th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
										  <td><?php echo langVar('page-agendamento-valor-principais'); ?></td>
										  <td id="set-mixes"><?php echo langVar('moeda'); ?> 0,00</td>
										</tr>
										<tr>
										  <td><?php echo langVar('page-agendamento-valor-alternativas'); ?></td>
										  <td id="set-versions"><?php echo langVar('moeda'); ?> 0,00</td>
										</tr>
										<tr>
										  <td><?php echo langVar('page-agendamento-valor-vinyl'); ?></td>
										  <td id="set-vinyl"><?php echo langVar('moeda'); ?> 0,00</td>
										</tr>
									  </tbody>
										<thead>
										<tr>
										  <th scope="col"><?php echo langVar('page-agendamento-valor-total'); ?></th>
										  <th scope="col" id="set-total"><?php echo langVar('moeda'); ?> 0,00</th>
										</tr>
									  </thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
				<div class="col-md-12 content-price-total">
					<div class="row content-total">
						<div class="col-md-6 text-left">
							<h2><?php echo langVar('page-agendamento-valor-final'); ?> <span id="show-total"><?php echo langVar('moeda'); ?> 0,00</span></h2>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post"><?php echo langVar('page-agendamento-proximo'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens" id="tela-2">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-12 set-mixagens">
					<h3><?php echo langVar('page-agendamento-detalhe'); ?></h3>
					<div class="box-mixes">
						<div class="form-mixes row">
							<div class="col-md-6">
								<label for=""><?php echo langVar('page-agendamento-nome-artista'); ?></label>
								<input type="text" name="artista" id="get-artista" class="form-control form-control-lg">
							</div>
							<div class="col-md-6">
								<label for=""><?php echo langVar('page-agendamento-nome-projeto'); ?></label>
								<input type="text" name="projeto" id="get-projeto"class="form-control form-control-lg">
							</div>
						</div>
					</div>
					<br />
					<input type="checkbox" name="termos" id="termos" value="sim" /> <label for="termos"><?php echo langVar('page-agendamento-aceito'); ?></label> <a data-toggle="modal" data-target="#exampleModalLong"><?php echo langVar('page-agendamento-termos'); ?></a>.
					<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle"><?php echo langVar('page-agendamento-termos-condicoes'); ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<?php echo langVar('page-agendamento-termo-modal'); ?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> <?php echo langVar('page-agendamento-termo-sair'); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="box-return">
					<p id="return-message"></p>
				</div>
				<div class="col-md-12 content-price-total">
					<div class="row content-total">
						<div class="col-md-6 text-left">
							<a  onClick="mudaTela('anterior')"><button class="btn-post left"><?php echo langVar('page-agendamento-anterior'); ?></button></a>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post right"><?php echo langVar('page-agendamento-proximo'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens" id="tela-3">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-4 offset-md-4">
					<form class="content-padding">
						<h2 clas="text-center"><?php echo langVar('page-agendamento-entrar'); ?></h2>
						<div class="form-group">
							<label for="exampleInputUser"><?php echo langVar('page-agendamento-usuario'); ?></label>
							<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="Insira seu usuário e e-mail">
							<small id="userHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="exampleInputSenha"><?php echo langVar('page-agendamento-senha'); ?></label>
							<input type="password" class="form-control" id="get-senha" placeholder="Digite sua senha">
						</div>
						<p><a href="<?php echo baseUrl(); ?>suporte/senha"><?php echo langVar('page-agendamento-esqueci'); ?></a></p>
						<div class="row">
							<div class="col-md-6">
								<a  onClick="mudaTela('novo')"><button type="button" class="btn-post right"><?php echo langVar('page-agendamento-novo-cliente'); ?></button></a>
							</div>
							<div class="col-md-6">
								<a  onClick="mudaTela('proximo')"><button type="button" class="btn-post right"><?php echo langVar('page-agendamento-button-entrar'); ?></button></a>
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
							<a  onClick="mudaTela('anterior')"><button class="btn-post left"><?php echo langVar('page-agendamento-anterior'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="agendamento-mixagens" id="tela-4">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-12">
					<form class="needs-validation content-padding" novalidate="">
						<div class="row">
							<div class="col-md-6">
								<h4 class="mb-3"><?php echo langVar('page-agendamento-dados-pessoais'); ?></h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="firstName"><?php echo langVar('page-agendamento-campo-nome'); ?></label>
										<input type="text" class="form-control" id="novo_nome" placeholder="<?php echo langVar('page-agendamento-informe-nome'); ?>" value="" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="lastName"><?php echo langVar('page-agendamento-campo-sobrenome'); ?></label>
										<input type="text" class="form-control" id="novo_sobrenome" placeholder="<?php echo langVar('page-agendamento-informe-sobrenome'); ?>" value="" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="telefone"><?php echo langVar('page-agendamento-campo-telefone'); ?></label>
										<input type="text" class="form-control" id="novo_telefone" placeholder="<?php echo langVar('page-agendamento-informe-telefone'); ?>" required="required">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="celular"><?php echo langVar('page-agendamento-campo-celular'); ?></label>
										<input type="text" class="form-control" id="novo_celular" placeholder="<?php echo langVar('page-agendamento-informe-celular'); ?>" required="required">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>
								
								<div class="mb-3">
									<label for="email"><?php echo langVar('page-agendamento-campo-email'); ?></label>
									<input type="email" class="form-control" id="novo_email" placeholder="<?php echo langVar('page-agendamento-informe-email'); ?>">
									<div class="invalid-feedback">
									<?php echo langVar('page-agendamento-email-valido'); ?>
									</div>
								</div>

								<div class="mb-3">
									<label for="username"><?php echo langVar('page-agendamento-campo-usuario'); ?><</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">@</span>
										</div>
										<input type="text" class="form-control" id="novo_usuario" placeholder="<?php echo langVar('page-agendamento-informe-usuario'); ?>" required="">
										<div class="invalid-feedback" style="width: 100%;">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 md-3">
										<label for="senha"><?php echo langVar('page-agendamento-campo-senha'); ?></label>
										<input type="password" class="form-control" id="novo_senha" placeholder="<?php echo langVar('page-agendamento-informe-senha'); ?>" required="required">
										<small class="form-text text-muted"><?php echo langVar('page-agendamento-title'); ?>Digite no mínimo 8 caracteres.</small>
										<div class="invalid-feedback">
											<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 md-3">
										<label for="repete-senha"><?php echo langVar('page-agendamento-campo-repita-senha'); ?></label>
										<input type="password" class="form-control" id="novo_repete_senha" placeholder="<?php echo langVar('page-agendamento-informe-repita-senha'); ?>" required="required">
										<small class="form-text text-muted"><?php echo langVar('page-agendamento-title'); ?>Repita a senha digitada.</small>
										<div class="invalid-feedback">
											<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<h4 class="mb-3"><?php echo langVar('page-agendamento-endereco'); ?></h4>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="novo_pais"><?php echo langVar('page-agendamento-pais'); ?></label>
										<select name="novo_pais" class="custom-select d-block w-100" id="novo_pais" required="">
											<option value="" selected="selected" disabled="disabled"><?php echo langVar('page-agendamento-selecionar'); ?></option>
											<?php 
											$args = array(
												'table' => 'list_pais',
											);
											$listCountries = getData( $args );
											while ($impCountry = fetchData($listCountries)) {
												?>
												<option value="<?php echo $impCountry['nome']; ?>"><?php echo $impCountry['nome']; ?></option>
												<?php
											}
											?>
										</select>
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="novo_estado"><?php echo langVar('page-agendamento-estado'); ?></label>
										<input type="text" class="form-control" id="novo_estado" placeholder="<?php echo langVar('page-agendamento-informe-estado'); ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5 mb-3">
										<label for="state"><?php echo langVar('page-agendamento-cidade'); ?></label>
										<input type="text" class="form-control" id="novo_cidade" placeholder="<?php echo langVar('page-agendamento-informe-cidade'); ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="state"><?php echo langVar('page-agendamento-bairro'); ?></label>
										<input type="text" class="form-control" id="novo_bairro" placeholder="<?php echo langVar('page-agendamento-informe-bairro'); ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
									<div class="col-md-3 mb-3">
										<label for="zip"><?php echo langVar('page-agendamento-cep'); ?></label>
										<input type="text" class="form-control" id="novo_cep" placeholder="<?php echo langVar('page-agendamento-informe-cep'); ?>" required="">
										<div class="invalid-feedback">
										<?php echo langVar('page-agendamento-obrigatorio'); ?>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="address"><?php echo langVar('page-agendamento-endereco'); ?></label>
									<input type="text" class="form-control" id="novo_endereco" placeholder="<?php echo langVar('page-agendamento-informe-endereco'); ?>" required="">
									<div class="invalid-feedback">
									<?php echo langVar('page-agendamento-obrigatorio'); ?>
									</div>
								</div>
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
							<a  onClick="mudaTela('anterior')"><button class="btn-post left"><?php echo langVar('page-agendamento-anterior'); ?></button></a>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post right"><?php echo langVar('page-agendamento-finalizar-cadastro'); ?></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_cadastro.js?v=3.1.6"></script>