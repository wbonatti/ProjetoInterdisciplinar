
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                @if(Autenticacao::pagepermissao(['turma']))
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Turmas</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Disciplinas </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turmas as $t)
                                    <tr>
                                        <td>{{$t->id}}</td>
                                        <td>{{$t->nome}}</td>
                                        <td>{{count($t->disciplinas)}}</td>
                                        <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('turma','ler'))
                                            <a href="/turma/visualizar/{{$t->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('turma','atualizar'))
                                            <a href="/turma/alterar/{{$t->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('turma','excluir'))
                                            <a href="/turma/deletar/{{$t->id}}" onclick="return confirm('Tem certeza que quer excluir esse item?');" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="widget-header text-right">
                                @if(Autenticacao::permissao('turma','criar'))
                                    <a href="/turma/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Nova Turma"><i class="btn-icon-only icon-plus"> </i> Nova Turma</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @if(Autenticacao::pagepermissao(['disciplina']))
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Disciplinas</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Alunos </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($disciplinas as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->nome}}</td>
                                        <td>{{count($d->alunos)}}</td>
                                        <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('disciplina','ler'))
                                            <a href="/disciplina/visualizar/{{$d->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('disciplina','atualizar'))
                                            <a href="/disciplina/alterar/{{$d->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('disciplina','excluir'))
                                            <a href="/disciplina/deletar/{{$d->id}}" onclick="return confirm('Tem certeza que quer excluir esse item?');" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                @if(Autenticacao::permissao('disciplina','criar'))
                                    <a href="/disciplina/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Nova Disciplina"><i class="btn-icon-only icon-plus"> </i> Nova Disciplina</a>
                                @endif
                                {{$disciplinas->links()}}
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
