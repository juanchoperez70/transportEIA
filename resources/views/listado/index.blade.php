@extends('app')
@section('content')
<div class="container">
 <div class="row">
 <div class="panel panel-default">
 <div class="panel-heading">Usuarios</div>
 <div class="panel-body">
 <p>
 <?php echo link_to('listado/crear', "crear (+)", array(
 'class' => 'btn btn-default btn-xs',
 'role' => 'button')); ?>
 </p>
 <table class="table table-striped table-hover"
 style="width:800px; text-align:left">
 <thead>
 <tr>
 <th>Id</th>
 <th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Username</th>
<th>Clave</th>
<th>Creado en</th>
<th>Editar</th>
<th>Eliminar</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($usuarios as $usuario): ?>
 <tr>
 <td><?php echo $usuario->id ?></td>
 <td><?php echo $usuario->nombre ?></td>
 <td><?php echo $usuario->apellido ?></td>
 <td><?php echo $usuario->email ?></td>
 <td><?php echo $usuario->usuario ?></td>
 <td><?php echo $usuario->password ?></td>
 <td><?php echo $usuario->created_at ?></td>
 <td>
 <a class="btn btn-primary btn-xs" role="button"
 href="<?php echo url('registro/editar')?>/<?php echo $usuario->id?>">
 editar
</a>
 </td>
 <td>
 <a class="btn btn-primary btn-xs" role="button"
 href="<?php echo url('registro/detalle')?>/<?php echo $usuario->id?>">
 ver detalle
</a>
 </td>
<td>
 <a onclick="return confirm('seguro que desea eliminar este usuario?');"
 class="btn btn-danger btn-xs" role="button"
 href="<?php echo url('registro/eliminar') ?>/<?php echo $usuario->id ?>">
 eliminar
</a>
 </td>
 </tr>
 <?php endforeach; ?>
 </tbody>
 </table>
 </div>
</div>
 </div>
</div>
@endsection