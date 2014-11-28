<div class="container">
    <div class="row">
        <div class="span12">      		
            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Alterar Usuario</h3>
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
                                            Usuário alterado com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao alterar usuário.
                                        </div>
                                    @endif
                                @endif
                                {{ Form::open() }}
                                    <fieldset>
                                        
                                        <div class="control-group">
                                            {{Form::label('funcionario','Funcionario:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::select('funcionario',$funcionario, $dados['funcionario'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('funcionario'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('categoria','Categoria:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::select('categoria',$categoria, $dados['categoria'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('categoria'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('email','Email:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('email',$dados['email'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('email'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <button type="submit" class="btn btn-primary">Alterar</button> 
                                            <a class="btn" href='/usuarios'>Voltar</a>
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