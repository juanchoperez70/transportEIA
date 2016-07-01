<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
        <link href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />

 
        <title>Súbete </title>

        <link href="<?php echo url('/css/app.css') ?>" rel="stylesheet">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div> <a class="navbar-brand" href="#">Súbete</a><!-- <img src="images/logo.png"> --></div>
                   
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                     @if (Auth::check())
                        <li><a href="<?php echo url('/') ?>">Home <i class="fa fa-home">
                        </i></a></li>
                        <li><a href="<?php echo url('/contacto') ?>">Contacto <i class="fa fa-comment">
                        </i></a></li>
                        <li><a href="<?php echo url('/verRutas') ?>">Ver Rutas <i class="fa fa-car">
                        </i></a></li>
                        <li><a href="<?php echo url('/insertarRuta') ?>">Crear Rutas <i class="fa fa-road">
                        </i></a></li>
                        <li><a href="<?php echo url('/viajes') ?>/<?php echo Auth::user()->id ?>">Mis Viajes <i class="fa fa-compass">
                        </i></a></li>
                    @endif    
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a href="<?php echo url('/auth/login') ?>">Login <i class="fa fa-arrow-circle-right">
                        </i></a></li>
                        <li><a href="<?php echo url('/registro') ?>">Registrarse <i class="fa fa-pencil-square-o">
                        </i></a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo Auth::user()->nombre ?>  <i class="fa fa-user">
                            </i> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo url('/auth/logout') ?>">Logout <i class="fa fa-power-off">
                                </i></a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}" role="alert">{{ Session::get('message') }}</div>
        @endif
        @yield('content')

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
