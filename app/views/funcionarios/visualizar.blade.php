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
                                            {{Form::label('nome','Nome:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['nome'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('sobrenome','Sobrenome:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['sobrenome']; }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('nascimento','Data de nascimento:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['datanascimento'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('cpf','CPF:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['cpf'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('rg','RG:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['rg'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('salario','Salário:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['salario'] }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('funcao','Função:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                <p>{{ $dados['funcao'] }}</p>
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