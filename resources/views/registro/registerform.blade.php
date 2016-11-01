@extends('app')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Parece que algo salió mal!</strong> Hay algunos errores en el formulario:<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row">
        <?php echo Form::open(array('url' => 'registro/crear', 'class' => 'form-horizontal', 'role' => 'form')) ?>
        <div class="form-group">
            <?php echo Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('nombre', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('apellido', 'Apellido:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('apellido', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('celular', 'Celular:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('celular', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('email', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('usuario', 'Nombre de Usuario:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('usuario', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('password', 'Clave:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::password('password', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo Form::submit('Registrarse', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
            </div>
        </div>

        <?php echo Form::close() ?>

    </div>
</div>
@endsection