<div class="container">

    <div class="row">

        <div class="span12">      		

            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Alterar Categoria</h3>
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
                                            Categoria alterada com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao alterar a categoria.
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
                                            <hr>
                                            <h4>Permissões</h4>
                                            <hr>
                                            <div class="control-group">
                                                <label class="">Funcionários</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="funcionario1">
                                                        {{Form::checkbox('funcionarioC', 1, $dados['funcionario'][0], ['id'=>'funcionario1'])}} Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcionario2">
                                                        {{Form::checkbox('funcionarioE', 1, $dados['funcionario'][1], ['id'=>'funcionario2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcionario3">
                                                        {{Form::checkbox('funcionarioD', 1, $dados['funcionario'][2], ['id'=>'funcionario3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcionario4">
                                                        {{Form::checkbox('funcionarioV', 1, $dados['funcionario'][3], ['id'=>'funcionario4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Função</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="funcao1">
                                                        {{Form::checkbox('funcaoC', 1, $dados['funcao'][0], ['id'=>'funcao1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcao2">
                                                        {{Form::checkbox('funcaoE', 1, $dados['funcao'][1], ['id'=>'funcao2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcao3">
                                                        {{Form::checkbox('funcaoD', 1, $dados['funcao'][2], ['id'=>'funcao3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="funcao4">
                                                        {{Form::checkbox('funcaoV', 1, $dados['funcao'][3], ['id'=>'funcao4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Alunos</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="aluno1">
                                                        {{Form::checkbox('alunoC', 1, $dados['aluno'][0], ['id'=>'aluno1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="aluno2">
                                                        {{Form::checkbox('alunoE', 1, $dados['aluno'][1], ['id'=>'aluno2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="aluno3">
                                                        {{Form::checkbox('alunoD', 1, $dados['aluno'][2], ['id'=>'aluno3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="aluno4">
                                                        {{Form::checkbox('alunoV', 1, $dados['aluno'][3], ['id'=>'aluno4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Notas</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="nota1">
                                                        {{Form::checkbox('notaC', 1, $dados['nota'][0], ['id'=>'nota1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="nota2">
                                                        {{Form::checkbox('notaE', 1, $dados['nota'][1], ['id'=>'nota2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="nota3">
                                                        {{Form::checkbox('notaD', 1, $dados['nota'][2], ['id'=>'nota3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="nota4">
                                                        {{Form::checkbox('notaV', 1, $dados['nota'][3], ['id'=>'nota4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Turmas</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="turma1">
                                                        {{Form::checkbox('turmaC', 1, $dados['turma'][0], ['id'=>'turma1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="turma2">
                                                        {{Form::checkbox('turmaE', 1, $dados['turma'][1], ['id'=>'turma2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="turma3">
                                                        {{Form::checkbox('turmaD', 1, $dados['turma'][2], ['id'=>'turma3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="turma4">
                                                        {{Form::checkbox('turmaV', 1, $dados['turma'][3], ['id'=>'turma4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Disciplinas</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="disciplina1">
                                                        {{Form::checkbox('disciplinaC', 1, $dados['disciplina'][0], ['id'=>'disciplina1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="disciplina2">
                                                        {{Form::checkbox('disciplinaE', 1, $dados['disciplina'][1], ['id'=>'disciplina2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="disciplina3">
                                                        {{Form::checkbox('disciplinaD', 1, $dados['disciplina'][2], ['id'=>'disciplina3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="disciplina4">
                                                        {{Form::checkbox('disciplinaV', 1, $dados['disciplina'][3], ['id'=>'disciplina4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Mensalidades</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="mensalidade1">
                                                        {{Form::checkbox('mensalidadeC', 1, $dados['mensalidade'][0], ['id'=>'mensalidade1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="mensalidade3">
                                                        {{Form::checkbox('mensalidadeD', 1, $dados['mensalidade'][2], ['id'=>'mensalidade3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="mensalidade4">
                                                        {{Form::checkbox('mensalidadeV', 1, $dados['mensalidade'][3], ['id'=>'mensalidade4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Salários</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="salario1">
                                                        {{Form::checkbox('salarioC', 1, $dados['salario'][0], ['id'=>'salario1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="salario3">
                                                        {{Form::checkbox('salarioD', 1, $dados['salario'][2], ['id'=>'salario3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="salario4">
                                                        {{Form::checkbox('salarioV', 1, $dados['salario'][3], ['id'=>'salario4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Usuários</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="usuario1">
                                                        {{Form::checkbox('usuarioC', 1, $dados['usuario'][0], ['id'=>'usuario1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="usuario2">
                                                        {{Form::checkbox('usuarioE', 1, $dados['usuario'][1], ['id'=>'usuario2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="usuario3">
                                                        {{Form::checkbox('usuarioD', 1, $dados['usuario'][2], ['id'=>'usuario3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="usuario4">
                                                        {{Form::checkbox('usuarioV', 1, $dados['usuario'][3], ['id'=>'usuario4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Categorias</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="categoria1">
                                                        {{Form::checkbox('categoriaC', 1, $dados['categoria'][0], ['id'=>'categoria1'])}}  Criar
                                                    </label>
                                                    <label class="checkbox-inline" for="categoria2">
                                                        {{Form::checkbox('categoriaE', 1, $dados['categoria'][1], ['id'=>'categoria2'])}} Editar
                                                    </label>
                                                    <label class="checkbox-inline" for="categoria3">
                                                        {{Form::checkbox('categoriaD', 1, $dados['categoria'][2], ['id'=>'categoria3'])}} Deletar
                                                    </label>
                                                    <label class="checkbox-inline" for="categoria4">
                                                        {{Form::checkbox('categoriaV', 1, $dados['categoria'][3], ['id'=>'categoria4'])}} Visualizar
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                            <div class="control-group">
                                                <label class="">Registros</label>
                                                <div class="controls">
                                                    <label class="checkbox-inline" for="registro">
                                                        {{Form::checkbox('registro', 1, $dados['registro'], ['id'=>'registro'])}} Visualizar Tudo
                                                    </label>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <hr>
                                            
                                        </div>
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
    