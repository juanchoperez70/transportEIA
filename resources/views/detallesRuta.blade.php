@extends('app')

@section('content')
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <div id="googleMap">
        {!!$map['html']!!}
    </div>
    <div>
    	{!!Form::label('fechai', 'Fecha y hora de salida: ') !!}
    	{!!Form::label('fecha_inicio', $ruta['fecha_inicio']) !!}
    </div>
    <div>
    	{!!Form::label('fechaf', 'Fecha y hora de llegada: ') !!}
    	{!!Form::label('fecha_destino', $ruta['fecha_destino']) !!}
    </div>
    <div>
    	{!!Form::label('lbDescripcion', 'Descripción: ') !!}
    	{!!Form::label('descripcion', $ruta['descripcion']) !!}
    </div>
    <div>
    	<a role="button"
		 href="<?php echo url('verRutas') ?>">
    	{!! Form::button('Volver', array('class' => 'volver')) !!}
    	</a>
    </div>
</body>
</html>
@endsection
