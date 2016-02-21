@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $titulo ?></div>
            <div class="panel-body">

                <p>
                    <?php echo link_to('catalogo/index', "volver", array('class' => 'btn btn-default btn-xs', 'role' => 'button')); ?>
                </p>
                <?php echo Form::open(array('class' => 'form-horizontal', 'role' => 'form')) ?>
                <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <?php echo Form::label('categoria', 'Categoría:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10">
                        <?php
                        echo Form::select('categoria', $categorias, null, array('onchange' => 'javascript:cargarSelectProductos()',
                            'id' => 'categoria', 'class' => 'form-control', 'style' => 'width: 300px;'));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('producto', 'Productos:', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-10" id='cargar_productos_div'>
                        <?php echo Form::select('producto', array(), null, array('class' => 'form-control', 'style' => 'width: 300px;')); ?>
                    </div>
                </div>
                <?php echo Form::close() ?>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function cargarSelectProductos()
    {
        $.ajax({
            type: "post",
            url: "<?php echo url('catalogo/cargar-productos-ajax/html') ?>",
            data: {catId: $('#categoria').val(), _token: $('#_token').val()},
            success: function(html) {
                $("#cargar_productos_div").html(html);
            }
        });
    }

    function cargarSelectProductosJson()
    {
        $.ajax({
            type: "post",
            dataType: 'json',
            url: "<?php echo url('catalogo/cargar-productos-ajax/json') ?>",
            data: {catId: $('#categoria').val(), _token: $('#_token').val()},
            success: function(dataJson) {
                    $("select[name=producto]").empty();
                    $("select[name=producto]").append("<option value=''>Seleccione un producto --></option>");
                    $.each(dataJson, function(index, item) {
                        $("select[name=producto]").append("<option value=" + index + ">" + item + "</option>");
                    });
            }
        }); 
    }

</script>
@stop