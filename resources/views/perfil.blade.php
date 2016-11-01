@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong>Perfil</strong> </div>
                <div class="panel-body">
                    <div style="display: inline-flex; align-items: center;">
                        <img src="images/usuario1.png">
                        <p><strong>Información del Usuario</strong></p>
                    </div>        
                    <div>
                        <p><strong>Nombre</strong> : 
                            <?php echo Auth::user()->nombre ; ?> <?php echo Auth::user()->apellido; ?></p>
                    </div>
                    <div>
                        <p><strong>Nombre de Usuario</strong> : 
                            <?php echo Auth::user()->usuario; ?></p>
                    </div>
                    <div>
                        <p><strong>E-mail</strong> : 
                            <?php echo Auth::user()->email ; ?></p>
                    </div>
                    <div>
                        <p><strong>Celular</strong> : 
                            <?php echo Auth::user()->celular ; ?></p>
                    </div>
                    <div>
                        <p><strong>Fecha de suscripción</strong> : 
                            <?php echo Auth::user()->created_at ; ?></p>
                    </div>
                     <div>
                        <p><strong>Rutas publicadas</strong> : 
                            <?php foreach ($rides as $ride): ?>
                                <?php echo $ride->rides_count ?></p>
                            <?php endforeach; ?>    
                    </div>
                    <a class="btn btn-primary" role="button"
                        href="<?php echo url('registro/editar')?>/<?php echo Auth::user()->id;?>">
                        editar perfil
                    </a>
                    <a class="btn btn-info" role="button"
                        href="<?php echo url('registro/editar')?>/<?php echo Auth::user()->id;?>">
                        ver rutas publicadas
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
