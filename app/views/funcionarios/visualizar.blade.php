<div class="container">

    <div class="row">

        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Novo Funcionário</h3>
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
                                            <label class="control-label">Sobrenome:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['sobrenome']; }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Data de nascimento:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['datanascimento'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">CPF:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['cpf'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">RG:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['rg'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Salário:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['salario'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Função:</label>
                                            <div class="controls">
                                                <p class="control-p">{{ $dados['funcao'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <a class="btn btn-primary" href='/funcionarios'>Voltar</a>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
</div>