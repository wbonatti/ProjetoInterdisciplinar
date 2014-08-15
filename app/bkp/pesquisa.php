<div>
    <div class="navbar navbar-default" ng-show="loading">
        <div class="collapse navbar-collapse">
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <h4><img height="32" width="32" src="http://www.rentcars.com.br/imagens/theme/loader/32x32d.gif"> Aguarde, estamos consultando os melhores preços para sua pesquisa.</h4>
          </div>
        </div>
    </div>
    <div class="row" ng-hide="loading"  >
       <div class="row">
            <div class="col-md-6 col-md-offset-3 text-right">
                <b>{{ numero_carros }}</b> Opções de Carros
            </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" ng-repeat="carro in carros">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 panel-title"><b>{{ carro.Grupo.Similares }}</b></div>
                        <div class="col-md-6 text-uppercase text-right"><small>categoria {{ carro.Grupo.Categoria.Nome }}</small></div>
                    </div>
                </div>
                <ul class="list-group" >
                    <li class="list-group-item" style="padding: 5px;">
                        <img title="carro.Locadora.Retirada.Bandeira.Nome" src="http://www.rentcars.com.br/{{ carro.Locadora.Retirada.Bandeira.LogoMarca }}" style="width: 70px; height: 30px;" class="media-object">
                    </li>
                </ul>
                <div class="row panel-body">
                    <div class="col-md-3 media">
                        <img style="width: 100%;" title="{{ carro.Grupo.Categoria.Nome }}" src="http://www.rentcars.com.br/{{ carro.Grupo.Imagem }}">
                    </div>
                    <div class="col-md-6">
                        <b class="col-md-12">Categoria {{ carro.Grupo.Categoria.Nome }} / Grupo {{ carro.Grupo.Nome }} </b>
                        <li class="col-md-6" style="list-style: none;" ng-repeat="configuracoes in carro.Grupo.Configuracao">
                                {{ configuracoes.Nome }}:
                            <span class="label label-default pull-right">{{ configuracoes.Valor }}</span>
                        </li>
                    </div>
                    <div class="col-md-3">
                      <h3>R${{ carro.Valor.Plano.ValorDia }}<span>/dia</span></h3>
                      <div class="text-danger">Total R${{ carro.Valor.Total.ValorTotal }} c/ taxas</div>
                      <small ng-if="carro.Pagamento.Parcelamento.Descricao != 'Parcelamento indisponível'">ou {{ carro.Pagamento.Parcelamento.Descricao }} de R${{ carro.Pagamento.Parcelamento.Parcela }}</small>
                      <a class="btn btn-default btn-wide btn-lg col-xs-8 col-xs-offset-2 " href="{{ VISUALIZAURL }}{{ carro.URL }}">ALUGAR</a>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
</div>
