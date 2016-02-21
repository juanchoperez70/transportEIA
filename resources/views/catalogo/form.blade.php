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
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $titulo ?></div>
            <div class="panel-body">

                <p>
                    <?php echo link_to('catalogo/index', "volver", array('class' => 'btn btn-default btn-xs', 'role' => 'button')); ?>
                </p>
                <?php echo Form::open(array('url' => 'catalogo/guardar', 'class' => 'form-horizontal', 'role' => 'form')) ?>
                <?php echo Form::hidden('id', isset($producto) ? $producto->id : 0); ?>
                <div class="form-group">
                    <?php echo Form::label('categoria_id', 'Categoría:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php echo Form::select('categoria_id', $categorias, isset($producto) ? $producto->categoria_id : null, array('class' => 'form-control', 'style' => 'width: 300px;')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php echo Form::text('nombre', isset($producto) ? $producto->nombre : null, array('class' => 'form-control',)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::label('precio', 'Precio:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php echo Form::text('precio', isset($producto) ? $producto->precio : null, array('class' => 'form-control',)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo Form::label('cantidad', 'Cantidad:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php echo Form::text('cantidad', isset($producto) ? $producto->cantidad : null, array('class' => 'form-control',)); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo Form::submit($titulo , array('class' => 'btn btn-primary', 'role' => 'button')); ?>
                    </div>
                </div>

                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>
@endsection
