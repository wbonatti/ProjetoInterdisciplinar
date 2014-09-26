<div class="container">

    <div class="row">

        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Dados Aluno</h3>
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
                                        
                                        @if($dados['temresponsavel'] == '1')
                                            <hr>
                                            <div class="control-group">
                                                <h3>Responsável</h3>				
                                            </div> <!-- /control-group -->
                                            <div class="control-group">
                                                <label class="control-label">Nome:</label>
                                                <div class="controls">
                                                    <p class="control-p">{{ $dados['nomeresponsavel'] }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->

                                            <div class="control-group">
                                                <label class="control-label">Sobrenome:</label>
                                                <div class="controls">
                                                    <p class="control-p">{{ $dados['sobrenomeresponsavel']; }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->

                                            <div class="control-group">
                                                <label class="control-label">Data de nascimento:</label>
                                                <div class="controls">
                                                    <p class="control-p">{{ $dados['datanascimentoresponsavel'] }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                        @endif
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <a class="btn btn-primary" href='/alunos'>Voltar</a>
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