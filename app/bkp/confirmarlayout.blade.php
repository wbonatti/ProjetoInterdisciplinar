    <article class="row">
        <div class="col-md-5 col-md-offset-2 col-xs-8 option-select jumbotron">
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
                <div  id='divcompania'>
                    <div class="row margin-none">
                        <hr>
                        <div class="col-xs-5 padding-none">
                            Nome da compania:
                        </div>
                        <div class="col-xs-7">
                            <div class="row margin-none">
                                <div class="col-md-4 col-xs-12 padding-none">
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
                                <div class="col-md-4 col-xs-12 padding-none">
                                    <input type="text" class="form-control" name="numerovoo" id="numerovoo">
                                </div>
                            </div>
                            <div class="small">Informe os quatro números do voo, exemplo: TAM JJ-<b>8077</b></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row margin-none">
                    <div class="col-xs-5 padding-none">
                        <b class="text-danger">(*) &nbsp;</b>Motivo da localização:
                    </div>
                    <div class="col-xs-7">
                        <div class="row margin-none">
                            <div class="col-md-4 col-xs-12 padding-none">
                                <select class="form-control" name="motivo" id="motivo">
                                    <option>Selecione...</option>
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
                        <b class="text-danger">(*) &nbsp;</b>Autorizar transferência:
                    </div>
                    <div class="col-xs-7">
                        <div class="col-xs-6 padding-none">
                            <input type="radio" class="pull-left" id="autorizatransferencia1" value="true" name="autorizatransferencia">
                            <label for="autorizatransferencia1"> &nbsp;&nbsp; Sim</label>
                        </div>
                        <div class="col-xs-6">
                            <input type="radio" class="pull-left" id="autorizatransferencia2" value="false" name="autorizatransferencia" checked="true">
                            <label for="autorizatransferencia2"> &nbsp;&nbsp; Não</label>
                        </div>
                        <div class="small">
                            @yield('disponibilidade')
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
                        @yield("calcao")
                    </div>
                </div>

                @yield("pagamento")

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
                        <label for="aceitartermogeral"><b class="text-danger">(*) &nbsp;</b>Termos e Condições: </label>
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
        <div class="col-md-3 col-xs-4 option-select media">
            <div class="tab-content" role='tablist'>
                <li class="menu-item-opt"><a href="#tabs-1" class="" data-toggle="tab"><h4> Valores da Reserva </h4></a></li>
                <div class="media-body content-revisao tab-pane" id='tabs-1'>
                    @yield('valores')
                </div>
                <li class="menu-item-opt"><a href="#tabs-2" class="" data-toggle="tab"><h4> Grupo Selecionado </h4></a></li>
                <div class="media-body content-revisao tab-pane" id='tabs-2'>
                    @yield('gruposelecionado')
                </div>
                <li class="menu-item-opt"><a href="#tabs-3" class="" data-toggle="tab"><h4> Loja de Retirada </h4></a></li>
                <div class="media-body content-revisao tab-pane" id='tabs-3'>
                    @yield('lojaretirada')
                </div>
                <li class="menu-item-opt"><a href="#tabs-4" class="" data-toggle="tab"><h4> Loja de Devolução </h4></a></li>
                <div class="media-body content-revisao tab-pane" id='tabs-4'>
                    @yield('lojadevolucao')
                </div>
            </div>
        </div>
    </article> 
    <script>
    $(document).ready(function(){
            $('#tabs').tab(); 
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
                        number: true
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
                        number: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    autorizatransferencia: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    formapagamento: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    opcaopagamento: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    mesvalidade: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    anovalidade: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    aceitartermopgto: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    aceitartermogeral: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    numeroc: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    nometitular: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    },
                    codigoseguranca: {
                        required: "<div class='warning errorbar-top'>Campos com (*) são obrigatórios.</div>"
                    }
                }
            });
        });
        </script>

