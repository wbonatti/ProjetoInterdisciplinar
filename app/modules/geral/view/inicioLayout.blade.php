<script>
    $(document).ready(function(){
        var options = new Array();
        options['language'] = 'pt-BR';
        var data1 = $('#data1').datepicker(options).on('changeDate', function() {
            data1.hide();
            $('#data2')[0].focus();
        }).data('datepicker');
        var data2 = $('#data2').datepicker(options).on('changeDate', function() {
            data2.hide();
        }).data('datepicker');
    });
        
        
    function filterdate()
    {
        var d1 = $("#data1").val();
        var d2 = $("#data2").val();
        if(d1 === '' && d2 === '') $("#filterdateerror").html('  Informe data inicial e/ou final.');
        else window.location.href = "/comissoes/"+d1+"/"+d2+"/";
    }
</script>
<article class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Meus Dados</div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4" class="border-right text-center">Reserva</th>
                    <th colspan="3" class="border-right text-center">Comissão prevista para a Mobicar</th>
                    <th colspan="1" class="border-right text-center">Comissão recebida Mobicar</th>
                    <th colspan="3" class="text-center">Comissão Afiliado</th>
                </tr>
                <tr>
                    <th>Código</th>
                    <th>Destino</th>
                    <th>Data Solicitação</th>
                    <th class="border-right">Data Devolução</th>
                    <th>Comissão Total</th>
                    <th>Comissão %</th>
                    <th class="border-right">Valor do Afiliado</th>
                    <th class="border-right">Comissão Total</th>
                    <th>Valor do Afiliado</th>
                    <th>Comissão ja Paga</th>
                    <th>Saldo a Pagar</th>
                </tr>
            </thead>
            <tbody>
                @yield('listacomissoes')
            </tbody>
        </table>
    </div>
    <div class="col-xs-12">
        <div class="pull-right">
            @yield('pagination')
        </div>
    </div>
</article>
