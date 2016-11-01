@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div><h2><strong>Bucar amigos...</strong></h2></div>
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
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo Form::submit('Buscar!', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
            </div>
        </div>

        <?php echo Form::close() ?>

    </div>
</div>
@endsection
