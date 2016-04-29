@extends('app')

@section('content')
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <div id="googleMap">
        {!!$map['html']!!}
    </div>
</body>
</html>
@endsection
