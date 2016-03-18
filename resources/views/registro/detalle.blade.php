@extends('app')

@section('content')

<
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div><h2> Detalle</h2></div>
           
            <div class="panel-body">
                <table class="table table-striped table-hover" style="width:900px; text-align:left">
                    <tbody>

                        <tr>          
                            <td><?php echo Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $usuario['nombre'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('apellido', 'Apellido:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $usuario['apellido'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                        </tr>
                        
                         
                        <tr>          
                            <td><?php echo Form::label('usuario', 'Nombre de Usuario', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $usuario['usuario'] ?></td>
                        </tr>
                        <tr>          
                            <td><?php echo Form::label('password', 'Clave:', array('class' => 'col-sm-2 control-label')); ?></td>
                            <td><?php echo $usuario['password'] ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection