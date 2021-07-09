<main role="main">
	<section class="jumbotron text-center header-slogan" style="background-image: url(<?php echo baseUrl(); ?>images/background_05.jpg) !important;">
		<div class="container">
			<img src="<?php echo baseUrl(); ?>images/title_logo_2.png" width="450" alt="">
			<!-- <p class="lead text-muted text-slogan">Entre em contato com o atendimento deste engenheiro se você está interessado em reservar uma sessão</p> -->
		</div>
	</section>
	<div class="header-agendamento-sessao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Agende uma Sessão</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="agendamento-mixagens" id="tela-1">
		<div class="container">
			<div class="row content-mixagens">
				<div class="col-md-5 set-mixagens">
					<h3>Projeto</h3>
					<div class="box-mixes">
						<p>Quantas faixas terá o seu album?</p>
						<div class="form-mixes row">
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="mixagens" id="get-mixes" class="field-mix" maxlength="3">
								<span class="text-mix">Mixagens</span>
							</div>
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="versoes" id="get-versions" class="field-mix" maxlength="3">
								<span class="text-mix">Versões Alternativas</span>
							</div>
							<div class="detail-mixes border-mixes col-md-4">
								<input type="text" name="vinyl" id="get-vinyl" class="field-mix" maxlength="3">
								<span class="text-mix">Adicional Masterização para Vinyl</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 set-agendamento">
					<h3>Sua sessão <a id="call-calendar"><small class="text-muted"> <i class="fas fa-calendar-alt"></i> Selecionar data </small></a></h3>
					<div id="datepicker"></div>
					<div class="box-mixes row" id="orcamento-detalhes">
						<div class="col-md-6">
							<p>Data e Horário para o serviço:</p>
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
							<p>Valores detalhados do Serviço:</p>
							<div class="form-mixes row">
								<div class="detail-mixes col-md-12">
									<table class="table text-left">
									  <thead class="thead-dark">
										<tr>
										  <th scope="col">Descrição</th>
										  <th scope="col">Valor</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
										  <td>Principais</td>
										  <td id="set-mixes">R$ 0,00</td>
										</tr>
										<tr>
										  <td>Alternativas</td>
										  <td id="set-versions">R$ 0,00</td>
										</tr>
										<tr>
										  <td>Para Vinyl</td>
										  <td id="set-vinyl">R$ 0,00</td>
										</tr>
									  </tbody>
										<thead>
										<tr>
										  <th scope="col">Total</th>
										  <th scope="col" id="set-total">R$ 0,00</th>
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
							<h2>Valor Total: <span id="show-total">R$ 0,00</span></h2>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post">Próximo</button></a>
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
					<h3>Detalhes da sua sessão</h3>
					<div class="box-mixes">
						<div class="form-mixes row">
							<div class="col-md-6">
								<label for="">Nome do artista</label>
								<input type="text" name="artista" id="get-artista" class="form-control form-control-lg">
							</div>
							<div class="col-md-6">
								<label for="">Nome do projeto</label>
								<input type="text" name="projeto" id="get-projeto"class="form-control form-control-lg">
							</div>
						</div>
					</div>
					<br />
					<input type="checkbox" name="termos" id="termos" value="sim" /> <label for="termos">Aceito e concordo com os </label> <a data-toggle="modal" data-target="#exampleModalLong">termos e condições</a>.
					<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Termos e Condiçōes - Post Modern Mastering</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>
										<strong>1. Aceitação dos Termos.</strong> 
										Estes termos e condições constituem uma parte do contrato entre Post Modern Mastering e Cliente. Termos e condições adicionais ou diferentes desta citaçāo que possam ser incluídos na ordem de serviço aprovada pelo cliente, são indeferidos, a menos que aprovado por escrito pelo proprietário do Post Modern Mastering.
									</p>
									<p>
										<strong>2. Política de  Preço.</strong>
										O preço cotado é baseado no custo do servico específico escolhido pelo cliente, pelo  tipo de equipamentos e materiais/matéria-prima a serem utilizados pelo engenheiro do Post Modern Mastering para realizar o trabalho a partir da data desta citação, e o preço cotado está sujeito a alteraçāo antes da conclusāo do trabalho com base em quaisquer aumento no custo de tal equipamento, materiais ou tipo de servico, horas de studio excedentes, etc. Todo e qualquer custo adicional como : despesas extas de envio (Correios, Fedex, UPS, DHL), masterizaçāo de versōes alternativas ou ajustes de mixgem após o envio do material a ser masterizado, sāo de responsabilidade do Cliente e serāo cobrados ao final da sessāo de masterizaçāo ou conclusāo do trabalho. O Post Modern Mastering reserva-se o direito de iniciar a sessāo de masterizaçāo mediante  100% do pagamento do valor do serviço. O custo pago pela sessão de Masterizaçāo poderá ser 100% reembolsável se, re-agendadas ou canceladas em até cinco (5) dias úteis antes da sessão agendada. O custo pago por sua sessão será 100% não reembolsável se, reagendadas ou canceladas em quatro (4) dias úteis ou menos, antes da sessão agendada e confirmada. Por favor, notifique o Post Modern Mastering sobre quaisquer mudanças via email. O horário de atendimento e funcionamento do estúdio é de 9:00 às 20:00 horáeio de Brasília
									</p>
									<p>
										<strong>3. Armazenamento de arquivos e materiais. </strong>
										Todos os materiais( HD's, PenDrives, Tapes Analógicos ou qualquer outro dispositivo de armazenamento) e arquivos digitais de cliente remanescente no Post Modern Mastering podem ser assumidos como abandonados após 30dias da conclusão do projeto, salvo notificação apresentada por escrito para o responsável do Post Modern Mastering.
									</p>
									<p>
										<strong>4. Web Server & FTP.</strong>
										Todos os arquivos do artista/cliente enviados para o servidor web do Post Modern Mastering (protegido por senha site FTP) e/ou email, tornam-se imediatamente acessíveis ao Post Modern Mastering e seu responsável. O cliente concorda em aderir a todas às políticas do site Post Modern Mastering e às regras de envio de arquivos para o nosso servidor FTP. Post Modern Mastering não é responsável por qualquer uso ou acesso não autorizado ao referido site e ao conteúdo enviado. Reservamo-nos o direito de apagar e eliminar, sem aviso prévio, de nossos dispositivos de armazenamento,  quaisquer arquivos enviados para o nosso servidor web ou email.
									</p>
									<p>
										<strong>5. Pagamento.</strong> 
										Atraso de pagamento está sujeito à cobrança de juros de 10% ao mês. O Cliente reconhece e concorda que Post Modern Mastering tem o direito de parar/interromper o trabalho, ou de outro modo reter os arquivos mediante ao não pagamento total do serviço ou outra violação do presente acordo. Post Modern Mastering não renuncia a qualquer direito de receber o pagamento integral de qualquer serviço solicitado ao abrigo destes Termos e Condições.
										<br />
										Caso o Post Modern Mastering tenha que  tomar qualquer providência ou mover ação para fazer valer os termos deste Acordo e / ou receber o pagamento, o Cliente concorda em pagar todos os custos incorridos em relação a eles, incluindo, sem exceçāo, todos os honorários advocatícios, despesas e custas judiciais incorridas pela Post Modern Mastering a seu exclusivo critério. O cliente também concorda que a jurisdição exclusiva e local para qualquer reclamação resultante sob os termos do presente acordo será em um tribunal estadual de jurisdição competente no Estado do Rio de Janeiro, Brasil, aceitando assim, submeter-se à jurisdição e foro de tal tribunal.
									</p>

									<p class="text-center">Agosto de 2007, Janeiro de 2018</p>
									<p class="text-center">Post Modern Mastering ® <br />©2018</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-sign-out-alt"></i> Sair</button>
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
							<a  onClick="mudaTela('anterior')"><button class="btn-post left">Anterior</button></a>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post right">Próximo</button></a>
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
						<h2 clas="text-center">Entrar em sua conta</h2>
						<div class="form-group">
							<label for="exampleInputUser">Usuário</label>
							<input type="text" class="form-control" id="get-usuario" aria-describedby="userHelp" placeholder="Insira seu usuário e e-mail">
							<small id="userHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="exampleInputSenha">Senha</label>
							<input type="password" class="form-control" id="get-senha" placeholder="Digite sua senha">
						</div>
						<p><a href="<?php echo baseUrl(); ?>suporte/senha">Esqueci minha senha</a></p>
						<div class="row">
							<div class="col-md-6">
								<a  onClick="mudaTela('novo')"><button type="button" class="btn-post right">Sou Novo</button></a>
							</div>
							<div class="col-md-6">
								<a  onClick="mudaTela('proximo')"><button type="button" class="btn-post right">Entrar</button></a>
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
							<a  onClick="mudaTela('anterior')"><button class="btn-post left">Anterior</button></a>
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
								<h4 class="mb-3">Dados Pessoais</h4>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="firstName">Nome</label>
										<input type="text" class="form-control" id="novo_nome" placeholder="Informe o seu Nome" value="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="lastName">Sobrenome</label>
										<input type="text" class="form-control" id="novo_sobrenome" placeholder="Informe o seu Sobrenome" value="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="telefone">Telefone</label>
										<input type="text" class="form-control" id="novo_telefone" placeholder="Insira o seu telefone" required="required">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="celular">Celular</label>
										<input type="text" class="form-control" id="novo_celular" placeholder="Insira o seu celular" required="required">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								
								<div class="mb-3">
									<label for="email">Email <span class="text-muted">(Opcional)</span></label>
									<input type="email" class="form-control" id="novo_email" placeholder="Insira o seu E-mail">
									<div class="invalid-feedback">
										Insira um e-mail válido para continuar.
									</div>
								</div>

								<div class="mb-3">
									<label for="username">Usuário</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">@</span>
										</div>
										<input type="text" class="form-control" id="novo_usuario" placeholder="Nome de Usuário" required="">
										<div class="invalid-feedback" style="width: 100%;">
											Este campo é obrigatório!
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 md-3">
										<label for="senha">Senha</label>
										<input type="password" class="form-control" id="novo_senha" placeholder="Digite a sua senha" required="required">
										<small class="form-text text-muted">Digite no mínimo 8 caracteres.</small>
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 md-3">
										<label for="repete-senha">Repita a Senha</label>
										<input type="password" class="form-control" id="novo_repete_senha" placeholder="Confirme sua senha" required="required">
										<small class="form-text text-muted">Repita a senha digitada.</small>
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<h4 class="mb-3">Endereço</h4>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label for="novo_pais">País</label>
										<select name="novo_pais" class="custom-select d-block w-100" id="novo_pais" required="">
											<option value="" selected="selected" disabled="disabled">Selecionar</option>
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
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="novo_estado">Estado</label>
										<input type="text" class="form-control" id="novo_estado" placeholder="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5 mb-3">
										<label for="state">Cidade</label>
										<input type="text" class="form-control" id="novo_cidade" placeholder="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<label for="state">Bairro</label>
										<input type="text" class="form-control" id="novo_bairro" placeholder="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
									<div class="col-md-3 mb-3">
										<label for="zip">CEP</label>
										<input type="text" class="form-control" id="novo_cep" placeholder="" required="">
										<div class="invalid-feedback">
											Este campo é obrigatório!
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="address">Endereço</label>
									<input type="text" class="form-control" id="novo_endereco" placeholder="Insira o seu endereço" required="">
									<div class="invalid-feedback">
										Este campo é obrigatório!
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
							<a  onClick="mudaTela('anterior')"><button class="btn-post left">Anterior</button></a>
						</div>
						<div class="col-md-6 text-right">
							<a  onClick="mudaTela('proximo')"><button class="btn-post right">Finalizar Cadastro</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?php echo baseUrl(); ?>js/script_cadastro.js"></script>