
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                @if(Autenticacao::pagepermissao(['funcao']))
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Funções</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Usuários </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($funcoes as $f)
                                        <tr>
                                            <td data-title='#'>{{$f->id}}</td>
                                            <td data-title='Nome'>{{$f->nome}}</td>
                                            <td data-title='Usuários'>{{count($f->funcionarios)}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('funcao','ler'))
                                                <a href="/funcao/visualizar/{{$f->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('funcao','atualizar'))
                                                <a href="/funcao/alterar/{{$f->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('funcao','excluir'))
                                                <a href="/funcao/deletar/{{$f->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                @if(Autenticacao::permissao('funcao','criar'))
                                    <a href="/funcao/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Nova Disciplina"><i class="btn-icon-only icon-plus"> </i> Nova Função</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(Autenticacao::pagepermissao(['funcionario']))
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Funcionários</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Função </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($funcionarios as $f)
                                        <tr>
                                            <td data-title='#'>{{$f->id}}</td>
                                            <td data-title='Nome'>{{$f->pessoa->nome.' '.$f->pessoa->sobrenome}}</td>
                                            <td data-title='Função'>{{$f->funcao->nome}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('funcionario','ler'))
                                                <a href="/funcionarios/visualizar/{{$f->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('funcionario','atualizar'))
                                                <a href="/funcionarios/alterar/{{$f->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('funcionario','excluir'))
                                                <a href="/funcionarios/deletar/{{$f->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                @if(Autenticacao::permissao('funcionario','criar'))
                                    <a href="/funcionarios/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Nova Disciplina"><i class="btn-icon-only icon-plus"> </i> Novo Funcionário</a>
                                @endif
                                {{$funcionarios->links()}}
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
