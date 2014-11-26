<div class="container">

    <div class="row">

        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Novo Aluno</h3>
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
                                            Aluno cadastrado com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao cadastrar o aluno.
                                        </div>
                                    @endif
                                @endif
                                    
                                {{ Form::open() }}
                                    <fieldset>
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
                                        
                                        
                                         
                                    @if($dados['temresponsavel'] == '0')
                                        <div class="control-group" id="novoresponsavel">
                                    @else
                                        <div class="control-group hidden"  id="novoresponsavel">
                                    @endif
                                        
                                            <a href="javascript:;" class="btn pull-right"><i class="icon-large icon-plus-sign"> </i>&nbsp; Incluir Responsável</a> 			
                                        </div> <!-- /control-group -->
                                        
                                    @if($dados['temresponsavel'] == '1')
                                        <div id="responsavel"  class="control-group"> 
                                    @else
                                        <div id="responsavel"  class="control-group hidden">
                                    @endif 
                                            <hr>
                                            <div class="control-group">
                                                <h3>Responsável</h3>
                                                {{Form::hidden('temresponsavel',$dados['temresponsavel'])}}
                                            </div>
                                            <div class="control-group">
                                                {{Form::label('nomeresponsavel','Nome:', ['class'=>'control-label'])}}
                                                <div class="controls">
                                                    {{Form::text('nomeresponsavel',$dados['nomeresponsavel'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                    <p class="text-danger">{{ $errors->first('nomeresponsavel'); }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->

                                            <div class="control-group">
                                                {{Form::label('sobrenomeresponsavel','Sobrenome:', ['class'=>'control-label'])}}
                                                <div class="controls">
                                                    {{Form::text('sobrenomeresponsavel',$dados['sobrenomeresponsavel'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                    <p class="text-danger">{{ $errors->first('sobrenomeresponsavel'); }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->

                                            <div class="control-group">
                                                {{Form::label('datanascimentoresponsavel','Data de nascimento:', ['class'=>'control-label'])}}
                                                <div class="controls">
                                                    {{Form::text('datanascimentoresponsavel',$dados['datanascimentoresponsavel'], ['autocomplete'=>'off', 'class'=>'span4'])}}
                                                    <p class="text-danger">{{ $errors->first('datanascimentoresponsavel'); }}</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <div class="control-group" id="removeresponsavel">
                                                <a href="javascript:;" class="btn pull-right"><i class="icon-large icon-minus-sign"> </i>&nbsp; Remover Responsável</a> 			
                                            </div> <!-- /control-group -->
                                            
                                        </div>
                                        <div class="clear-footer"></div>
                                        <div class="control-group">
                                            <hr>
                                            <div class="control-group">
                                                <h3>Disciplinas</h3>
                                            </div>

                                            <div class="control-group">
                                                {{Form::label('selectDisciplina','Disciplina:', ['class'=>'control-label'])}}
                                                <div class="controls">
                                                    {{Form::select('selectDisciplina',$disciplinas,'', ['autocomplete'=>'off', 'class'=>'span4'])}}
                                                    <button name="novadisciplina" value="1" class="btn btn-primary"><i class="icon-large icon-plus-sign"> </i> Adicionar</button>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            @if(empty($arrdisciplinas) || count($arrdisciplinas) < 1)
                                                <div class="alert alert-warning">
                                                    Você não selecionou nenhuma disciplina
                                                </div>
                                            @else
                                                @foreach($arrdisciplinas as $disciplina)
                                                    <div class="control-group">
                                                        {{ $disciplina->id }}
                                                        {{ $disciplina->nome }}
                                                        @if(isset($disciplina->turma_id))
                                                            {{ $disciplina->turma->nome }}
                                                        @else
                                                            <span class="text-danger">Não vinculado a uma turma</span>
                                                        @endif
                                                        {{ $disciplina->valor }}
                                                        <input type="hidden" value="{{$disciplina->id}}" name="disciplinasvinculadas[]">
                                                        <button name="removerdisciplina" value="{{$disciplina->id}}" class="btn btn-danger"><i class="icon-large icon-minus-sign"> </i> Remover Disciplina</button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-actions footer-actions">
                                            <button type="submit" class="btn btn-primary">Salvar</button> 
                                            <a class="btn" href='/alunos'>Cancelar</a>
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
    