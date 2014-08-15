@extends('confirmarlayout')
<?php 
    $tempgto = false; 
    $dataretirada = new DateTime($json->Itinerario->Retirada->Data);
    $datadevolucao = new DateTime($json->Itinerario->Devolucao->Data);
?>
<?php
    //die(var_dump($json->Itinerario));
?>
@section('logolocadora')
    <img src="http://www.rentcars.com.br/{{$json->Opcao[0]->Locadora->Retirada->Bandeira->LogoMarca}}" class="center-block">
@stop

@section('gruposelecionado')
    <div class="row">
        <img src="http://www.rentcars.com.br/{{$json->Opcao[0]->Grupo->Imagem}}" class="center-block">
    </div>
    <div class="row text-center">
        <b>{{$json->Opcao[0]->Grupo->Similares}} - Grupo {{$json->Opcao[0]->Grupo->Nome}}</b>
        <p>Categoria {{$json->Opcao[0]->Grupo->Categoria->Nome}}</p>
    </div>
    <hr>
    <div class="row">
        <h4><b>Características</b></h4>
    </div>
    <ul class="col-xs-12 list-group">
        @foreach($json->Opcao[0]->Grupo->Configuracao as $caracteristica)
            <li class="col-xs-12 list-group-item">
                {{ $caracteristica->Nome }}:
                <span class="label label-default pull-right">{{ $caracteristica->Valor }}</span>
            </li>
        @endforeach
    </ul>

@stop

@section('lojaretirada')
    <ul class="col-xs-12 list-group">
        <li class="col-xs-12 list-group-item">{{$json->Opcao[0]->Locadora->Retirada->Loja->Nome}}</li>
        <li class="col-xs-12 list-group-item">{{$json->Opcao[0]->Locadora->Retirada->Endereco->Endereco}}</li>
        <li class="col-xs-12 list-group-item">Cidade: {{$json->Opcao[0]->Locadora->Retirada->Endereco->Cidade}}</li>
        <li class="col-xs-12 list-group-item">Estado: {{$json->Opcao[0]->Locadora->Retirada->Endereco->Estado}}</li>
        <li class="col-xs-12 list-group-item">Data: {{$dataretirada->format('d-m-Y')}}   Horário: {{$json->Itinerario->Retirada->Horario}}</li>
    </ul>
@stop

@section('lojadevolucao')
    <ul class="col-xs-12 list-group">
        <li class="col-xs-12 list-group-item">{{$json->Opcao[0]->Locadora->Devolucao->Loja->Nome}}</li>
        <li class="col-xs-12 list-group-item">{{$json->Opcao[0]->Locadora->Devolucao->Endereco->Endereco}}</li>
        <li class="col-xs-12 list-group-item">Cidade: {{$json->Opcao[0]->Locadora->Devolucao->Endereco->Cidade}}</li>
        <li class="col-xs-12 list-group-item">Estado: {{$json->Opcao[0]->Locadora->Devolucao->Endereco->Estado}}</li>
        <li class="col-xs-12 list-group-item">Data: {{$datadevolucao->format('d-m-Y')}}   Horário: {{$json->Itinerario->Devolucao->Horario}}</li>
    </ul>
@stop

@section('valores')
    <ul class="col-xs-12 list-group">
        <li class="col-xs-12 list-group-item">
            Tipo de Tarifa
            <span class="pull-right">{{ $json->Opcao[0]->Valor->Tarifa->Nome }}</span>
        </li>
        <li class="col-xs-12 list-group-item">
            Total de Diárias
            <span class="pull-right">{{ $json->Itinerario->Diarias }}</span>
        </li>
        <li class="col-xs-12 list-group-item">
            Total de Horas Excedentes
            <span class="pull-right">{{ $json->Itinerario->HorasExcedentes }}</span>
        </li>
        <li class="col-xs-12 list-group-item">
            Valor das Diárias
            <span class="pull-right">R${{ $json->Opcao[0]->Valor->Veiculo->ValorDia }}</span>
        </li>
        <li class="col-xs-12 list-group-item">
            Proteção Obrigatória
            <span class="pull-right">R${{$json->Opcao[0]->Valor->Protecao->ValorDia }}</span>
        </li>
        @foreach($json->Opcao[0]->Valor->Taxas->Item as $taxas)
            <li class="col-xs-12 list-group-item">
                {{ $taxas->Nome }}
                <span class="pull-right">R${{ $taxas->Valor }}</span>
            </li>
        @endforeach
        <li class="col-xs-12 list-group-item inverse">
            <h4>
                Valor Total
                <span class="pull-right">R${{ $json->Opcao[0]->Valor->Total->ValorTotal }}</span>
            </h4> 
        </li>
    </ul>
@stop

@section('disponibilidade')
    <p>Caso ocorra a indisponibilidade de veículos para seu atendimento junto à Locadora {{ $json->Opcao[0]->Locadora->Retirada->Bandeira->Nome }}, a RentCars irá encontrar outras opções de locadoras e veículos para seu atendimento sob condição similar preços. Caso a alternativa apresentada não lhe satisfaça, você poderá cancelá-lo ou solicitar outras opções.</p>
@stop

@section('calcao')
    Valor exigido pela locadora: {{ $json->Opcao[0]->Protecao[0]->ValorCaucao }}
@stop

@section('pagamento')
    @if($tempgto)
        <hr>
        <div class="media-heading group-item-title">
            <h4 class="ng-binding">
                Formas de pagamento
            </h4>
        </div>
        <div class="row">
            @foreach($prepgto->Opcao as $key=>$opcao) 
                @if($opcao->Nome != "Boleto" && $opcao->Nome != "Shopline Itaú")
                    <label class="col-xs-2 thumbnail text-center" for="pagt{{$key}}" style="cursor: pointer;">
                        <p>{{$opcao->Nome}}</p>
                        <img src="\\www.rentcars.com.br/imagens/creditcards/{{$opcao->Referencia}}.png">
                        <input type="radio" id="pagt{{$key}}" name="formapagamento" rel="{{$key}}" value="{{$opcao->Codigo}}" class="center-block changepgto" style='margin: 0 auto 0 auto;'>
                    </label>
                @endif
            @endforeach
        </div>
        <div class="row">
            @foreach($prepgto->Opcao as $key=>$opcao) 
                @if($opcao->Nome != "Boleto" && $opcao->Nome != "Shopline Itaú")
                <div class="col-xs-12 inactive padding-none" id="div{{$key}}">
                    <ul class="list-group">
                        @foreach($opcao->Parcelamento as $key2=>$parc)
                        <label class="list-group-item" for="opcaopagamento{{$key.$key2}}" style="cursor: pointer;">
                            <input type="radio" id="opcaopagamento{{$key.$key2}}" name="opcaopagamento" class="pull-left">
                            <p class="text-muted">&nbsp;&nbsp;{{ $parc->Nome }} 

                            <a class="pull-right text-muted">{{$parc->Parcela}}x de {{$parc->Valor}}</a></p>
                        </label>
                        @endforeach
                    </ul>
                </div>
                @endif
            @endforeach
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
    @endif
@stop
                    
                    

