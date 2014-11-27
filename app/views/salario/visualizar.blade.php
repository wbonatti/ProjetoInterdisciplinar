<div class="container">
    <div class="row">
        <div class="span12">      		
            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Visualizar Salário Pago</h3>
                </div> <!-- /widget-header -->
                
                <div class="widget-content">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div class="tab-pane active" id="formcontrols">
                                <div id="edit-profile" class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label">Funcionário:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['nome'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Valor:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['valor'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Data:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $dados['data'])->format('d/m/Y H:i:s') }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <a class="btn btn-primary" href='/financeiro'>Voltar</a>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
</div>