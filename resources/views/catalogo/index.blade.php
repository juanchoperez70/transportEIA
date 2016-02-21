@extends('app')

@section('content')

<div class="container">
    <div class="row">


        <div class="panel panel-default">
            <div class="panel-heading"><?php echo $titulo ?></div>
            <div class="panel-body">

                <p>
                    <?php echo link_to('catalogo/crear', "crear (+)", array('class' => 'btn btn-default btn-xs', 'role' => 'button')); ?>
                </p>

                <table class="table table-striped table-hover" style="width:800px; text-align:left">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoria</th>
                            <th>Creado en</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>          
                                <td><?php echo $producto->id ?></td>
                                <td><?php echo $producto->nombre ?></td>
                                <td><?php echo $producto->precio ?></td>
                                <td><?php echo $producto->cantidad ?></td>
                                <td><?php echo $producto->categoria->nombre ?></td>
                                <td><?php echo $producto->created_at ?></td>
                                <td>
                                    <a class="btn btn-primary btn-xs" role="button" href="<?php echo url('catalogo/editar') ?>/<?php echo $producto->id ?>">editar</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('seguro que desea eliminar?');" class="btn btn-danger btn-xs" role="button" href="<?php echo url('catalogo/eliminar') ?>/<?php echo $producto->id ?>">eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo str_replace('/?', '?', $productos->render()); ?>
            </div>
        </div>     


    </div>
</div>
@endsection
