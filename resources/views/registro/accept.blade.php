@extends('app')

@section('content')

<div class="alert alert-success">
    <strong>Correcto!</strong> El formulario se ha diligenciado correctamente.
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
                            <td><?php echo Form::label('apellido', 'Apellido:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['apellido'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['email'] ?></td>
                        </tr>
                        <tr>          
                            
                        <tr>          
                            <td><?php echo Form::label('usuario', 'Nombre de usuario', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['usuario'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('password', 'Clave:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $datos['password'] ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection