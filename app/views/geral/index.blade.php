
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
                                <a href="javascript:;" class="btn btn-small btn-success adjust-footer-btn">Ver todos</a>
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
                                                <td> {{ $aniversariante->nome }} {{ $aniversariante->sobrenome }}</td>
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
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-signal"></i>
                            <h3>Pessoas Cadastradas </h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <canvas id="area-chart" class="chart-holder" height="250" width="538" style="width: 100% !important; height: auto !important; margin: 0 auto;"> </canvas>
                            <!-- /area-chart --> 
                            <hr>
                            <p class="text-danger"><a class="btn btn-danger"></a> <b>Alunos:</b> {{$numeroAluno}} ({{$numeroPessoa / $numeroAluno * 10}}%)</p>
                            <p class="text-success"><a class="btn btn-success"></a> <b>Funcionários:</b> {{$numeroFuncionario}} ({{$numeroPessoa / $numeroFuncionario * 10}}%)</p>
                            <p class="text-info"><a class="btn btn-info"></a> <b>Outros:</b> {{$numeroOutro}} ({{$numeroPessoa / $numeroOutro * 10}}%) </p>
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

<script>
    var graficoData = [
				{
				    value: {{$numeroPessoa / $numeroAluno * 10}},
				    color: "#db3325"
				},
				{
				    value: {{$numeroPessoa / $numeroFuncionario * 10}},
				    color: "#7eb216"
				},
				{
				    value: {{$numeroPessoa / $numeroOutro * 10}},
				    color: "#4eb2d5"
				}
			];

    var EstatisticaPessoa = new Chart(document.getElementById("area-chart").getContext("2d")).Doughnut(graficoData);

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true // make the event "stick"
                            );
                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d + 5),
                    end: new Date(y, m, d + 7)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false
                },
                {
                    title: 'EGrappler.com',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://EGrappler.com/'
                }
            ]
        });
    });
</script><!-- /Calendar -->
