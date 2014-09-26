
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <!-- /span6 -->
                <div class="span6">
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
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                            </div>
                        </div>
                    </div>
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
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                            </div>
                        </div>
                    </div>
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
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-credit-card"></i>
                                    <span class="shortcut-label">Registrar Pagamento de Salário</span> 
                                </a>
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-money"></i>
                                    <span class="shortcut-label">Registrar Pagamento de Mensalidade</span> 
                                </a>
                            <hr>
                                <h4> Mês de Fevereiro </h4>
                                <br>
                            </div>
                            <div class="area-chart">
                                <canvas id="area-chart" class="chart-holder"  width="400" height="200" style="margin: 0 -100px;"> </canvas>
                            </div>
                            <!-- /area-chart -->
                            <p class="text-success"><i class="icon-adjust"></i> <b>Pagamento pago:</b> x (x%)</p>
                            <p class="text-success"><i class="icon-adjust"></i> <b>Pagamento em atraso:</b> x (x%)</p>
                            <p class="text-info"><i class="icon-adjust"></i> <b>Mensalidade paga:</b> x (x%)</p>
                            <p class="text-danger"><i class="icon-adjust"></i> <b>Mensalidade em atraso:</b> x (x%)</p>
                            <p><b>Saldo efetuado:</b> x</p>
                            <p><b>Saldo previsto:</b> x</p>
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
				    value: 20,
				    color: "#7eb216",
                                    highlight: "#A0D438",
                                    label: 'Pagamento pago'
				},
				{
				    value: 20,
				    color: "#4eb2d5",
                                    highlight: "#70D4F7",
                                    label: 'Pagamento em atraso'
				},
				{
				    value: 20,
				    color: "#db3325",
                                    highlight: "#FD5547",
                                    label: 'Mensalidade paga'
				},
				{
				    value: 40,
				    color: "#db3325",
                                    highlight: "#FD5547",
                                    label: 'Mensalidade em atraso'
				}
			];

    var EstatisticaPessoa = new Chart(document.getElementById("area-chart").getContext("2d")).Pie(graficoData);
</script>
