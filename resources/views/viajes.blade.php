@extends('app')

@section('content')

 
 <div class="container">
	 <div class="row">
		 <div class="panel panel-default">
			 <div class="panel-heading">Mis Viajes <i class="fa fa-train">
        		</i></div>
			 <div class="panel-body">
				 <p>
					 Te has unido a los siguentes viajes:
				 </p>
				 <table class="table table-striped table-hover"
				 style="width:800px; text-align:left">
					<thead>
						<tr>
							<th>Descripción Ruta</th>
							<th>Conductor</th>
							<th>Correo Conductor</th>
							<th>Celular Conductor</th>
							<th>Fecha de suscripción</th>
							<th>Salida</th>
							<th>Llegada</th>
						 </tr>
					 </thead>
					 <tbody>
						 <?php foreach ($viajes as $viaje): ?>
							 <tr>
								<td><?php echo $viaje->descripcion ?></td>
								<td><?php echo $viaje->conductor ?> <?php echo $viaje->lastname ?></td> 
								<td><?php echo $viaje->email ?></td>
								<td><?php echo $viaje->celular ?></td>
								<td><?php echo $viaje->created_at ?></td>
								<td><?php echo $viaje->fecha_inicio ?></td>
								<td><?php echo $viaje->fecha_destino ?></td>
								<td>
								<a class="btn btn-primary btn-xs" role="button"
								 href="<?php echo url('viajes/verDetalles') ?>/<?php echo $viaje->id ?>">
								<i class="fa fa-eye">
        						</i> ver detalle
								</a>
								</td>
								<td>
								<td>
								<a onclick="return confirm('seguro que desea eliminar esta Ruta?');"
								 class="btn btn-danger btn-xs" role="button"
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
