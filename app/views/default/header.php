<!doctype html>
<html>
    <head>
        <title> Painel </title>
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/css/datepicker.css" rel="stylesheet" type="text/css"/>
        <script src="/js/default/jquery.min.js" type="text/javascript"></script>
        <script src="/js/default/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/default/bootstrap-datepicker.js" type="text/javascript"></script>
    </head>
<body>
    <header class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="row ">
                <div class="col-xs-4">
                    <div class="list-group-item list-group-item-danger text-center"><b>Intranet</b></div>
                </div>
                <div class="col-xs-4 col-xs-offset-4 pull-right">
                    <?php if(!empty($usuario)): ?>
                        Bem vindo <?=$usuario ?>! -  <a href="/logout"> sair! </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
<?php if(!empty($usuario)): ?>
        <article class="col-md-10 col-md-offset-1">
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav pull-right">
                        <li class="border-right"><a href="/comissoes">Inicio</a></li>
                        <li class="border-right"><a href="/faturamento">Alunos</a></li>
                        <li class="border-right"><a href="/registro">Funcionários</a></li>
                        <li class="border-right"><a href="/dados">Turmas</a></li>
                        <li class="border-right"><a href="/componentes">Disciplinas</a></li>
                        <li class="border-right"><a href="/componentes">Logs</a></li>
                        <li><a href="/componentes">Logout</a></li>
                    </ul>
                </div>
            </div>
        </article>
<?php endif; ?>