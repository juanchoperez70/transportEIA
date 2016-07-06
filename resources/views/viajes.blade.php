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
							<th>Id</th>
							<th>Id Ruta</th>
							<th>Usuario</th>
							<th>Fecha de suscripción</th>
						 </tr>
					 </thead>
					 <tbody>
						 <?php foreach ($trips as $viaje): ?>
							 <tr>
								<td><?php echo $viaje->id ?></td>
								<td><?php echo $viaje->ruta_id ?></td>
								<td><?php echo $viaje->usuario_id ?></td>
								<td><?php echo $viaje->created_at ?></td>
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
							<th>Id</th>
							<th>Descripción Ruta</th>
						 </tr>
					 </thead>
					 <tbody>
						 <?php foreach ($trips2 as $ruta): ?>
							 <tr>
								<td><?php echo $ruta->id ?></td>
								<td><?php echo $ruta->descripcion ?></td>
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
