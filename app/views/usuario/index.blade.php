
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-wrench"></i>
                          <h3>Ações</h3>
                        </div>
                        <div class="widget-content">
                            <div class="shortcuts"> 
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-user"></i>
                                    <span class="shortcut-label">Novo Usuário</span> 
                                </a> 
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-archive"></i>
                                    <span class="shortcut-label">Nova Categoria</span> 
                                </a>
                            </div>
                        </div>
                    </div>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $u)
                                        <tr>
                                            <td data-title='#'>{{$u->id}}</td>
                                            <td data-title='Email'>{{$u->email}}</td>
                                            <td data-title='Funcionário'>{{$u->funcionario->pessoa->nome}} {{$u->funcionario->pessoa->sobrenome}}</td>
                                            <td data-title='Ações' class="action-buttons">
                                                <a href="/usuario/visualizar/{{$u->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                                <a href="/usuario/alterar/{{$u->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                                <a href="/usuario/deletar/{{$u->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                {{$usuarios->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /span6 -->
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
                                                <a href="/categoria/visualizar/{{$c->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                                <a href="/categoria/alterar/{{$c->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                                <a href="/categoria/deletar/{{$c->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
