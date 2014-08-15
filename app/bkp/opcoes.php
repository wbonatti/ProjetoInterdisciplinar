<div>
    <div class="navbar navbar-default" ng-show="loading">
        <div class="collapse navbar-collapse">
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <h4><img height="32" width="32" src="http://www.rentcars.com.br/imagens/theme/loader/32x32d.gif"> Carregando...</h4>
          </div>
        </div>
    </div>
    <div class="row" ng-hide="loading">
        <div class="col-md-4 col-md-offset-3 option-select jumbotron">
            <div class="row">
                <h3>Configure sua Solicitação de Reserva</h3>
                <ul class="nav nav-tabs nav-tabs-controllers">
                    <li class="btn nav-tabs-btn active" ng-click="clickmenu1()" id="btn1">
                        <div class="pull-left large nav-tabs-index">
                            1
                        </div>
                        <div class="nav-tabs-content">
                            <b>Lojas de Atendimento</b>
                            <div class="small">Selecione…</div>
                        </div>
                    </li>
                    <li class="btn nav-tabs-btn" ng-click="clickmenu2()" id="btn2">
                        <div class="pull-left large nav-tabs-index">
                            2
                        </div>
                        <div class="nav-tabs-content">
                            <b>Proteção Obrigatória</b>
                            <div class="small">Selecione…</div>
                        </div>
                    </li>
                    <li class="btn nav-tabs-btn" ng-click="clickmenu3()" id="btn3">
                        <div class="pull-left large nav-tabs-index">
                            3
                        </div>
                        <div class="nav-tabs-content">
                            <b>Serviços Opcionais</b>
                            <div class="small">Selecione…</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form name="form_opcoes" id="form_opcoes">
                    <div class="media group-item" ng-show="menu1">
                        <div class="media-heading group-item-title">
                            <h4>
                                Selecione a Loja de Retirada do Veículo em {{ itinerario.Retirada.Data }} às {{ itinerario.Retirada.Horario }}h
                            </h4>
                        </div>
                        <div style="color: red; width: 100%;">
                            <b>{{ erroRetirada }}</b>
                        </div>
                        <div class="media-body group-item-body" ng-repeat="Locadora in LocadoraRetirada">
                            <input class="pull-left" id="retirada{{Locadora.Loja.Codigo}}" type="radio" name="retirada" value="{{Locadora.Loja.Codigo }}">
                            <ul class="col-xs-11 pull-left">
                                <label for="retirada{{Locadora.Loja.Codigo }}">{{ Locadora.Loja.Nome }}</label>
                                <li>{{ Locadora.Endereco.Endereco }} </li>
                                <li><b>{{ Locadora.Endereco.Bairro }}</b></li>
                                <li>{{ Locadora.Endereco.Cidade }} - {{ Locadora.Endereco.UF }} - {{ Locadora.Endereco.Pais }}</li>
                                <li>Tipo de Serviço: {{ Locadora.Servico.Nome }}</li>
                            </ul>
                            <hr>
                        </div>
                        
                        <div class="media-heading group-item-title">
                            <h4 class="media-object">
                                Selecione a Loja de Devolucao do Veículo em 21-07-2014 às 10:00h
                            </h4>
                        </div>
                        <div style="color: red; width: 100%;">
                            <b>{{ erroDevolucao }}</b>
                        </div>
                        <div class="media-body group-item-body" ng-repeat="Locadora in LocadoraDevolucao">
                            <input class="pull-left" id="devolucao{{Locadora.Loja.Codigo }}" type="radio" name="devolucao"  value="{{Locadora.Loja.Codigo }}">
                            <ul class="col-xs-11 pull-left">
                                <label for="devolucao{{Locadora.Loja.Codigo }}">{{ Locadora.Loja.Nome }}</label>
                                <li>{{ Locadora.Endereco.Endereco }} </li>
                                <li><b>{{ Locadora.Endereco.Bairro }}</b></li>
                                <li>{{ Locadora.Endereco.Cidade }} - {{ Locadora.Endereco.UF }} - {{ Locadora.Endereco.Pais }}</li>
                                <li>Tipo de Serviço: {{ Locadora.Servico.Nome }}</li>
                            </ul>
                            <hr>
                        </div>
                        <div class="media-body group-item-actions">
                            <button class="btn btn-success pull-right" ng-click="clickmenu2()">Avançar</button>
                        </div>
                    </div>
                    <div class="media group-item" ng-show="menu2">
                        <div class="media-heading group-item-title">
                            <h4>
                                Selecione a Loja de Proteção Obrigatória
                            </h4>
                        </div>
                        <div style="color: red; width: 100%;">
                            <b>{{ erroProtecao }}</b>
                        </div>
                        <div class="media-body group-item-body" ng-repeat="prot in Protecao">
                            <input class="pull-left" id="protecao{{ prot.Codigo }}" type="radio"  name="protecao" value="{{ prot.Codigo }}">
                            <ul class="col-xs-11 pull-left">
                                <li><label for="protecao{{ prot.Codigo }}"><b> Protecao {{ prot.Nome }} </b></label></li>
                                <li class="warning"><b> Valor: R${{ prot.Valor }} / Dia</b> (total com taxas: R${{ prot.ValorTotal }})</li>
                                <li ng-repeat="it in prot.Itens">{{ it.Descricao }}</li>
                                <li><b>Valor caução exigido</b>: {{ prot.ValorCaucao }}</li>
                            </ul>
                            <hr>
                        </div>
                        <div class="media-body group-item-body small" ng-repeat="avisos in ProtecaoAvisos">
                            <ul class="col-xs-12">
                               <li><b>{{ avisos.Nome }}:</b> {{ avisos.Descricao }}</li>
                            </ul>
                        </div>
                        <div class="media-body group-item-actions">
                            <button class="btn btn-primary pull-left" ng-click="clickmenu1()">Voltar</button>
                            <button class="btn btn-success pull-right" ng-click="clickmenu3()">Avançar</button>
                        </div>
                    </div>
                    <div class="media group-item"  ng-show="menu3">
                        <div class="media-heading group-item-title">
                            <h4>
                                Serviços e Acessórios Opcionais
                            </h4>
                        </div>
                        <div class="media-body group-item-body" ng-repeat="opc in Opcional">
                            <input  class="pull-left" id="opc{{ opc.Codigo }}" type="checkbox" name="opcional[]" value="{{ opc.Codigo }}">
                            <ul class="col-xs-11 pull-left">
                                <label for="opc{{ opc.Codigo }}">{{ opc.Nome }}</label>
                                <li class="warning"><b> Valor: R${{ opc.Valor }} / Dia</b> (total com taxas: R${{ opc.ValorTotal }})</li>
                                <li>{{ opc.Descricao }}</li>
                            </ul>
                            <hr>
                        </div>
                        <div class="media-body group-item-body small" ng-repeat="avisos in OpcionalAvisos">
                            <ul class="col-xs-12">
                               <li><b>{{ avisos.Nome }}:</b> {{ avisos.Descricao }}</li>
                            </ul>
                        </div>
                        <div class="media-body group-item-actions">
                            <button class="btn btn-primary pull-left" ng-click="clickmenu2()">Voltar</button>
                            <button type="submit" class="btn btn-success pull-right" ng-click="submit()">Concluir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
