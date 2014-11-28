
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <!-- /span6 -->
                @if(Autenticacao::pagepermissao(['usuario']))
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Usuarios</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Email </th>
                                        <th> Funcionário </th>
                                        <th> Categoria </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $u)
                                        <tr>
                                            <td data-title='#'>{{$u->id}}</td>
                                            <td data-title='Email'>{{$u->email}}</td>
                                            <td data-title='Funcionário'>{{$u->funcionario->pessoa->nome}} {{$u->funcionario->pessoa->sobrenome}}</td>
                                            <td data-title='Categoria'>
                                                {{(isset($u->categoria->nome))? $u->categoria->nome: ''}}
                                            </td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('usuario','atualizar'))
                                                <a href="/usuarios/alterar/{{$u->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('usuario','excluir'))
                                                <a href="/usuarios/deletar/{{$u->id}}" onclick="return confirm('Tem certeza que quer excluir esse item?');" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                    @if(Autenticacao::permissao('usuario','criar'))
                                        <a href="/usuarios/novo" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Novo Usuario"><i class="btn-icon-only icon-plus"> </i> Novo Usuário</a>
                                    @endif
                                {{$usuarios->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /span6 -->
                @endif
                @if(Autenticacao::pagepermissao(['categoria']))
                <div class="span6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-save"></i>
                            <h3>Categorias</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $c)
                                        <tr>
                                            <td data-title='#'>{{$c->id}}</td>
                                            <td data-title='Email'>{{$c->nome}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                            @if(Autenticacao::permissao('categoria','atualizar'))
                                                <a href="/usuarios/categoria/alterar/{{$c->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            @endif
                                            @if(Autenticacao::permissao('categoria','excluir'))
                                                <a href="/usuarios/categoria/deletar/{{$c->id}}" onclick="return confirm('Tem certeza que quer excluir esse item?');" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                    @if(Autenticacao::permissao('categoria','criar'))
                                        <a href="/usuarios/categoria/nova" class="btn btn-success btn-small btn-show pull-left btn-ajust" title="Nova Categoria"><i class="btn-icon-only icon-plus"> </i> Nova Categoria</a>
                                    @endif
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
