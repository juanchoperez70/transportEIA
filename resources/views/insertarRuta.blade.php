@extends('app')

@section('content')

<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
    <link href="<?php echo url('/css/insertar.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

</head>
<body>

    <form class="form-horizontal" role="form" method="POST" action="<?php echo url() ?>/insertarRuta">
    	<div class="row">
			<div class="form-group">

				<div class="col-md-4" id="googleMap">
					<input type="text" id="lugarBox" />
			        {!!$map['html']!!}
			        
			        	<div class="form-group">
			        		<div class="col-md-4">
			        			<select class="form-control" id="accion">
								    <option value="0" selected>Origen</option>
								    <option value="Destino">Destino</option>
							  	</select>
			        		</div>
							  
						</div>
						<div class="form-group">
			        		<div class="col-md-5">
			        			
			        			<select class="selectpicker form-control " id="zonas" method="post" name="zonas[]" title="Seleccione sus zonas..." multiple>
			        			<?php foreach ($zonas as $zona): ?>
								  <option value="<?php echo $zona->id; ?>"><?php echo $zona->nombre ?></option>
								 <?php endforeach; ?>
								</select>
			        		</div>
							  
						</div>
			    </div>
			</div>    
				<div class="col-md-6">
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
							
			    </div>    
			        <div class="col-md-6" id="form-left">
			            <div>
						    <label class="col-md-6 control-label">Fecha y Hora de Origen:</label>
						    @if(!is_null($ruta))
			                    <div class="col-md-6">	                            
			                        <?php echo Form::text('fecha_inicio', $ruta->fecha_inicio, array('class' => 'form-control', 'id' => 'fecha_inicio',)); ?>
			                        <img src="../../images2/cal.gif" onclick="javascript:NewCssCal('fecha_inicio', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
			                    </div>    
		                    	
						    	
						    @else
						    	<div class="col-md-6">
						    		<?php echo Form::text('fecha_inicio', null, array('class' => 'form-control', 'id' => 'fecha_inicio',)); ?>
						    		<img src="images2/cal.gif" onclick="javascript:NewCssCal('fecha_inicio', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
						    	</div>
						    	
						    @endif

					   </div>

					   <div>
						    <label class="col-md-6 control-label">Fecha y Hora de Destino:</label>
						    @if(!is_null($ruta))
						    	<div class="col-md-6">	   

			                        <?php echo Form::text('fecha_destino', $ruta->fecha_destino, array('class' => 'form-control', 'id' => 'fecha_destino',)); ?>
			                        <img src="../../images2/cal.gif" onclick="javascript:NewCssCal('fecha_destino', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
			                    </div> 
						    	
						    @else
						    	<div class="col-md-6">	                            
			                        <?php echo Form::text('fecha_destino', null, array('class' => 'form-control', 'id' => 'fecha_destino',)); ?>
			                        <img src="images2/cal.gif" onclick="javascript:NewCssCal('fecha_destino', 'yyyyMMdd', 'dropdown', true , 24, false, 	'future')" style="cursor:pointer"/>
			                    </div> 
						    	
						    @endif
						    
					   </div>
					   
					   	<div>
					   		@if(!is_null($ruta))
					   		
						   		<div class="col-md-6">
						   			<label class="col-md-6 control-label">Descripción:</label>
						   			<?php echo Form::textarea('notes', $ruta->descripcion, array('class' => 'form-control', 'id' => 'descripcion','name'=>'descripcion')); ?>
						   		</div>
							@else
								<div class="col-md6">
									<label class="col-md-6 control-label">Descripción:</label>
						   			<?php echo Form::textarea('notes',null, array('class' => 'form-control', 'id' => 'descripcion','name'=>'descripcion')); ?>
						   		</div>
							@endif
								<div style="display: none;">
						   			<?php echo Form::textarea('usuario_id',Auth::user()->id); ?>
						   		</div>
								<button type="submit" class="btn btn-primary btn-lg col-md-offset-6">
									Guardar  <i class="fa fa-check-circle">
        									</i>
								</button>
					   	</div>		    
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
