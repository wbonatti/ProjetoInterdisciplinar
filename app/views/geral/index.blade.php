
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Ultimos registros</h3>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> Descrição </th>
                                        <th> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $log)
                                        <?php $data = $log->getDateTime('data'); ?>
                                        <tr>
                                            <td> {{ $log->descricao }} </td>
                                            <td> {{ $data->format('d/m/Y H:i:s') }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                <a href="/registros" class="btn btn-small btn-success adjust-footer-btn">Ver todos</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-gift"></i>
                            <h3>Aniversariantes no mês</h3>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> Nome </th>
                                        <th> Dia </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $naotem = true ?>
                                    @foreach($aniversariantes as $aniversariante)
                                        @if($aniversariante->funcionario != null)
                                            <?php 
                                                $aniversario = $aniversariante->getDate('datanascimento'); 
                                                $naotem = false;
                                            ?>
                                            <tr>
                                                <td> {{ $aniversariante->nome.' '.$aniversariante->sobrenome }}</td>
                                                <td> {{ $aniversario->format('d'); }} </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @if($naotem)
                                        <tr>
                                            <td class="warning text-center" colspan="2"> Nenhum aniversáriante neste mês. </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    
                </div>
                <!-- /span6 --> 
                <div class="span6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-signal"></i>
                            <h3>Pessoas Cadastradas </h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="area-chart">
                                <canvas id="area-chart" class="chart-holder"  width="400" height="200" style="margin: 0 -100px;"> </canvas>
                            </div>
                            <!-- /area-chart --> 
                            <hr>
                            <p class="text-success"><i class="icon-adjust"></i> <b>Funcionários:</b> {{$numeroFuncionario}} ({{number_format($percentFuncionario, 2, '.', '')}}%)</p>
                            <p class="text-info"><i class="icon-adjust"></i> <b>Alunos:</b> {{$numeroAluno}} ({{number_format($percentAluno, 2, '.', '') }}%)</p>
                            <p class="text-danger"><i class="icon-adjust"></i> <b>Outros:</b> {{$numeroOutro}} ({{number_format($percentOutro, 2, '.', '')}}%) </p>
                            <p><b>Total:</b> {{$numeroPessoa}} pessoas cadastradas.</p>
                        </div>
                        <!-- /widget-content --> 
                    </div>
                    <!-- /widget -->
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
				    value: {{$numeroFuncionario}},
				    color: "#7eb216",
                                    highlight: "#A0D438",
                                    label: 'Funcionários'
				},
				{
				    value: {{$numeroAluno}},
				    color: "#4eb2d5",
                                    highlight: "#70D4F7",
                                    label: 'Alunos'
				},
				{
				    value: {{$numeroOutro}},
				    color: "#db3325",
                                    highlight: "#FD5547",
                                    label: 'Outros'
				}
			];

    var EstatisticaPessoa = new Chart(document.getElementById("area-chart").getContext("2d")).Doughnut(graficoData);
</script>
