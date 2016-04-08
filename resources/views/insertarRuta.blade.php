@extends('app')

@section('content')

<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <div id="googleMap">
        {!!$map['html']!!}
    </div>
    <form class="form-horizontal" role="form" method="POST" action="<?php echo url() ?>/insertarRuta">
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Guardar
				</button>
			</div>
		</div>
    </form>
</body>
</html>
@endsection
