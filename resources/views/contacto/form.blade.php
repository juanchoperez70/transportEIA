@extends('app')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hay algunos errores en el formulario:<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row">
        <?php echo Form::open(array('url' => 'contacto/enviar', 'class' => 'form-horizontal', 'role' => 'form')) ?>
        <div class="form-group">
            <?php echo Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('nombre', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('email', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('titulo', 'Titulo:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::text('titulo', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo Form::label('mensaje', 'Mensaje:', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo Form::textarea('mensaje', null, array('class' => 'form-control',)); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo Form::submit('Enviar!', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
            </div>
        </div>

        <?php echo Form::close() ?>

    </div>
</div>
@endsection
