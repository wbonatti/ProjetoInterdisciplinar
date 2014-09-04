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
        <script src="/js/chart.min.js" type="text/javascript"></script> 
        <script src="/js/bootstrap.js"></script>
        <script language="javascript" type="text/javascript" src="/js/full-calendar/fullcalendar.min.js"></script>
        <script src="/js/base.js"></script> 
    </head>
    <body>
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
                        <li class="active"><a href="javascript:;"><i class="icon-dashboard"></i><span>Geral</span> </a> </li>
                        <li><a href="javascript:;"><i class="icon-book"></i><span>Funcionários</span> </a> </li>
                        <li><a href="javascript:;"><i class="icon-list-alt"></i><span>Alunos</span> </a></li>
                        <li><a href="javascript:;"><i class="icon-bar-chart"></i><span>Administrativo</span> </a> </li>
                        <li><a href="javascript:;"><i class="icon-money"></i><span>Financeiro</span> </a> </li>
                        <li><a href="javascript:;"><i class="icon-eye-open"></i><span>Registro</span> </a> </li>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        {{ $content }}
        <footer>
            <!-- /main -->
            <div class="extra">
                <div class="extra-inner">
                    <div class="container">
                        <div class="row">
                            <div class="span3">
                                <h4>
                                    About Free Admin Template</h4>
                                <ul>
                                    <li><a href="javascript:;">EGrappler.com</a></li>
                                    <li><a href="javascript:;">Web Development Resources</a></li>
                                    <li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
                                    <li><a href="javascript:;">Free Resources and Scripts</a></li>
                                </ul>
                            </div>
                            <!-- /span3 -->
                            <div class="span3">
                                <h4>
                                    Support</h4>
                                <ul>
                                    <li><a href="javascript:;">Frequently Asked Questions</a></li>
                                    <li><a href="javascript:;">Ask a Question</a></li>
                                    <li><a href="javascript:;">Video Tutorial</a></li>
                                    <li><a href="javascript:;">Feedback</a></li>
                                </ul>
                            </div>
                            <!-- /span3 -->
                            <div class="span3">
                                <h4>
                                    Something Legal</h4>
                                <ul>
                                    <li><a href="javascript:;">Read License</a></li>
                                    <li><a href="javascript:;">Terms of Use</a></li>
                                    <li><a href="javascript:;">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <!-- /span3 -->
                            <div class="span3">
                                <h4>
                                    Open Source jQuery Plugins</h4>
                                <ul>
                                    <li><a href="http://www.egrappler.com">Open Source jQuery Plugins</a></li>
                                    <li><a href="http://www.egrappler.com;">HTML5 Responsive Tempaltes</a></li>
                                    <li><a href="http://www.egrappler.com;">Free Contact Form Plugin</a></li>
                                    <li><a href="http://www.egrappler.com;">Flat UI PSD</a></li>
                                </ul>
                            </div>
                            <!-- /span3 -->
                        </div>
                        <!-- /row --> 
                    </div>
                    <!-- /container --> 
                </div>
                <!-- /extra-inner --> 
            </div>
            <!-- /extra -->
            <div class="footer">
                <div class="footer-inner">
                    <div class="container">
                        <div class="row">
                            <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
                            <!-- /span12 --> 
                        </div>
                        <!-- /row --> 
                    </div>
                    <!-- /container --> 
                </div>
                <!-- /footer-inner --> 
            </div>
        </footer>
        <!-- /footer --> 
    </body>
</html>