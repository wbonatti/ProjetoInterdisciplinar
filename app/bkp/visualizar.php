<div class="row">
    <div class="navbar navbar-default" ng-show="loading">
        <div class="collapse navbar-collapse">
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <h4><img height="32" width="32" src="http://www.rentcars.com.br/imagens/theme/loader/32x32d.gif"> Aguarde, estamos consultando os melhores preços para sua pesquisa.</h4>
          </div>
        </div>
    </div>
    
    <div class="row" ng-hide="loading">
        <div class="col-md-6 col-md-offset-3">
            <div class="row jumbotron option-select" style="padding-top: 20px; padding-bottom: 20px;">
                <div class="col-xs-3">
                    <img src="http://www.rentcars.com.br/{{ carro.Grupo.Imagem }}" title="{{ carro.Grupo.Similares }}">
                </div>
                <div class="col-xs-5">
                    <h2>{{ carro.Grupo.Similares }}</h2>
                    <p>Categoria {{ carro.Grupo.Categoria.Nome }}</p>
                    <p>Grupo {{ carro.Grupo.Nome }}</p>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="warning small">R${{ carro.Valor.Plano.ValorDia }}/dia</div>
                    <h2 style="margin-top: 0; margin-bottom: 0;">Valor Total R${{ carro.Valor.Total.ValorTotal }}</h2>
                    <div class="parcelamento">ou {{ carro.Pagamento.Parcelamento.Descricao }} de R${{ carro.Pagamento.Parcelamento.Parcela }} no cartão</div>		        
                    <br>
                    <a href="/#/opcoes/{{ carro.URL }}" class="btn btn-success">Solicitar Reserva</a> 
                </div>  
            </div>
            <div class="row option-select navbar navbar-default height-30 rm-margin-bottom">
                <ul class="nav navbar-nav col-xs-12">
                    <li class="col-xs-3 text-center"><a class="padding-refix" href="#Locadora">Locadora</a></li>
                    <li class="col-xs-3 text-center"><a class="padding-refix" href="#Caracteristicas">Características</a></li>
                    <li class="col-xs-3 text-center"><a class="padding-refix" href="#Valores">Valores e Taxas</a></li>
                    <li class="col-xs-3 text-center"><a class="padding-refix" href="#Requisitos">Requisitos para Alugar</a></li>
                </ul>
            </div>
            <div class="row option-select no-border jumbotron">
                <div class="col-xs-12">
                    <h3>Locadora {{ carro.Locadora.Retirada.Bandeira.Nome }}</h3>
                    <hr class="minhr yellow">
                    <h4>Alugue seu carro hoje com a {{ carro.Locadora.Retirada.Bandeira.Nome }} e garanta os melhores descontos e benefícios</h4>
                    <hr>
                    <div class="row rm-margin-left">
                        <div class="col-xs-3 rm-padding-left">
                            <img src="http://www.rentcars.com.br/{{ carro.Locadora.Retirada.Bandeira.LogoMarca }}" title="Hertz Rent a Car" class="pull-left">
                        </div>
                        <ul class="col-xs-9 ul-no-style">
                            <li class="col-xs-6 list-no-style" ng-repeat="dif in carro.Diferencial">- {{ dif.Nome }}</li>
                        </ul>
                    </div>
                    <hr class="bolderhr yellow">
                </div>
            </div>
            <div class="row option-select no-border jumbotron"  id="Caracteristicas">
                <div class="col-xs-12">
                    <h3>Características do Grupo</h3>
                    <hr class="minhr yellow">
                    <hr>
                    <div class="row rm-margin-left">
                        <div class="col-xs-3 rm-padding-left">
                            <img src="http://www.rentcars.com.br/{{ carro.Grupo.Imagem }}" title="{{ carro.Grupo.Similares }}">
                        </div>
                        <ul class="col-xs-9 ul-no-style">
                            <li class="col-xs-12 list-no-style" ng-repeat="configuracoes in carro.Grupo.Configuracao">
                                {{ configuracoes.Valor }}
                                <span class="label label-default pull-right">{{ configuracoes.Nome }}</span>
                            </li>
                        </ul>
                    </div>
                    <hr class="bolderhr yellow">
                </div>
            </div>
            <div class="row option-select no-border jumbotron"  id="Valores">
                <div class="col-xs-12">
                    <h3>Valores e Taxas</h3>
                    <hr class="minhr yellow">
                    <h4>Valores da sua Reserva</h4>
                    <hr>
                    <div class="row rm-margin-left">
                        <ul class="col-xs-12 ul-no-style rm-margin-left">
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Tipo de Tarifa
                                <span class="pull-right">{{ carro.Valor.Tarifa.Nome }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Total de Diárias
                                <span class="pull-right">{{ itinerario.Diarias }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Total de Horas Excedentes
                                <span class="pull-right">{{ itinerario.HorasExcedentes }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Valor das Diárias
                                <span class="pull-right">R${{ carro.Valor.Veiculo.ValorDia }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Proteção Obrigatória
                                <span class="pull-right">R${{carro.Valor.Protecao.ValorDia }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left" ng-repeat="taxas in carro.Valor.Taxas.Item">
                                {{ taxas.Nome }}
                                <span class="pull-right">R${{ taxas.Valor }}</span>
                            </li>
                            <li class="col-xs-12 list-no-style rm-padding-left">
                                Valor Total
                                <span class="pull-right">R${{ carro.Valor.Total.ValorTotal }}</span>
                            </li>
                        </ul>
                        <ul class="col-xs-12 ul-no-style rm-margin-left">
                            <li class="list-no-style rm-padding-left"><b>Valor Caução de Garantia:</b>{{ carro.Valor.Protecao.ValorCaucao }}</li>
                            <li class="list-no-style rm-padding-left"><b>Parcelamento:</b> até {{ carro.Pagamento.Parcelamento.Descricao }} de R${{ carro.Pagamento.Parcelamento.Parcela }}</li>
                            <li class="list-no-style rm-padding-left"><b>Forma de Pagamento:</b> {{ carro.Pagamento.Parcelamento.Bandeira }}</li>
                        </ul>
                    </div>
                    <hr class="bolderhr yellow">
                </div>
                <div class="col-xs-12">
                    <h3>Valores e Taxas</h3>
                    <hr class="minhr yellow">
                    <h4>Valores da sua Reserva</h4>
                    <hr>
                    <div class="row">
                        <ul class="col-xs-12 ul-no-style">
                            <li class="col-xs-12 list-no-style rm-padding-left" ng-repeat="req in requisitos">
                                <br>
                                <h4 class="rm-margin-bottom rm-padding-bottom">{{ req.Nome }}</h4>
                                <hr class="margin-low">
                                {{ req.Descricao }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
