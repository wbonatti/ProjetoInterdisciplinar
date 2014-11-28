<div class="container">

    <div class="row">

        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Sua Conta</h3>
                </div> <!-- /widget-header -->
                
                <div class="widget-content">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div class="tab-pane active" id="formcontrols">
                                <div id="edit-profile" class="form-horizontal">
                                
                                @if(isset($success))
                                    @if($success)
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Sucesso!</h4>
                                            Alterações efetuadas com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao atualizar seus dados.
                                        </div>
                                    @endif
                                @endif
                                    
                                {{ Form::open() }}
                                    <fieldset>
                                        <div class="control-group">
                                            {{Form::label('email','E-mail:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('email',$dados['email'], ['autocomplete'=>'off', 'class'=>'span6 disabled', 'disabled'=>'disabled'])}}
                                                <p class="help-block">O email é para login e não pode ser alterado.</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('cpf','CPF:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('cpf',$dados['cpf'], ['autocomplete'=>'off', 'class'=>'span6 disabled', 'disabled'=>'disabled'])}}
                                                <p class="help-block">Seu cpf não pode ser alterado.</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('rg','RG:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('rg',$dados['rg'], ['autocomplete'=>'off', 'class'=>'span6 disabled', 'disabled'=>'disabled'])}}
                                                <p class="help-block">Seu rg não pode ser alterado.</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('nome','Nome:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('nome',$dados['nome'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('nome'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('sobrenome','Sobrenome:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('sobrenome',$dados['sobrenome'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('sobrenome'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('datanascimento','Data de nascimento:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('datanascimento',$dados['datanascimento'], ['autocomplete'=>'off', 'class'=>'span4'])}}
                                                <p class="text-danger">{{ $errors->first('datanascimento'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('salario','Salário:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('salario',$dados['salario'], ['autocomplete'=>'off', 'class'=>'span6 disabled', 'disabled'=>'disabled'])}}
                                                <p class="help-block">Seu salário não pode ser alterado.</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->


                                        <br>

                                        <div class="control-group">											
                                            <label class="control-label" for="senha">Senha</label>
                                            <div class="controls">
                                                <input type="password" class="span4" id="senha" name="senha" value=""  placeholder="Informe sua senha">
                                                <p class="text-danger">
                                                    @if(isset($senha) && !$senha)
                                                        Senha inválida.
                                                    @else
                                                        {{ $errors->first('senha'); }}
                                                    @endif
                                                </p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <button type="submit" class="btn btn-primary">Salvar</button> 
                                            <a class="btn" href='/'>Voltar</a>
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