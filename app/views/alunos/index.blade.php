<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                @if(Autenticacao::pagepermissao(['nota','aluno']))
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Alunos</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Responsável </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alunos as $a)
                                        <tr>
                                            <td data-title='#'>{{$a->id}}</td>
                                            <td data-title='Nome'>{{$a->pessoa->nome.' '.$a->pessoa->sobrenome}}</td>
                                            <td data-title='Responsável'>
                                                @if($a->responsavel != null)
                                                    {{$a->responsavel->pessoa->nome}}
                                                @else
                                                    <i class="text-danger">Não possuí responsável cadastrado</i>
                                                @endif
                                            </td>
                                            <td data-title='Ações' class="action-buttons">
                                                
                                                @if(Autenticacao::permissao('aluno','ler'))
                                                    <a href="/alunos/visualizar/{{$a->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                                @endif
                                                @if(Autenticacao::permissao('aluno','atualizar'))
                                                    <a href="/alunos/alterar/{{$a->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                                @endif
                                                @if(Autenticacao::permissao('aluno','excluir'))
                                                    <a href="/alunos/deletar/{{$a->id}}" onclick="return confirm('Tem certeza que quer excluir esse item?');" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                                @endif
                                            </td>
                                            <td class="action-buttons">
                                                @if(Autenticacao::pagepermissao(['nota']))
                                                    <a href="/alunos/notas/{{$a->id}}" class="btn btn-info btn-small" title="Notas"><i class="btn-icon-only icon-list"> </i> <span>Notas</span></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                @if(Autenticacao::permissao('aluno','criar'))
                                    <a href="/alunos/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Novo Aluno"><i class="btn-icon-only icon-plus"> </i> Novo Aluno</a>
                                @endif
                                {{$alunos->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
