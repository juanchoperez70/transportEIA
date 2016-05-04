<?php namespace App\Http\Controllers;
use App\Model\Dao\RutaDao;

class DetallesRutaController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| VerRutas Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	private $rutaDao;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(RutaDao $dao)
	{
		$this->middleware('auth');
		$this->rutaDao = $dao;
	}

	/**
	 * Show the application dashboard to the user.
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
 
        \Gmaps::initialize($config);

        //Punto de inicio
        $marker = array();
        $lat = '6.146608428948201';
        $lng = '-75.38988143205643';
		$marker['position'] = $lat.','.$lng;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		//punto final
        $marker = array();
        $lat = '6.156896803142564';
        $lng = '-75.51740169525146';
		$marker['position'] = $lat.','.$lng;
		$marker['infowindow_content'] = 'Fin!';
		\Gmaps::add_marker($marker);
		
		//Creat mapa
		$map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('DetallesRuta', compact('map'));
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
        $config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'lugarBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
 
        \Gmaps::initialize($config);

        //Punto de inicio
        $marker = array();
		$marker['position'] = $lat_origen.','.$lng_origen;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$marker['draggable'] = 'TRUE';
		$marker['ondragend'] = '
					$lat_origen = event.latLng.lat();
					$lng_origen = event.latLng.lng();

					document.getElementById("lat_origen").value =
					document.getElementById("lat_origen").defaultValue = $lat_origen;
					document.getElementById("lng_origen").value =
					document.getElementById("lng_origen").defaultValue = $lng_origen;
		';
		\Gmaps::add_marker($marker);

		//Punto destino
		//Punto de inicio
        $marker = array();
		$marker['position'] = $lat_destino.','.$lng_destino;
		$marker['infowindow_content'] = 'Destino!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		$marker['draggable'] = 'TRUE';
		$marker['ondragend'] = '
					$lat_destino = event.latLng.lat();
					$lng_destino = event.latLng.lng();
					
					document.getElementById("lat_destino").value =
					document.getElementById("lat_destino").defaultValue = $lat_destino;
					document.getElementById("lng_destino").value =
					document.getElementById("lng_destino").defaultValue = $lng_destino;
		';
		\Gmaps::add_marker($marker);

		$map = \Gmaps::create_map();
        
        return view('InsertarRuta', compact('map'))->with('ruta', $ruta);
	}

	public function verDetalles($id)
	{

		$ruta = $this->rutaDao->obtenerPorId($id);
		//configuaración
        $config = array();
        $lat = $ruta->lat_origen;
        $lng = $ruta->lng_origen;
        $config['center'] = $lat.','.$lng;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 10;
 
        \Gmaps::initialize($config);

        //Punto de inicio
        $marker = array();
        $lat = $ruta->lat_origen;
        $lng = $ruta->lng_origen;
		$marker['position'] = $lat.','.$lng;
		$marker['infowindow_content'] = 'Inicio!';
		$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		\Gmaps::add_marker($marker);

		//punto final
        $marker = array();
        $lat = $ruta->lat_destino;
        $lng = $ruta->lng_destino;
		$marker['position'] = $lat.','.$lng;
		$marker['infowindow_content'] = 'Fin!';
		\Gmaps::add_marker($marker);
		
		//Creat mapa
		$map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('DetallesRuta', compact('map'))->with
 		('ruta', $ruta);
	}

}