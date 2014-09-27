
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
                                <a href="/funcionarios/novo" class="shortcut">
                                    <i class="shortcut-icon icon-user"></i>
                                    <span class="shortcut-label">Novo Funcionário</span> 
                                </a> 
                                <a href="/funcao/novo" class="shortcut">
                                    <i class="shortcut-icon icon-group"></i>
                                    <span class="shortcut-label">Nova Função</span> 
                                </a>
                            </div>
                        </div>
                    </div>
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
                                                <a href="/funcao/visualizar/{{$f->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                                <a href="/funcao/alterar/{{$f->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                                <a href="/funcao/deletar/{{$f->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
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
                                                <a href="/funcionarios/visualizar/{{$f->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                                <a href="/funcionarios/alterar/{{$f->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                                <a href="/funcionarios/deletar/{{$f->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                {{$funcionarios->links()}}
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
