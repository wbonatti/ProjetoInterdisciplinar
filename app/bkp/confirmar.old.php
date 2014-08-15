<?php
    //die(var_dump($json->Opcao[0]->Protecao[0]));
    $nome_locadora = $json->Opcao[0]->Locadora->Retirada->Bandeira->Nome;
    $valor_caucao  = $json->Opcao[0]->Protecao[0]->ValorCaucao;    
?>
<!doctype html>
<html>
<head>
    <script>
        var USE_TYPE = "less";
    </script>
    <script src='/js/conf.js'></script>
    
    <!-- js default -->
    <script src='/js/default/jquery.min.js'></script>
    <script src='/js/default/jqueryui.js'></script>
    <script src='/js/default/jquery.mask.js'></script>
    <script src='/js/default/jquery.validate.js'></script>
    
    <!-- angular -->
    <script src='/js/confirmar/app.js'></script>
    <script src='/js/confirmar/controller.js'></script>

    
    <script>
        if(USE_TYPE === "less")
        {
            less.modifyVars({

            });
        }
        $(document).ready(function(){
            $("#divcompania").hide();
            $("#companiaaerea").on("click",function(){
                if ($( this ).prop( "checked" )) {
                    $("#divcompania").show();
                } else {
                    $("#divcompania").hide();
                }
            });
            $(".changepgto").on('click',function(){
               var id = "#div"+$(this).attr("rel");
               $(".active").addClass("inactive");
               $(".active").removeClass("active");
               $(id).removeClass("inactive");
               $(id).addClass("active");
            });
            $("form").validate({
                rules: {
                    motivo: {
                        required: true
                    },
                    autorizatransferencia: {
                        required: true
                    },
                    formapagamento: {
                        required: true
                    },
                    opcaopagamento: {
                        required: true
                    },
                    mesvalidade: {
                        required : true
                    },
                    anovalidade: {
                        required : true
                    },
                    aceitartermopgto: {
                        required : true
                    },
                    aceitartermogeral: {
                        required : true
                    },
                    numeroc: {
                        required : true
                    },
                    nometitular: {
                        required : true
                    },
                    codigoseguranca: {
                        required : true
                    }
                },
                messages: {
                    motivo: {
                        required: "<div class='warning errorbar-top'>Informe o motivo da localização.</div>"
                    },
                    autorizatransferencia: {
                        required: "<div class='warning errorbar-top'>Informe se autoriza tranferência.</div>"
                    },
                    formapagamento: {
                        required: "<div class='warning errorbar-top'>Informe uma forma de pagamento.</div>"
                    },
                    opcaopagamento: {
                        required: "<div class='warning errorbar-top'>Informe uma opção de pagamento.</div>"
                    },
                    mesvalidade: {
                        required: "<div class='warning errorbar-top'>Informe a validade do seu cartão de crédito.</div>"
                    },
                    anovalidade: {
                        required: "<div class='warning errorbar-top'>Informe a validade do seu cartão de crédito.</div>"
                    },
                    aceitartermopgto: {
                        required: "<div class='warning errorbar-top'>Você deve aceitar os termo de pagamentos.</div>"
                    },
                    aceitartermogeral: {
                        required: "<div class='warning errorbar-top'>Você deve aceitar os termo gerais.</div>"
                    },
                    numeroc: {
                        required: "<div class='warning errorbar-top'>Informe o numero do cartão.</div>"
                    },
                    nometitular: {
                        required: "<div class='warning errorbar-top'>Informe o nome do titular do cartão.</div>"
                    },
                    codigoseguranca: {
                        required: "<div class='warning errorbar-top'>Informe o codigo de seguranca do cartão.</div>"
                    }
                }
            });
        });
        
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="http://localhost:8000/#/">Buscar</a>
                </div>
            </div>
        </nav>
    </header>
        <div class="row">
            <div class="col-md-4 col-md-offset-3 option-select jumbotron">
            <!--<form class="col-md-4 col-md-offset-3 option-select jumbotron" id="confirmarForm" method="POST" action=""> -->
                <?= Form::open(array('url' => 'confirmar/'.$params)) ?>
                <div class="row">
                    <h3>Confirme sua Solicitação de Reserva</h3>
                    <hr class="minhr yellow">
                    <br>
                    <div class="media-heading group-item-title">
                        <h4 class="ng-binding">
                            Informações Complementares
                        </h4>
                    </div>
                    <br>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Desembarque no Aeroporto:
                        </div>
                        <div class="col-xs-7">
                            <input type="checkbox" class="pull-left" id="companiaaerea" name="companiaaerea" rel='0'>
                            <label for="companiaaerea"> &nbsp;&nbsp; Chegarei por Companhia Aérea</label>
                        </div>
                    </div>
                    <div class="row margin-none" id='divcompania'>
                        <hr>
                        <div class="col-xs-5 padding-none">
                            Nome da compania:
                        </div>
                        <div class="col-xs-7">
                            <div class="row margin-none">
                                <div class="col-md-7 padding-none">
                                    <select class="form-control" name="nome_compania">
                                        <option value="18">Aerolineas Argentinas</option>
                                        <option value="13">Air France</option>
                                        <option value="12">Air Minas</option>
                                        <option value="28">Alitalia</option>
                                        <option value="17">American Airlines</option>
                                        <option value="8">Avianca</option>
                                        <option value="6">Azul</option>
                                        <option value="19">British Airways</option>
                                        <option value="25">Continental Airlines</option>
                                        <option value="24">Copa Airlines</option>
                                        <option value="20">Delta Airlines</option>
                                        <option value="26">EMIRATES</option>
                                        <option value="1">Gol</option>
                                        <option value="15">Iberia</option>
                                        <option value="22">Lufthansa</option>
                                        <option value="9">Ocean Air</option>
                                        <option value="27">Outros</option>
                                        <option value="10">Pantanal</option>
                                        <option value="3">Passaredo</option>
                                        <option value="16">Pluna</option>
                                        <option value="14">Puma AIR</option>
                                        <option value="23">Rico Linhas Aéreas</option>
                                        <option value="2">TAM</option>
                                        <option value="11">TAP</option>
                                        <option value="7">Trip</option>
                                        <option value="21">United Airlines</option>
                                        <option value="4">VARIG</option>
                                        <option value="5">WebJet</option>
                                        <option value="0">Outros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>   
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Numero do vôo:
                        </div>
                        <div class="col-xs-7">
                            <div class="row margin-none">
                                <div class="col-md-7 padding-none">
                                    <input type="text" class="form-control col-md-6" name="numerovoo" id="numerovoo">
                                </div>
                            </div>
                            <div class="small">Informe os quatro números do voo, exemplo: TAM JJ-<b>8077</b></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            <b class="text-danger">*</b>Motivo da localização:
                        </div>
                        <div class="col-xs-7">
                            <div class="row margin-none">
                                <div class="col-md-7 padding-none">
                                    <select class="form-control" name="motivo" id="motivo">
                                        <option value="0">Lazer</option>
                                        <option value="1">Negócio</option>
                                        <option value="2">Outro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            <b class="text-danger">*</b>Autorizar transferência:
                        </div>
                        <div class="col-xs-7">
                            <div class="col-xs-6 padding-none">
                                <input type="radio" class="pull-left" id="autorizatransferencia1" value="true" name="autorizatransferencia">
                                <label for="autorizatransferencia1"> &nbsp;&nbsp; Sim</label>
                            </div>
                            <div class="col-xs-6">
                                <input type="radio" class="pull-left" id="autorizatransferencia2" value="false" name="autorizatransferencia">
                                <label for="autorizatransferencia2"> &nbsp;&nbsp; Não</label>
                            </div>
                            <div class="small">
                                <p>Caso ocorra a indisponibilidade de veículos para seu atendimento junto à Locadora <?=$nome_locadora ?>, a RentCars irá encontrar outras opções de locadoras e veículos para seu atendimento sob condição similar preços. Caso a alternativa apresentada não lhe satisfaça, você poderá cancelá-lo ou solicitar outras opções.</p>
                                <b class="success">Este serviço é gratuito!</b>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media-heading group-item-title">
                        <h4 class="ng-binding">
                            Condições para Pagamento no Destino
                        </h4>
                    </div>
                    <div class="row margin-none">
                        <p>O locatário realizará o pagamento de todos os serviços contratados diretamente à locadora na data de retirada do veículo.</p>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Forma de Pagamento:
                        </div>
                        <div class="col-xs-7">
                            Cartão de Crédito
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Cartão de Crédito:
                        </div>
                        <div class="col-xs-7">
                            É obrigatória a apresentação de cartão de crédito válido, emitido por instituição bancária e de titularidade do locatário da reserva para abertura do contrato de locação junto à locadora. A aprovação do cartão de crédito apresentado pelo locatário é de única e exclusiva responsabilidade da locadora.
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Caução de Garantia:
                        </div>
                        <div class="col-xs-7">
                            O valor caução exigido pela locadora será bloqueado no limite do cartão de crédito do locatário (valor não debitado) e desbloqueado somente após a devolução do veículo. Não serão aceitos cheque, dinheiro ou bens pessoais como forma de caução.
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Pagamento Parcelado:
                        </div>
                        <div class="col-xs-7">
                            Condições de parcelamento com a Locadora.
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-5 padding-none">
                            Valor Caução de Garantia:
                        </div>
                        <div class="col-xs-7">
                            Valor exigido pela locadora: <?= $valor_caucao ?>
                        </div>
                    </div>
                    <?php if($tempgto): ?>
                    <hr>
                    <div class="media-heading group-item-title">
                        <h4 class="ng-binding">
                            Formas de pagamento
                        </h4>
                    </div>
                    <div class="row">
                        <?php foreach($prepgto->Opcao as $key=>$opcao): 
                                    if($opcao->Nome == "Boleto" || $opcao->Nome == "Shopline Itaú") continue;
                        ?>
                        <label class="col-xs-2 thumbnail text-center" for="pagt<?=$key?>" style="cursor: pointer;">
                            <p><?=$opcao->Nome?></p>
                            <img src="\\www.rentcars.com.br/imagens/creditcards/<?= $opcao->Referencia ?>.png">
                            <input type="radio" id="pagt<?=$key?>" name="formapagamento" rel="<?=$key?>" value="<?=$opcao->Codigo?>" class="center-block changepgto" style='margin: 0 auto 0 auto;'>
                        </label>
                        <?php endforeach; ?> 
                    </div>
                    <div class="row">
                        <?php foreach($prepgto->Opcao as $key=>$opcao): 
                                    if($opcao->Nome == "Boleto" || $opcao->Nome == "Shopline Itaú") continue;
                        ?>
                        <div class="col-xs-12 inactive padding-none" id="div<?=$key?>">
                            <ul class="list-group">
                                <?php foreach($opcao->Parcelamento as $key2=>$parc): ?>
                                <label class="list-group-item" for="opcaopagamento<?=$key.$key2?>" style="cursor: pointer;">
                                    <input type="radio" id="opcaopagamento<?=$key.$key2?>" name="opcaopagamento" class="pull-left">
                                    <p class="text-muted">&nbsp;&nbsp;<?=$parc->Nome?> 
                                    
                                    <a class="pull-right text-muted"><?= $parc->Parcela ?>x de <?=$parc->Valor ?></a></p>
                                </label>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endforeach; ?>
                        <div class="row">
                            <label for="numeroc"><b class="text-danger">*</b>Número do Cartão:              <input type="text" id="numeroc" name="numeroc" class="form-control"></label><hr>
                            <label for="nometitular"><b class="text-danger">*</b>Nome do titular:           <input type="text" id="nometitular" name="nometitular" class="form-control"></label><hr>
                            <div class="row margin-none">
                                <label class="col-xs-12 padding-none">
                                    <b class="text-danger">*</b>Data de Validade:  <br>
                                    <div class="col-xs-5 padding-none col-md-2">
                                        <select name="mesvalidade" class="form-control">
                                            <option value="">Mês</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>          
                                    </div>
                                    <div class="col-xs-7 col-md-3">
                                        <select name="anovalidade" class="form-control">
                                            <option value="">Ano</option>
                                            <?php 
                                                $ano = date("Y");
                                                $anofim = $ano + 50;
                                                while($ano < $anofim)
                                                {
                                                    echo '<option value="'.$ano.'">'.$ano.'</option>';
                                                    $ano++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </label>
                            </div>
                            <hr>
                            <label for="codigoseguranca"><b class="text-danger">*</b>Código de Segurança:   <input type="text" id="codigoseguranca" name="codigoseguranca" class="form-control"></label><hr>
                            <div class="media-heading group-item-title">
                                <h4 class="ng-binding">
                                    Termos e Condições de Pré Pagamento
                                </h4>
                            </div>
                            <div class="row margin-none">
                                <div class="termo">
                                    <p>Pagamento com cartão de crédito: o locatário poderá utilizar os seguintes cartões de crédito para pagar suas reservas internacionais online pela Mobicar: Visa, Mastercard, American Express, Diners e Elo. No momento do pagamento online, tenha sempre em mãos o seu cartão de crédito. Através dele, você poderá informar com exatidão dados imprescindíveis para completar a sua reserva: a bandeira do cartão, nome do titular do cartão (exatamente como aparece impresso), número do cartão e código de segurança. Somente um cartão de crédito poderá ser indicado como forma de pagamento online. Não é possível dividir o pagamento da reserva com a utilização de outros cartões.</p> 
                                    <hr>
                                    <ol>   
                                        <li>Parcelamento: o locatário poderá parcelar o valor total da venda em até 3 (três) vezes sem juros, sendo R$100,00 o valor mínimo de cada parcela.</li>        
                                        <li>Aprovação e Confirmação do Pagamento: para sua segurança, toda solicitação de reserva está sujeita à confirmação dos dados cadastrais e do pagamento. Esta conferência, quando necessária, poderá ser realizada através de contato telefônico e visa exclusivamente garantir a identidade do locatário e evitar qualquer dano ou prejuízo ao mesmo. Após a aprovação do pagamento, o locatário receberá por e-mail o documento Voucher de Confirmação de Reserva, o qual representa a garantia de reserva do veículo junto à locadora e comprovante de pagamento dos serviços contratados, que deverá ser impresso e apresentado à locadora no dia da retirada do veículo obrigatoriamente.</li> 
                                        <li>Pagamento não autorizado: a solicitação de reserva poderá ser cancelada caso o cartão de crédito utilizado para pagamento não seja aprovado pela administradora do cartão e/ou pelo sistema de cobrança, sem qualquer responsabilidade e/ou interferência da Mobicar. A reserva não poderá ser reutilizada após o seu cancelamento. A Mobicar não tem acesso aos motivos de não aprovação do pagamento, sendo necessária a consulta somente junto a administradora de seu cartão de crédito. Importante: o pagamento online e antecipado dos serviços contratados através da Mobicar não desobrigará o locatário da apresentação do cartão de crédito internacional e de sua titularidade à locadora na data de abertura do contrato de locação e retirada do veículo. O cartão de crédito deverá possuir o limite mínimo exigido pela locadora, quando será feita uma pré-autorização de débito, para cobrir eventuais danos ou avarias que o veículo possa sofrer durante a locação.</li> 
                                        <li>Serviços Opcionais: é comum a indicação e venda de serviços e acessórios adicionais pela locadora no ato da abertura do contrato de locação (serviços não contratados pelo locatário em sua reserva online). Você tem a opção de aceitar ou não quaisquer opcionais que lhe forem oferecidos no ato da abertura do contrato. Uma vez assinado o contrato e iniciada a locação, os serviços opcionais contratados não poderão ser cancelados e não serão reembolsados. Certifique-se de que as assinaturas solicitadas correspondem aos serviços opcionais que contratou (accepted - aceito) ou não (declined - recusado).</li> 
                                        <li>Alterações na Reserva: todas as alterações solicitadas na reserva estarão sujeitas a uma nova análise de disponibilidade de veículos junto à locadora contratada. Algumas alterações exigirão o recálculo dos valores dos serviços contratados com base nas tarifas atuais da locadora e conversão da moeda com base na cotação do dia. Uma nova cobrança poderá ser solicitada ao locatário quando os valores atualizados divergirem daqueles já pagos na emissão da reserva.</li> 
                                        <li>Alteração na Forma de Pagamento: após a aprovação da reserva, a forma de pagamento não poderá ser alterada.</li> 
                                        <li>Devolução antecipada: ocorrendo a interrupção da reserva após seu início de utilização, não haverá devolução de valores pagos.</li> 
                                        <li>Cancelamento: o locatário deverá solicitar o cancelamento da reserva em até 24 horas de antecedência da data prevista para retirada do veículo junto à locadora através da Central de Atendimento ao Cliente. Encargos não reembolsáveis em caso de estorno conforme item 10. Não haverá prorrogação do prazo para cancelamento caso o prazo de desistência tenha vencimento em dia não útil. A reserva não poderá ser reutilizada após o seu cancelamento.</li> 
                                        <li>Condições de Estorno e Taxas: a Mobicar realizará a devolução do valor pago ao locatário com dedução de encargos conforme abaixo: Para cancelamentos haverá taxa de 5% do valor total da venda.</li> 
                                        <li>O cancelamento da reserva pela locadora devido o não preenchimento dos requisitos necessários para a abertura do contrato como (idade mínima requerida, carteira de habilitação válida e aceitável no país de destino, passaporte válido, cartão de crédito internacional com limite disponível para caução, apresentação do voucher impresso, etc.), taxa de 5% do valor total da venda.</li> 
                                        <li>O não comparecimento do locatário para retirada do veículo junto à locadora (No-Show) de acordo com datas e horários estabelecidos no Voucher de Confirmação de Reserva, taxa de 10% do valor total da venda.</li> 
                                        <li>Para alteração, não haverá encargos quando tratar-se de uma única alteração. Na necessidade de outras alterações, será cobrado taxa de 5% por alteração sobre o valor total da venda. Importante Alterações estarão sujeitas a disponibilidade e reajuste de tarifa.</li> 
                                        <li>Estorno do Pagamento: a Mobicar solicitará o estorno do lançamento do débito à administradora do cartão de crédito no prazo de até 10 dias úteis a contar da data de emissão do cancelamento da reserva. A restituição do valor pago ocorrerá em faturas subsequentes quando a solicitação de estorno ocorrer dentro de um prazo de até 180 dias a contar da data em que foi efetivada a venda. Após esse prazo, qualquer estorno será administrado diretamente pela Mobicar com o cliente.</li> 
                                        <li>No-Show: em caso de No-Show (não comparecimento à locadora para retirada do veículo), a reserva não poderá ser alterada ou utilizada.</li> 
                                        <li>Autorização de Cambio e Transferência: o cliente autoriza a Mobicar Turismo Ltda. a realizar o cambio e transferência em seu nome junto às instituições bancárias brasileiras para fim exclusivo do pagamento às locadoras no exterior dos custos da locação de seu(s) veículo(s).</li> 
                                    </ol>
                                </div>
                            </div>
                            <hr>
                            <div class="row margin-none">
                                <div class="col-xs-5 padding-none">
                                    <label for="aceitartermopgto"><b class="text-danger">*</b>Termos de Pagamento:</label>
                                </div>
                                <div class="col-xs-7">
                                    <input type="checkbox" class="pull-left" id="aceitartermopgto" name="aceitartermopgto" value="true">
                                    &nbsp;&nbsp;Assumo inteira responsabilidade sobre as informações prestadas e declaro estar ciente e de acordo com os termos de pagamento.
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="row media-heading group-item-title">
                        <hr>
                        <h4 class="ng-binding">
                            Termos e Condições Gerais de Locação
                        </h4>
                    </div>
                    <div class="row">
                        <div class="termo">
                            <p>Os Termos e Condições Gerais, abaixo detalhados, são meramente informativos e representam o conjunto de informações, regras e obrigações usualmente exigidas pelas Locadoras na formalização do Contrato de Locação. Poderá haver diferenças no contrato de cada Locadora, razão pela qual é importante uma atenta leitura no ato da abertura do contrato. A Mobicar não se responsabiliza em caso de eventuais mudanças e/ou novas exigências das Locadoras. Quaisquer dúvidas a respeito desses procedimentos e exigências devem ser dirimidas previamente, pois podem impossibilitar a efetivação da reserva e, consequentemente, a retirada do veículo.</p> 
                            <hr>
                            <ol>
                                <li>Contrato de Locação: o contrato de locação representa um conjunto de informações, regras, direitos e deveres entre locadora e locatário, no que diz respeito aos serviços a serem contratados e será apresentado pela locadora ao locatário no dia da retirada do veículo.</li> 
                                <li>Idade Mínima do Locatário/Condutor: 21 anos.</li> 
                                <li>Carteira de Habilitação: o locatário deverá apresentar à locadora o documento original de habilitação brasileira, válida e emitida há pelo menos 02 anos. Para locatários não brasileiros, estes deverão apresentar o documento original de habilitação internacional juntamente com a carteira de habilitação do país de sua nacionalidade.</li> 
                                <li>CPF ou Passaporte: o locatário deverá apresentar à locadora o documento CPF original para abertura do contrato de locação. Para locatários não brasileiros, estes deverão apresentar o documento passaporte original e válido do país de sua nacionalidade.</li> 
                                <li>Restrições SPC/Serasa: a locadora poderá realizar a consulta do CPF do locatário nos órgãos de proteção ao crédito. Na existência de pendências financeiras a locadora poderá negar a abertura do contrato de locação, impossibilitando a retirada do veículo e por sua vez cancelar a reserva sem prévio aviso.</li> 
                                <li>Cartão de Crédito: o locatário deverá apresentar à locadora o cartão de crédito válido, de sua titularidade e com limite disponível para a caução de garantia. A locadora poderá aceitar um ou mais cartões de créditos válidos e de titularidade do locatário para a caução - não serão aceitos cartões de crédito de terceiros ou não vinculados a instituições bancárias. A aprovação do cartão de crédito é de única e exclusiva responsabilidade da locadora.</li> 
                                <li>Documento de Confirmação: o locatário deverá apresentar à locadora o documento de confirmação de reserva impresso e legível, o qual representa a garantia de reserva do veículo junto à locadora e desconto aplicado sobre a tarifa balcão.</li> 
                                <li>Dados antecipados para a locadora: informações complementares do locatário, assim como o pagamento antecipado do valor total ou parcial dos serviços contratados poderão ser solicitados com antecedência pela locadora por telefone ou e-mail. O não fornecimento das informações solicitadas ou o insucesso no contato entre a locadora com o locatário poderá ocasionar o cancelamento da reserva pela locadora sem prévio aviso.</li> 
                                <li>Moeda: os valores da reserva são expressos na moeda local do país de destino, Real Brasileiro (BRL).</li> 
                                <li>Valor Caução de Garantia: o valor caução exigido pela locadora será bloqueado no cartão de crédito do locatário no dia da abertura do contrato e desbloqueado em até 72horas após a devolução do veículo à locadora. O valor caução possui variação de tarifa de acordo com o grupo do veículo locado e período de utilização. O valor caução poderá ser retido pela locadora em casos de avarias ao veículo locado. </li> 
                                <li>Pagamento dos Serviços: a cobrança do valor total dos serviços contratados poderá ser solicitada pela locadora no dia da abertura ou fechamento do contrato de locação. A locadora poderá solicitar ao locatário a antecipação dos dados de cartão de crédito e pagamento antecipado de sinal para garantia de reserva.</li> 
                                <li>Pagamento Parcelado em Cartão de Crédito: o locatário deverá solicitar o pagamento parcelado dos serviços contratados no dia da retirada do veículo. A disponibilidade do parcelamento sem juros em cartão de crédito e o número limite de parcelas será confirmada no balcão de atendimento da locadora e estará sujeito a alterações sem prévio aviso.</li> 
                                <li>Prazo para Retirada do Veículo: a locadora permanecerá com a reserva do veículo garantida até 30 minutos após o horário previsto para retirada ou até o horário limite de funcionamento da loja de retirada, o que for menor. Após este prazo a reserva será cancelada em sistema (No-Show). Em caso de atraso de qualquer natureza (incluído atraso aéreo, substituição de vôo ou overbooking aéreo para aqueles que retiram o veículo em aeroporto), comunique imediatamente a loja de retirada do veículo através do telefone presente no documento de confirmação ou, em caso de dificuldades, entrar em contato com a Central de Reservas Mobicar por e-mail ou telefone para atualização do horário de retirada do veículo.</li> 
                                <li>Prazo de Devolução do Veículo: o locatário deverá realizar a devolução do veículo à locadora em data, horário e local determinado no contrato de locação. Após o período de tolerância de 59 minutos, a partir do horário previsto para devolução do veículo, a locadora poderá multar ou realizar cobrança de taxas adicionais com base no valor de tabela balcão.</li> 
                                <li>Horários de Funcionamento da loja: os horários de funcionamento da loja apresentados em seu Documento de Confirmação de Reserva Mobicar poderão sofrer mudanças sem prévio aviso, por isso orientamos a conferir as informações pertinentes à devolução do veículo no momento da abertura do contrato junto a locadora. Em caso de devolução em data, horário e local diferentes do determinado em contrato de locação, é de responsabilidade do Locatário verificar a disponibilidade junto a Locadora ou Central de Reservas Mobicar o horário de funcionamento antes de qualquer deslocamento.</li> 
                                <li>Serviço de Entrega ou Shuttle: o locatário deverá apresentar antecipadamente o número do vôo e companhia aérea do desembarque para&nbsp; os serviços de atendimento à distância, realizado por&nbsp; locadora localizada fora da área aeroportuária. O não fornecimento das informações poderá resultar no&nbsp; cancelamento da reserva pela locadora sem prévio aviso.</li> 
                                <li>Serviços e Acessórios Opcionais: é comum a indicação e venda de serviços e acessórios adicionais pela locadora no ato da abertura do contrato de locação (serviços não contratados pelo locatário em sua reserva). Você tem a opção de aceitar ou não quaisquer opcionais que lhe forem oferecidos no ato da abertura do contrato. Uma vez assinado o contrato e iniciada a locação, os serviços opcionais contratados não poderão ser cancelados e não serão reembolsados. Certifique-se de que as assinaturas solicitadas correspondem aos serviços opcionais que contratou. Os acessórios opcionais não poderão ser garantidos com antecedência e estará sujeito a disponibilidade junto à locadora.</li> 
                                <li>Grupo de Veículos: os veículos são reservados por GRUPO e não serão garantidos em reserva veículos por marca, ano, modelo, cor, final de placa ou configuração. Os modelos poderão sofrer variações na renovação de frota da locadora sem prévio aviso, assim como a capacidade de bagagem do veículo poderá ser reduzida ou inexistente de acordo com o número de ocupantes do veículo. O upgrade de categoria poderá ser apresentado pela locadora quando esta não apresentar disponibilidade de veículos do grupo reservado.</li> 
                                <li>Taxa de Retorno: a taxa de retorno, prevista para as locações onde a devolução do veículo não ocorre na loja onde foi realizada a retirada, é calculada com base na distância entre as lojas e multiplicada pelo custo médio/hora de transporte do veículo à loja de origem. A Taxa de Retorno possui variação entre R$1,00 a R$2,00 por km de distância e as regras de cobrança poderão variar entre as locadoras.</li> 
                                <li>Tarifa Regional: para algumas localidades, onde a depreciação dos veículos é maior, será adicionada a cobrança de tarifa regional, o valor da tarifa varia entre 5% a 30% sobre o valor total dos serviços contratados.</li> 
                                <li>Despesas Extras: despesas extras não apresentadas no documento de confirmação de reserva serão cobradas pela locadora diretamente ao locatário. Exemplos de despesas extras: multas de trânsito, danos ou avarias causados ao veículo locado e sem cobertura, taxa de limpeza, serviços e acessórios contratados diretamente na locadora.</li> 
                                <li>Proibido fumar: é proibido fumar dentro do veículo locado.</li> 
                                <li>Atualização de Valores: os valores da reserva possuem como referência as informações contidas na solicitação do locatário. Os valores poderão sofrer alterações quando: a) Ocorrer mudanças de itinerário, grupos, serviços e informações da reserva; b) Inclusão ou exclusão de serviços e acessórios opcionais; c) Inclusão de taxas adicionais apresentados pela locadora e não calculados na emissão da reserva ou não apresentadas no documento de confirmação. Na discordância dos valores recalculados e apresentados em documento contratual o locatário poderá solicitar o cancelamento da reserva.</li> 
                                <li>Vistoria do Veículo: recomendamos ao locatário acompanhar a vistoria do veículo, realizado por funcionário técnico da locadora, no ato da retirada e devolução do veículo. Lembre-se de verificar e apontar as condições de limpeza, higiene, conservação, danos e/ou avarias existentes no veículo locado. A locadora poderá realizar a cobrança de manutenção das avarias causadas ao veículo em sua locação, assim como a taxa de limpeza e higienização com base na tabela de valores da locadora.</li> 
                                <li>Documentos do Veículo e Itens de Segurança: confira no ato da retirada do veículo a documentação do automóvel e a existência dos acessórios de segurança: pneu estepe, macaco, chave de roda, triângulo de sinalização e nível do tanque de combustível.</li> 
                                <li>Combustível e Reabastecimento: o veículo será entregue ao locatário com tanque cheio e deverá ser devolvido com tanque cheio à locadora. Para aqueles que optarem pelo serviço de entrega no aeroporto, o veículo poderá apresentar um volume menor de combustível devido o deslocamento no percurso entre a locadora ao aeroporto e neste caso o reabastecimento do veículo no dia da devolução pelo locatário deverá seguir os critérios estabelecidos pela locadora: devolução com tanque cheio ou parcial. Em caso de não reabastecimento no dia da devolução do veículo haverá a cobrança do combustível com base na tabela de preços da locadora disponível no balcão de atendimento. Importante: Algumas locadoras adotam o procedimento de entrega do veículo com tanque parcial e o veículo deverá ser devolvido da mesma forma como foi entregue.</li> 
                                <li>Itens sem Cobertura de Risco / Proteção Obrigatória: o locatário estará sujeito às cláusulas e exclusões e pagamento presentes no contrato de locação da locadora. De regra, a cobertura exclui os seguintes itens: acessórios, pneu danificado, roda danificada, suspensão danificada devido a buracos ou guias, trincos no para-brisa, danos causados por enchentes ou qualquer outro fenômeno da&nbsp; natureza, perda ou danificação da chave e/ou documentação do veículo. Estas exclusões podem variar entre as locadoras e deverão ser confirmadas no ato da retirada do veículo ao locatário.</li> 
                                <li>Saída do País com o Veículo Locado: é proibida a circulação com o veículo locado para fora do território Nacional.</li> 
                                <li>Acidentes de Trânsito: em caso de acidente, furto ou dano ao veículo locado, é imprescindível que o locatário comunique imediatamente a locadora e realize o Boletim de Ocorrência Policial. O locatário deverá preencher o formulário de relatório de acidentes junto à locadora no prazo de 24 horas.</li> 
                                <li>Titularidade da Reserva: o documento de confirmação de reserva é individual e intransferível.</li> 
                                <li>Alterações da Reserva: a solicitação de alteração nos dados da reserva estará sujeita a reanálise de disponibilidade de veículos do grupo e atualização de valores com base na tabela vigente de tarifas e descontos da locadora.</li> 
                                <li>Cancelamento da Reserva: em caso de não utilização da reserva confirmada, o locatário deverá solicitar o cancelamento da reserva através da Central de Reservas Mobicar 4003-7368 em horário comercial com até 24 horas de antecedência ao horário de retirada do veículo.</li> 
                                <li>No-Show: a locadora poderá realizar a cobrança e débito de No-Show diretamente ao locatário, caso este não compareça à locadora para abertura do contrato de locação e retirada do veículo ou não realize o comunicado de cancelamento da referida reserva no prazo mínimo de 24 horas de antecedência ao horário de retirada do veículo.</li> 
                                <li>Indisponibilidade de Veículos: a Mobicar não se responsabiliza pelo não cumprimento das obrigações da locadora quanto à indisponibilidade de veículos para atendimento. É de responsabilidade de o locatário comunicar à Central de Reservas Mobicar quaisquer dificuldades apresentadas junto à locadora na abertura do contrato de locação ou retirada do veículo.</li> 
                                <li>Central de Reservas e Atendimento ao Cliente Mobicar. No Brasil (ligação local): 4003 7368 ou (41) 3152 9701. No Exterior (ligação interurbana): +55 41 3152 9701. Nosso horário de atendimento é de segunda-feira à sexta-feiras das 08:00h às 21:35h, sábados das 09:00h às 16:45h, domingos das 13:30h às 18:30h.</li> 
                            </ol>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-5 padding-none">
                            <label for="aceitartermogeral"><b class="text-danger">*</b>Termos e Condições: </label>
                        </div>
                        <div class="col-xs-7">
                            <input type="checkbox" class="pull-left" id="aceitartermogeral" name="aceitartermogeral" value="true">
                            &nbsp;&nbsp;Assumo inteira responsabilidade sobre as informações prestadas e declaro estar ciente e de acordo com os termos expostos acima. 
                        </div>
                    </div>
                    <hr>
                    <div class="row margin-none">
                        <div class="col-xs-10 col-xs-offset-1">
                            <input type="submit" class="pull-right btn btn-success btn-lg mobicar-btn" value="Solicitar Reserva">
                        </div>
                    </div>
                </div>
            </div>
        </div> 

  
</body>
</html>
