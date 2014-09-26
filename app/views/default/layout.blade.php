<?php
if (!isset($title))
    $title = 'Intranet';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
              rel="stylesheet">
        <link href="/css/font-awesome.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/pages/dashboard.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
        <script src="/js/jquery-1.7.2.min.js"></script> 
        <script src="/js/excanvas.min.js"></script> 
        <script src="/js/Chart.js" type="text/javascript"></script> 
        <script src="/js/bootstrap.js"></script>
        <script src="/js/base.js"></script> 
    </head>
    <body>
        <div class="geral">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="/inicio">Intranet </a>
                        <div class="nav-collapse">
                            <ul class="nav pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-cog"></i> {{ $usuario['email'] }} <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/meusdados">Alterar Dados</a></li>
                                        <li><a href="/logout">Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse --> 
                    </div>
                    <!-- /container --> 
                </div>
                <!-- /navbar-inner --> 
            </div>
            <!-- /navbar -->
            <div class="subnavbar">
                <div class="subnavbar-inner">
                    <div class="container">
                        <ul class="mainnav">
                            <li class="{{$menu[0]}}"><a href="/"><i class="icon-dashboard"></i><span>Geral</span> </a> </li>
                            <li class="{{$menu[1]}}"><a href="/funcionarios"><i class="icon-book"></i><span>Funcionários</span> </a> </li>
                            <li class="{{$menu[2]}}"><a href="/alunos"><i class="icon-list-alt"></i><span>Alunos</span> </a></li>
                            <li class="{{$menu[3]}}"><a href="/administracao"><i class="icon-bar-chart"></i><span>Administrativo</span> </a> </li>
                            <li class="{{$menu[4]}}"><a href="/financeiro"><i class="icon-money"></i><span>Financeiro</span> </a> </li>
                            <li class="{{$menu[5]}}"><a href="/usuarios"><i class="icon-key"></i><span>Usuários</span> </a> </li>
                            <li class="{{$menu[6]}}"><a href="/registros"><i class="icon-eye-open"></i><span>Registros</span> </a> </li>
                        </ul>
                    </div>
                    <!-- /container --> 
                </div>
                <!-- /subnavbar-inner --> 
            </div>
            @if(isset($error))
                {{ $error }}
            @endif
            {{ $content }}
        </div>
        <footer>
            <!-- /extra -->
            <div class="footer">
                <div class="footer-inner">
                    <div class="container">
                        <div class="row">
                            <div class="span12"> &copy; 2014 - Intranet - Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas </div>
                            <!-- /span12 --> 
                        </div>
                        <!-- /row --> 
                    </div>
                    <!-- /container --> 
                </div>
                <!-- /footer-inner --> 
            </div>
        </footer>
    </body>
</html>