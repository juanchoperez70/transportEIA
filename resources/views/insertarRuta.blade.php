@extends('app')

@section('content')

<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <form class="form-horizontal" role="form" method="POST" action="<?php echo url() ?>/insertarRuta">
		<div class="form-group">

			<div id="googleMap">
				<input type="text" id="lugarBox" />
		        {!!$map['html']!!}
		        {!! Form::select('opcion', ["Origen", "Destino"], 0, ['id' => 'accion']) !!}
		    </div>
			<div class="col-md-6 col-md-offset-4">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

				@if(is_null($ruta))
					<div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lat_origen', null, array('class' => 'form-control', 'id' => 'lat_origen',)); ?>
		            </div>
		        @else
		        	<div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lat_origen', $ruta->lat_origen, array('class' => 'form-control', 'id' => 'lat_origen',)); ?>
		            </div>
		        @endif

		        @if(is_null($ruta))
		            <div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lng_origen', null, array('class' => 'form-control', 'id' => 'lng_origen',)); ?>
		            </div>
	            @else
	            	<div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lng_origen', $ruta->lng_origen, array('class' => 'form-control', 'id' => 'lng_origen',)); ?>
		            </div>
		        @endif

				@if(is_null($ruta))
		            <div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lat_destino', null, array('class' => 'form-control', 'id' => 'lat_destino',)); ?>
		            </div>
		        @else
		        	<div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lat_destino', $ruta->lat_destino, array('class' => 'form-control', 'id' => 'lat_destino',)); ?>
		            </div>
		        @endif

		        @if(is_null($ruta))
		            <div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lng_destino', null, array('class' => 'form-control', 'id' => 'lng_destino',)); ?>
		            </div>
		        @else
		        	<div class="col-sm-10" style="display: none;">
		                <?php echo Form::text('lng_destino', $ruta->lng_destino, array('class' => 'form-control', 'id' => 'lng_destino',)); ?>
		            </div>
		        @endif

	            <div>
				    <label for="fecha_inicio">Fecha y hora origen: </label>
				    @if(!is_null($ruta))
				    	<input type="Text" id="fecha_inicio" name="fecha_inicio" maxlength="25" size="25" value="<?php echo htmlspecialchars($ruta->fecha_inicio); ?>"/>
				    	<img src="../../images2/cal.gif" onclick="javascript:NewCssCal('fecha_inicio', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
				    @else
				    	<input type="Text" id="fecha_inicio" name="fecha_inicio" maxlength="25" size="25"/>
				    	<img src="images2/cal.gif" onclick="javascript:NewCssCal('fecha_inicio', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
				    @endif

			   </div>

			   <div>
				    <label for="fecha_destino">Fecha y hora destino: </label>
				    @if(!is_null($ruta))
				    	<input type="Text" id="fecha_destino" name="fecha_destino" maxlength="25" size="25" value="<?php echo htmlspecialchars($ruta->fecha_destino); ?>"/>
				    	<img src="../../images2/cal.gif" onclick="javascript:NewCssCal('fecha_destino', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
				    @else
				    	<input type="Text" id="fecha_destino" name="fecha_destino" maxlength="25" size="25"/>
				    	<img src="images2/cal.gif" onclick="javascript:NewCssCal('fecha_destino', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
				    @endif
				    
			   </div>

				@if(!is_null($ruta))
			   		{!! Form::textarea('notes', $ruta->descripcion, ['id' => 'descripcion', 'name' => 'descripcion']) !!}
				@else
					{!! Form::textarea('notes', null, ['id' => 'descripcion', 'name' => 'descripcion']) !!}
				@endif
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div>
    </form>
    @if(is_null($ruta))
    	<script src="./js/datetimepicker_css.js"></script>
    @else
    	<script src="../../js/datetimepicker_css.js"></script>
	@endif
</body>
</html>
@endsection
