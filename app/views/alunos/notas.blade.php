<div class="container">

    <div class="row">

        @if(Autenticacao::pagepermissao(['nota']))
        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Notas</h3>
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
                                            Notas alteradas com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao alterar notas.
                                        </div>
                                    @endif
                                @endif
                                
                                @if(count($disciplinas)<1)
                                        <div class="alert alert-warning alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Não existe nenhuma disciplina vinculada a esse usuário!<br><br>
                                            <a class="btn" href='/alunos'>Voltar</a>
                                        </div>
                                @else
                                {{ Form::open() }}
                                    @if(Autenticacao::permissao('nota','criar'))
                                    <fieldset>

                                        <div class="control-group">
                                            {{Form::label('disciplina','Disciplina:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::select('disciplina',$disciplinas,'', ['autocomplete'=>'off', 'class'=>'span4'])}}
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('descricao','Descrição:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::textarea('descricao',$dados['descricao'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('descricao'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            {{Form::label('valor','Nota:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::text('valor',$dados['valor'], ['autocomplete'=>'off', 'class'=>'span6 nota'])}}
                                                <p class="text-danger">{{ $errors->first('valor'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="form-actions" style="margin: 0 -15px;">
                                            <button type="submit" class="btn btn-primary">Salvar</button> 
                                            <a class="btn" href='/alunos'>Voltar</a>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                    @endif
                                    <div class="widget-content responsive-table">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Disciplina </th>
                                                    <th> Descricao </th>
                                                    <th> Valor </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($aluno->notas) < 1)
                                                <div class="alert alert-warning text-center">
                                                    Nenhuma nota cadastrada
                                                </div>
                                                @endif
                                                
                                                @foreach($aluno->notas as $n)
                                                <tr>
                                                    <td data-title='#'>
                                                        {{$n->id}}
                                                    </td>
                                                    <td data-title='Disciplina'>
                                                        {{$n->disciplina->nome}}
                                                    </td>
                                                    <td data-title='Descricao'>
                                                        {{$n->descricao}}
                                                    </td>
                                                    <td data-title='Valor'>
                                                        {{$n->valor}}
                                                    </td>
                                                    <td data-title='Ações'>
                                                        @if(Autenticacao::permissao('nota','excluir'))
                                                            <button class="btn btn-danger btn-small btn-show" onclick="return confirm('Tem certeza que quer excluir esse item?');" value="{{$n->id}}" name="deletar"><i class="btn-icon-only icon-remove"> </i></button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                {{ Form::close() }}
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
        @endif
    </div> <!-- /row -->
</div>
    