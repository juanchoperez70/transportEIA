@extends('app')

@section('content')
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    
    
        <div>
                <div id="googleMap">
                    {!!$map['html']!!}
                </div>
                <div>
                    <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha y Hora de Salida</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fecha" value="{{ $ruta['fecha_inicio'] }}">
                                    </div>
                    </div>
                </div>
                <div>
                     <label class="col-md-4 control-label">Fecha y Hora de Llegada</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fecha" value="{{ $ruta['fecha_destino'] }}">
                                    </div>
                </div>
                <div>

                    <label class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fecha" value="{{ $ruta['descripcion'] }}">
                                    </div>
                </div>
                <div>
                        <div>
                            <a class="btn btn-primary btn-xs" role="button"
                                 href="<?php echo url('verRutas')?>">
                                 Regresar
                                </a>
                        </div>
                        <div>
                            <a class="btn btn-primary btn-xs" role="button"
                                 href="<?php echo url('detallesRuta/unirRuta') ?>/<?php echo Auth::user()->id ?>">
                                 Unirse a la ruta!
                                </a>
                        </div>
                </div>
            </div>     
</body>
</html>
@endsection
