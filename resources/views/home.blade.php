@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard :: Usuario Autenticado</div>
                <div class="panel-body">
                    <div style="display: inline-flex; align-items: center;">
                        <img src="images/usuario1.png">
                        <p>Bienvenido(a) <strong>
                            <?php echo Auth::user()->nombre; ?></strong></p>
                    </div>        
                    <ul>
                        <li><a href="<?php echo url('perfil')?>/<?php echo Auth::user()->id ?>">
                                Perfil</a></li>
                        <li><a href="<?php echo url('listado') ?>">
                                Administrar Usuarios</a></li>
                        <li><a href="<?php echo url('listado/crear') ?>">
                                Crear usuario (+)</a></li>
                        <li><a href="<?php echo url('auth/logout') ?>">
                                Cerrar sesi&oacute;n</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
