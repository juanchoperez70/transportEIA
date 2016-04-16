@extends('app')

@section('content')

<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <form class="form-horizontal" role="form" method="POST" action="<?php echo url() ?>/insertarRuta">
		<div class="form-group">
			<div id="googleMap">
		        {!!$map['html']!!}
		    </div>
			<div class="col-md-6 col-md-offset-4">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

				<div class="col-sm-10">
	                <?php echo Form::text('lat_origen', null, array('class' => 'form-control', 'id' => 'lat_origen',)); ?>
	            </div>

	            <div class="col-sm-10">
	                <?php echo Form::text('lng_origen', null, array('class' => 'form-control', 'id' => 'lng_origen',)); ?>
	            </div>

	            <div class="col-sm-10">
	                <?php echo Form::text('lat_destino', null, array('class' => 'form-control', 'id' => 'lat_destino',)); ?>
	            </div>

	            <div class="col-sm-10">
	                <?php echo Form::text('lng_destino', null, array('class' => 'form-control', 'id' => 'lng_destino',)); ?>
	            </div>

				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div>
    </form>
</body>
</html>
@endsection
