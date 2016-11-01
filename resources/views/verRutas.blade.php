@extends('app')

@section('content')

 
 <div class="container">
	 <div class="row">
		 <div class="panel panel-default">
			 <div class="panel-heading">Rutas <i class="fa fa-train">
        		</i></div>
			 <div class="panel-body">
				 <p>
					 <?php echo link_to('insertarRuta', " Crear ", array(
					 'class' => 'btn btn-default fa fa-plus-circle',
					 'role' => 'button')); ?> 
				 </p>
				 <table class="table table-striped table-hover"
				 style="width:800px; text-align:left">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Zona</th>
							<th>Fecha de Inicio</th>
							<th>Fecha de Destino</th>
							<th>Descripción</th>
						 </tr>
					 </thead>
					 <tbody>
						 <?php foreach ($rutas as $ruta): ?>
							 <tr>
								<td><?php echo $ruta->nombre ?> <?php echo $ruta->apellido ?></td>
								<td><?php echo $ruta->zona_nombre?></td>
								<td><?php echo $ruta->fecha_inicio ?></td>
								<td><?php echo $ruta->fecha_destino ?></td>
								<td><?php echo $ruta->descripcion ?></td>
								<td>
								<a class="btn btn-primary btn-xs" role="button"
								 href="<?php echo url('editarRuta/modificarRuta') ?>/<?php echo $ruta->id ?>">
								<i class="fa fa-pencil">
        						</i> editar
								</a>
								</td>
								<td>
								<a class="btn btn-primary btn-xs" role="button"
								 href="<?php echo url('detallesRuta/verDetalles') ?>/<?php echo $ruta->id ?>">
								<i class="fa fa-eye">
        						</i> ver detalle
								</a>
								</td>
								<td>
								<td>
								<a onclick="return confirm('seguro que desea eliminar esta Ruta?');"
								 class="btn btn-danger btn-xs" role="button"
								 href="<?php echo url('verRutas/eliminar') ?>/<?php echo $ruta->id ?>">
								<i class="fa fa-trash">
        						</i> eliminar
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
