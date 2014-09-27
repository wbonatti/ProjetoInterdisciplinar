
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-wrench"></i>
                          <h3>Ações</h3>
                        </div>
                        <div class="widget-content">
                            <div class="shortcuts"> 
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-book"></i>
                                    <span class="shortcut-label">Nova Disciplina</span> 
                                </a>  
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-bookmark-empty"></i>
                                    <span class="shortcut-label">Administrar Disciplina</span> 
                                </a> 
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-group"></i>
                                    <span class="shortcut-label">Nova Turma</span> 
                                </a>  
                                <a href="javascript:;" class="shortcut">
                                    <i class="shortcut-icon icon-bookmark"></i>
                                    <span class="shortcut-label">Administrar Turma</span> 
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <a href="/turma/visualizar/{{$t->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            <a href="/turma/alterar/{{$t->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            <a href="/turma/deletar/{{$t->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
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
                            <h3>Disciplinas</h3>
                        </div>
                        <div class="widget-content responsive-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Nome </th>
                                        <th> Alunos </th>
                                        <th> Turno </th>
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
                                            <a href="/disciplina/visualizar/{{$d->id}}" class="btn btn-info btn-small btn-show" title="Visualizar"><i class="btn-icon-only icon-eye-open"> </i> <span>Visualizar</span></a>
                                            <a href="/disciplina/alterar/{{$d->id}}" class="btn btn-warning btn-small btn-show" title="Alterar"><i class="btn-icon-only icon-pencil"> </i> <span>Alterar</span></a>
                                            <a href="/disciplina/deletar/{{$d->id}}" class="btn btn-danger btn-small btn-show" title="Deletar"><i class="btn-icon-only icon-remove"> </i> <span>Deletar</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="widget-header text-right">
                                {{$disciplinas->links()}}
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
