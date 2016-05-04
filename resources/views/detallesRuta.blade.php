@extends('app')

@section('content')
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <form class="form-detalle" role="form" method="POST" action="<?php echo url() ?>/verRutas">
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
                    
                            <button href="verRutas" class="btn btn-primary">
                                    Volver
                            </button>
                    
                            <button type="submit" class="btn btn-primary">
                                    Unirse a Ruta!
                            </button>
                    
                </div>
            </div>    
    </form>   
          
</body>
</html>
@endsection
