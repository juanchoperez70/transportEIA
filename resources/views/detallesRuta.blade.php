@extends('app')

@section('content')
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
    <link href="<?php echo url('/css/detalle.css') ?>" rel="stylesheet">

</head>
<body>
    
    
        <div class="row">
                
                <div class="col-md-2"></div>
                    <div class="col-md-4">
                        {!!$map['html']!!}
                    </div>
                    <div>
                        <div>
                            <label class="col-md-4 control-label">Fecha y Hora de Salida</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="fecha" value="{{ $ruta['fecha_inicio'] }}"disabled>
                                </div>
                        </div>
                        
                    </div>

                    <div>
                         <label class="col-md-4 control-label">Fecha y Hora de Llegada</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="fecha" value="{{ $ruta['fecha_destino'] }}"disabled>
                            </div>
                    </div>
                    <div>

                        <label class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="fecha" value="{{ $ruta['descripcion'] }}"disabled>
                            </div>
                    </div>
                    
                        <div class="col-md-6">
                                
                                
                            <a class="col-md-3 btn btn-info" role="button"
                                 href="<?php echo url('detallesRuta/unirRuta') ?>/<?php echo Auth::user()->id ?>/<?php echo $ruta->id ?>">
                                 Unirse a la ruta! <i class="fa fa-flag-checkered">
                                    </i>
                                </a>
                        
                         

                            <a class="col-md-3 col-md-offset-1 btn btn-primary" role="button"
                                 href="<?php echo url('verRutas')?>">
                                 Regresar <i class="fa fa-arrow-right">
                                </i>
                                </a>
                                
                        </div>
                
            </div>     
</body>
</html>
@endsection
