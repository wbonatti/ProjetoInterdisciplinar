<div class="container">
    <div class="row">
        <div class="span12">      		
            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Visualizar Turma</h3>
                </div> <!-- /widget-header -->
                
                <div class="widget-content">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div class="tab-pane active" id="formcontrols">
                                <div id="edit-profile" class="form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label">Nome:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['nome'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Turno:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['turno'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <a class="btn btn-primary" href='/administracao'>Voltar</a>
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