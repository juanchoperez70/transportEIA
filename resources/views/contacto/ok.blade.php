@extends('app')

@section('content')

<div class="alert alert-success">
    <strong>Excelente!</strong> No hay errores en el formulario:<br><br>
    <ul>
        <li>Hemos recibido su mensaje, luego nos pondremos en contacto, gracias!</li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Datos Enviados</div>
            <div class="panel-body">
                <table class="table table-striped table-hover" style="width:900px; text-align:left">
                    <tbody>

                        <tr>          
                            <td><?php echo Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['nombre'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['email'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('area', 'Contactar a:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['area'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('titulo', 'Titulo:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['titulo'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('mensaje', 'Mensaje:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['mensaje'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
