<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Dao\RutaDao;
use App\Model\Dao\ZonaDao;

class InsertarRutaController extends Controller {
	private $rutaDao;

	function __construct(RutaDao $dao, ZonaDao $zone) {
			$this->middleware('auth');
            $this->rutaDao = $dao;
             $this->zonaDao = $zone;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//configuaración

        $config = array();
        $lat = '6.146608428948201';
        $lng = '-75.38988143205643';
        $config['center'] = $lat.','.$lng;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 10;
        $config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'lugarBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
        //Para coger la posicion en la que se hizo clic
        $config['onclick'] =
			'
				$pos = event.latLng;
				createMarker_map({ map: map, position: $pos });
				var accion = document.getElementById("accion");
				var zonas = document.getElementById("zonas");

				if(zonas.options[zonas.selectedIndex].value == 1){
					
    				var poly = new google.maps.Polyline({ map: map, path: [ {lat: 6.188726030677375, lng: -75.56130409240723},
      {lat: 6.185440796831991, lng: -75.54654121398926},
      {lat: 6.183520845521834, lng: -75.54563999176025},{lat: 6.184587485999269, lng:-75.5613899230957},{lat: 6.188726030677375, lng: -75.56130409240723}], strokeColor: "#FF0000", strokeOpacity:0.8, strokeWeight: 2 , fillColor: "#FF0000", fillOpacity: 0.35});
				}

				if(zonas.options[zonas.selectedIndex].value == 2){
					
    				var poly = new google.maps.Polyline({ map: map, path: [ {lat: 6.23471715494602, lng: -75.57014465332031},
      {lat: 6.236540931525322, lng: -75.5687928199768},
      {lat: 6.228445874812434, lng: -75.56387901306152},{lat: 6.230749619080851, lng:-75.56868553161621},{lat: 6.23471715494602, lng: -75.57014465332031}], strokeColor: "#FF0000", strokeOpacity:0.8, strokeWeight: 2 , fillColor: "#FF0000", fillOpacity: 0.35});
				}

				if(zonas.options[zonas.selectedIndex].value == 3){
					
    				var poly = new google.maps.Polyline({ map: map, path: [ {lat: 6.162400921526595, lng: -75.43642044067383},
      {lat: 6.183904836341574, lng: -75.43470382690432},
      {lat: 6.168544986241183, lng: -75.51521301269531},{lat: 6.15233132833537, lng:-75.51658630371094},{lat: 6.162400921526595, lng: -75.43642044067383}], strokeColor: "#FF0000", strokeOpacity:0.8, strokeWeight: 2 , fillColor: "#FF0000", fillOpacity: 0.35});
				}

				if(accion.options[accion.selectedIndex].value == 0){
					$lat_origen = event.latLng.lat();
					$lng_origen = event.latLng.lng();

					document.getElementById("lat_origen").value =
					document.getElementById("lat_origen").defaultValue = $lat_origen;
					document.getElementById("lng_origen").value =
					document.getElementById("lng_origen").defaultValue = $lng_origen;
				}
				else{
					$lat_destino = event.latLng.lat();
					$lng_destino = event.latLng.lng();
					
					document.getElementById("lat_destino").value =
					document.getElementById("lat_destino").defaultValue = $lat_destino;
					document.getElementById("lng_destino").value =
					document.getElementById("lng_destino").defaultValue = $lng_destino;
				}

		'; 

 
        \Gmaps::initialize($config);
		$map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('InsertarRuta', compact('map'))->with('ruta', null)->with('zonas',$this->zonaDao->obtenerTodos());
        //->with('lat_origen',"$lat_origen")->with('lng_destino', "$lng_destino")
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postGuardar(Request $request)
    {
        $data = $request->all();

        // $fo = $data['fecha_inicio'];
        // $fd = $data['fecha_destino'];
        // $descripcion = $data['descripcion'];

        // echo "$descripcion";

        // echo "origen";

        // echo "$fo";

        // echo "destino";
        // echo "$fd";


        //configuaración
        $config = array();
        $lat_origen = $data['lat_origen'];
        $lng_origen = $data['lng_origen'];
        $lat_destino = $data['lat_destino'];
        $lng_destino = $data['lng_destino'];
        $config['center'] = $lat_origen.','.$lng_origen;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 10;
        // $zonas = $data['zonas'];
 
        \Gmaps::initialize($config);

        //Punto de inicio
        $marker = array();
		$marker['position'] = $lat_origen.','.$lng_origen;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		//Punto destino
		//Punto de inicio
        $marker = array();
		$marker['position'] = $lat_destino.','.$lng_destino;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		$map = \Gmaps::create_map();

        $this->rutaDao->guardar($data);

        return view('verRutas')->with('titulo', 'Lista de Rutas')->with
 		('rutas', $this->rutaDao->obtenerTodos());
        //return view('verRutas');
    }

	public function modificarRuta($id){
		//
		$ruta = $this->rutaDao->obtenerPorId($id);
		//configuaración
        $config = array();
        $lat_origen = $ruta->lat_origen;
        $lng_origen = $ruta->lng_origen;
        $lat_destino = $ruta->lat_destino;
        $lng_destino = $ruta->lng_destino;
        $config['center'] = $lat_origen.','.$lng_origen;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 10;
 
        \Gmaps::initialize($config);

        //Punto de inicio
        $marker = array();
		$marker['position'] = $lat_origen.','.$lng_origen;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		//Punto destino
		//Punto de inicio
        $marker = array();
		$marker['position'] = $lat_destino.','.$lng_destino;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		$map = \Gmaps::create_map();
        
        return view('InsertarRuta', compact('map'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
