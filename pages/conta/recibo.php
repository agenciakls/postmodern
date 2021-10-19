<main class="page-clients">
    <div class="container">
        <?php
        $idPedido = $_GET[ 'p' ];
        $args = array(
            'table' => 'pedidos',
            'where' => array(
                'id' => $idPedido,
                'id_cliente' => $usuarioAtual[ 'id' ],
                'pagamento_status' => 3,
                'status' => 'ativo'
            )
        );
        $pegarPedido = getData( $args );
        $quantidade = quantityData( $pegarPedido );
        if ($quantidade == 1) {
            while ($impPedido = fetchData($pegarPedido)) {
                $payType = array(
                    'table' => 'pagamento_tipos',
                    'where' => array(
                        'id' => $impPedido['pagamento_status']
                    )
                );
                $payData = getData( $payType );
                $qtPay = quantityData( $payData );
                if ($qtPay == 1) {
                    while ($impPay = fetchData($payData)) {
                        $impPagamento = $impPay;
                    }
                }

                $situationType = array(
                    'table' => 'situacao_tipos',
                    'where' => array(
                        'id' => $impPedido['situacao']
                    )
                );
                $situationData = getData( $situationType );
                $qtSituation = quantityData( $situationData );
                if ($qtSituation == 1) {
                    while ($impSituation = fetchData($situationData)) {
                        $impSituation = $impSituation;
                    }
                }
                ?>
            <div class="only-print">
                <div class="row py-4">
                    <div class="col-md-4">
                        <small>
                            <p class="my-0 py-0"><strong><?php echo langVar('page-conta-recibo-telefone'); ?></strong></p>
                            <p class="my-0 py-0">(21) 99999-9999</p>
                        </small>
                    </div>
                    <div class="col-md-4">
                    <img src="<?php echo $basePrincipal; ?>images/title_logo_site.png" style="display: block; margin: 0px auto; width: 300px;" width="300" alt="">
                    </div>
                    <div class="col-md-4 text-right">
                        <small>
                            <p class="my-0 py-0"><strong><?php echo langVar('page-conta-recibo-email'); ?></strong></p>
                            <p class="my-0 py-0">contato@postmodernmastering.com</p>
                        </small>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <!-- FLASH MESSAGE -->
                <div class="content-divider jumbotron my-3 py-3">

                    <p>
                        <i class="far fa-user"></i>
                        <?php echo $usuarioAtual['nome'] . ' ' . $usuarioAtual['sobrenome']; ?>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        <?php 
                        $detailAddress = array(
                            $usuarioAtual['endereco'],
                            $usuarioAtual['bairro'],
                            $usuarioAtual['cidade'],
                            $usuarioAtual['estado'],
                            $usuarioAtual['pais'],
                            $usuarioAtual['cep'],
                            
                        );
                        $addressComplete = implode(',', $detailAddress); ?>
                        <a target="_blank" href="http://maps.google.com/?q=<?php echo $addressComplete; ?>"><?php echo $addressComplete; ?></a></p>
                    <p>
                        <i class="far fa-clock"></i>
                        <?php echo langVar('page-conta-recibo-data-hora'); ?> <?= strftime("%d/%m/%Y - %H:%M", strtotime($impPedido['data'])); ?>

                    <p>
                        <?php
                        $telefone = $usuarioAtual['celular'];
                        $phoneNumber = preg_replace("/[^0-9]/", "", $telefone);
                        $phoneQuantity = strlen($phoneNumber);
                        $link = ($phoneQuantity == 9 || $phoneQuantity == 11) ? 'https://api.whatsapp.com/send?phone=+55' . $phoneNumber : 'tel:+55' . $phoneNumber;
                        $icon = ($phoneQuantity == 9 || $phoneQuantity == 11) ? '<i class="fab fa-whatsapp"></i>' : '<i class="fas fa-phone"></i>';
                        ?>
                        <?= $icon; ?> <a href="<?php echo $link; ?>" target="_blank"><?php echo $usuarioAtual['celular']; ?></a>
                    <p>
                    <p>
                        <i class="far fa-envelope"></i>
                        <a href="mailto:<?php echo $usuarioAtual['email']; ?>"><?php echo $usuarioAtual['email']; ?></a>
                    <p>
                    <p>
                        <i class="flag fab"></i>
                    <?php 
                    switch ($impPagamento['id']) {
                        case 1: $color = 'warning'; break; 
                        case 2: $color = 'secondary'; break;
                        case 3: $color = 'success'; break;
                        case 4: $color = 'secondary'; break;
                        case 5: $color = 'warning'; break;
                        case 6: $color = 'danger'; break;
                        default; $color = 'dark'; break;
                    }
                    ?>
                        <span class="badge badge-<?php echo $color; ?>"><?php echo $impPagamento['titulo']; ?></span>
                        <i class="flag fab"></i>
                    <?php 
                    switch ($impSituation['id']) {
                        case 1: $color = 'warning'; break; 
                        case 2: $color = 'primary'; break;
                        case 3: $color = 'success'; break;
                        case 4: $color = 'warning'; break;
                        case 5: $color = 'primary'; break;
                        case 6: $color = 'success'; break;
                        default; $color = 'dark'; break;
                    }
                    ?>
                        <span class="badge badge-<?php echo $color; ?>"><?php echo $impSituation['titulo']; ?></span>
                    </p>

                    <span class="no-print">
                        <a href=javascript:print();><button class="btn-post"><?php echo langVar('page-conta-recibo-imprimir-ordem'); ?></button></a>
                    </span>

                </div>

                <!-- ITENS -->
                <div class="content-divider jumbotron my-3 py-3">
                    <div class="content-divider-in">
                        <table class="ui table">
                            <thead>
                                <tr>
                                    <th><?php echo langVar('page-conta-recibo-servico'); ?></th>
                                    <th><?php echo langVar('page-conta-recibo-valor-unitario'); ?></th>
                                    <th><?php echo langVar('page-conta-recibo-quantidade'); ?></th>
                                    <th><?php echo langVar('page-conta-recibo-total'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalFinal = 0;
                                if ($impPedido['mixes'] ) {
                                    $valor = returnSetting('mixe');
                                    $qtd = $impPedido['mixes'];
                                    $total = $valor * $qtd;
                                    $totalFinal = $totalFinal + $total;
                                    ?>
                                    <tr class="item-36896">
                                        <td data-th="Serviço/Produto">
                                            <p><b><?php echo $impPedido['projeto'] . ' (' . $impPedido['artista'] . ') - ' . $qtd . ' mixe(s)';?></b></p>
                                        </td>
                                        <td width="15%" data-th="Valor Unit.">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($valor, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td data-th="Qtd"><?php echo $qtd; ?></td>
                                        <td width="15%" data-th="Total">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($total, 2, ',', '.') ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                
                                if ($impPedido['versoes'] ) {
                                    $valor = returnSetting('versao');
                                    $qtd = $impPedido['versoes'];
                                    $total = $valor * $qtd;
                                    $totalFinal = $totalFinal + $total;
                                    ?>
                                    <tr class="item-36896">
                                        <td data-th="Serviço/Produto">
                                            <p><b><?php echo $impPedido['projeto'] . ' (' . $impPedido['artista'] . ') - ' . $qtd . ' versão(ões)';?></b></p>
                                        </td>
                                        <td width="15%" data-th="Valor Unit.">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($valor, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td data-th="Qtd"><?php echo $qtd; ?></td>
                                        <td width="15%" data-th="Total">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($total, 2, ',', '.') ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                
                                if ($impPedido['vinyl'] ) {
                                    $valor = returnSetting('vinyl');
                                    $qtd = $impPedido['vinyl'];
                                    $total = $valor * $qtd;
                                    $totalFinal = $totalFinal + $total;
                                    ?>
                                    <tr class="item-36896">
                                        <td data-th="Serviço/Produto">
                                            <p><b><?php echo $impPedido['projeto'] . ' (' . $impPedido['artista'] . ') - ' . $qtd . ' vinyl';?></b></p>
                                        </td>
                                        <td width="15%" data-th="Valor Unit.">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($valor, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td data-th="Qtd"><?php echo $qtd; ?></td>
                                        <td width="15%" data-th="Total">
                                            <span class="nowrap">
                                                <?php echo $impPedido['moeda']; ?> <?= number_format($total, 2, ',', '.') ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <div align="right" class="order-money-totals">
                            <p><b><?php echo langVar('page-conta-recibo-total-final'); ?></b> <?php echo $impPedido['moeda']; ?> <span class="total"><?php echo number_format($totalFinal, 2, ',', '.') ?></span></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <?php
                
                if ($impPedido['informacoes']) {
                    ?>
                    <!-- DETAILS -->
                    <div class="content-divider jumbotron my-3 py-3">
                        <h3><?php echo langVar('page-conta-recibo-detalhes'); ?></h3>
                        <p><?php echo $impPedido['informacoes']; ?></p>
                    </div>
                    <?php
                }
                if ($impPedido['descricao']) {
                    ?>
                    <!-- OBSERVATIONS -->
                    <div class="content-divider jumbotron my-3 py-3">
                        <h3><?php echo langVar('page-conta-recibo-descricao'); ?></h3>
                        <p><?php echo $impPedido['descricao']; ?></p>
                    </div>
                    <?php
                }
                ?>
                

                <span class="no-print">
                    <a href="<?php echo baseUrl(); ?>conta/pedido?p=<?php echo $idPedido; ?>"><button class="btn-post"><?php echo langVar('page-conta-recibo-voltar'); ?></button></a>
                </span>
                <div class="edit-item-form"></div>
            </div>
        <?php
            }
        }
        ?>
    </div>
</main>