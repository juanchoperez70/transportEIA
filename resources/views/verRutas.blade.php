@extends('app')

@section('content')

 
 <div class="container">
 <div class="row">
 <div class="panel panel-default">
 <div class="panel-heading">Rutas</div>
 <div class="panel-body">
 <p>
 <?php echo link_to('insertarRuta', "crear (+)", array(
 'class' => 'btn btn-default btn-xs',
 'role' => 'button')); ?>
 </p>
 <table class="table table-striped table-hover"
 style="width:800px; text-align:left">
 <thead>
 <tr>
 <th>Id</th>
 <th>Latitud Origen</th>
<th>Longitud Origen</th>
<th>Latitud Destino</th>
<th>Longitud Destino</th>
<th>Fecha de Inicio</th>
<th>Fecha de Destino</th>
<th>Descripción</th>
<th>Editar</th>
<th>Eliminar</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($rutas as $ruta): ?>
 <tr>
 <td><?php echo $ruta->id ?></td>
 <td><?php echo $ruta->lat_origen ?></td>
 <td><?php echo $ruta->lng_origen ?></td>
 <td><?php echo $ruta->lat_destino ?></td>
 <td><?php echo $ruta->lng_destino ?></td>
 <td><?php echo $ruta->fecha_inicio ?></td>
 <td><?php echo $ruta->fecha_destino ?></td>
 <td><?php echo $ruta->descripcion ?></td>
 <td>
 <a class="btn btn-primary btn-xs" role="button"
 href="">
 editar
</a>
 </td>
 <td>
 <a class="btn btn-primary btn-xs" role="button"
 href="">
 ver detalle
</a>
 </td>
<td>
 <td>
 <a onclick="return confirm('seguro que desea eliminar esta Ruta?');"
 class="btn btn-danger btn-xs" role="button"
 href="<?php echo url('verRutas/eliminar') ?>/<?php echo $ruta->id ?>">
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
