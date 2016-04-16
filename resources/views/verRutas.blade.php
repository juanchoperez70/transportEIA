@extends('app')

@section('content')
<!-- <html>
    <head>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
        function initialize() {
          var mapProp = {
            center:new google.maps.LatLng(6.276675051393908,-75.57815925625005),
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
        <div id="googleMap"></div>
    </body>

</html> -->
<head>
    <script type="text/javascript">var centreGot = false;</script>{!!$map['js']!!}
</head>
<body>
    <div id="googleMap">
        {!!$map['html']!!}
    </div>
    <!-- <div>
        <<?php //echo "$data->lat_origen"; ?>
    </div> -->
</body>
</html>
@endsection
