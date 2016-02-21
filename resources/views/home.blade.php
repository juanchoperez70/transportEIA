@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard :: Usuario Autenticado</div>
                <div class="panel-body">

                    <p>Bienvenido <strong>
                            <?php echo Auth::user()->nombre; ?></strong></p>
                    <ul>
                        <li><a href="<?php echo url('catalogo/index') ?>">
                                Administrar Usuarios</a></li>
                        <li><a href="<?php echo url('catalogo/crear') ?>">
                                crear usuario (+)</a></li>
                        <li><a href="<?php echo url('auth/logout') ?>">
                                cerrar sesi&oacute;n</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
