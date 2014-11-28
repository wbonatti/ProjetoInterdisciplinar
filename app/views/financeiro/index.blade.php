
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <!-- /span6 -->
                <div class="span6">
                @if(Autenticacao::pagepermissao(['mensalidade']))
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Últimos Recebimentos</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> De </th>
                                        <th> Valor </th>
                                        <th> Data </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mensalidades as $p)
                                        <tr>
                                            <td data-title='#'>{{$p->id}}</td>
                                            <td data-title='Para'>{{Aluno::find($p->aluno_id)->pessoa->nome;}}</td>
                                            <td data-title='Valor'>{{'R$' . number_format($p->valor, 2, ',', '.')}}</td>
                                            <td data-title='Data'>{{$p->formatDateTime('data','d/m/Y')}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('mensalidade','ler'))
                                                <a href="/financeiro/mensalidade/visualizar/{{$p->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif  
                                            @if(Autenticacao::permissao('mensalidade','excluir'))
                                                <a href="/financeiro/mensalidade/deletar/{{$p->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                <?php Paginator::setPageName('page_b');
                                echo $mensalidades->appends('page_a', Input::get('page_a',1))->links(); ?>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Autenticacao::pagepermissao(['salario']))
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Últimos Pagamentos</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Para </th>
                                        <th> Valor </th>
                                        <th> Data </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pagamentos as $p)
                                        <tr>
                                            <td data-title='#'>{{$p->id}}</td>
                                            <td data-title='Para'>{{Funcionario::find($p->funcionario_id)->pessoa->nome;}}</td>
                                            <td data-title='Valor'>{{'R$' . number_format($p->valor, 2, ',', '.')}}</td>
                                            <td data-title='Data'>{{$p->formatDateTime('data','d/m/Y')}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('salario','ler'))
                                                <a href="/financeiro/salario/visualizar/{{$p->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif 
                                            @if(Autenticacao::permissao('salario','excluir'))
                                                <a href="/financeiro/salario/deletar/{{$p->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                <?php Paginator::setPageName('page_a');
                                echo $pagamentos->appends('page_b', Input::get('page_b',1))->links(); ?>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-money"></i>
                            <h3>Financeiro </h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="shortcuts">
                                @if(Autenticacao::permissao('salario','criar'))
                                <a href="/financeiro/salario/novo/" class="shortcut">
                                    <i class="shortcut-icon icon-credit-card"></i>
                                    <span class="shortcut-label">Registrar Pagamento de Salário</span> 
                                </a>
                                @endif
                                @if(Autenticacao::permissao('mensalidade','criar'))
                                <a href="/financeiro/mensalidade/novo/" class="shortcut">
                                    <i class="shortcut-icon icon-money"></i>
                                    <span class="shortcut-label">Registrar Pagamento de Mensalidade</span> 
                                </a>
                                @endif
                            <hr>
                            </div>
                            <div class="area-chart">
                                <canvas id="area-chart" class="chart-holder"  width="400" height="200" style="margin: 0 -100px;"> </canvas>
                            </div>
                            <!-- /area-chart -->
                            <p class="text-success"><i class="icon-adjust"></i> <b>Total Mensalidades:</b> {{'R$' . number_format($totalmensalidades, 2, ',', '.')}}</p>
                            <p class="text-danger"><i class="icon-adjust"></i> <b>Total Pagamentos:</b> {{'R$' . number_format($totalpagamentos, 2, ',', '.')}}</p>
                            <p><b>Saldo:</b> {{'R$' . number_format($saldo, 2, ',', '.')}}</p>
                        </div>
                        <!-- /widget-content --> 
                    </div>
                </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
    

<script type="text/javascript">
    var graficoData = [
				{
				    value: {{$totalmensalidades}},
				    color: "#7eb216",
                                    highlight: "#A0D438",
                                    label: 'Total Pagamentos'
				},
				{
				    value: {{$totalpagamentos}},
				    color: "#db3325",
                                    highlight: "#FD5547",
                                    label: 'Total Mensalidades'
				}
			];

    var EstatisticaPessoa = new Chart(document.getElementById("area-chart").getContext("2d")).Pie(graficoData);
</script>
