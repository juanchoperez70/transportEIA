<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Dao\RutaDao;

class InsertarRutaController extends Controller {
	private $rutaDao;

	function __construct(RutaDao $dao) {
            $this->rutaDao = $dao;
            $this->middleware('auth');
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
        return view('InsertarRuta', compact('map'))->with('ruta', null);
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
