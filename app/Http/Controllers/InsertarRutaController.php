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

		$lat_origen = '0.0';
        $lng_origen = '0.0';

        $config = array();
        $lat = '6.146608428948201';
        $lng = '-75.38988143205643';
        $config['center'] = $lat.','.$lng;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 10;
        //Para coger la posicion en la que se hizo clic
        $config['onclick'] = '
        						$origen = event.latLng;
        						$lat_origen = event.latLng.lat();
        						$lng_origen = event.latLng.lng();
        						$lat_destino = event.latLng.lat();
        						$lng_destino = event.latLng.lng();
        						createMarker_map({ map: map, position: $origen });
        						document.getElementById("lat_origen").value =
								document.getElementById("lat_origen").defaultValue = $lat_origen;
								document.getElementById("lng_origen").value =
								document.getElementById("lng_origen").defaultValue = $lng_origen;
								document.getElementById("lat_destino").value =
								document.getElementById("lat_destino").defaultValue = $lat_destino;
								document.getElementById("lng_destino").value =
								document.getElementById("lng_destino").defaultValue = $lng_destino;
        					';

 
        \Gmaps::initialize($config);
		$map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('InsertarRuta', compact('map'))->with('lat_origen',"$lat_origen")->with('lng_origen', "$lng_origen");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postGuardar(Request $request)
    {
        $data = $request->all();

        //configuaración
        $config = array();
        $lat = $data['lat_origen'];
        $lng = $data['lng_origen'];
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

		$map = \Gmaps::create_map();
        $this->rutaDao->guardar($data);
        return view('verRutas', compact('map'))->with(array('lat_origen' =>"hola"));
        //return view('verRutas');
             

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
