<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Model\Dao\ViajeDao;
use App\Model\Dao\UsuarioDao;
use App\Model\Dao\RutaDao;



class ViajesController extends Controller {

	private $viajeDao;
	private $rutaDao;

	function __construct(ViajeDao $dao, UsuarioDao $user, RutaDao $route) {
		$this->viajeDao = $dao;
		$this->usuarioDao = $user;
		$this->rutaDao = $route;
 	}

 	public function index($id) {
 		return view('viajes')->with('viajes', $this->viajeDao->getdetailed($id));
 	}

 	public function getCrear() {
 		return view('registro.registerform');
 	}

 	public function getEditar($id) {

 	}

 	public function postGuardar(Request $request) {

		if (!$request->isMethod('post')) {
			return redirect('listado/index');
		}

		$data = $request->all();

 	}

	public function getEliminar($id) {

	}

	public function verDetalles($id)
	{

		$viaje = $this->viajeDao->obtenerPorId($id);
		$ruta = $this->rutaDao->obtenerPorId($viaje->ruta_id);
		//configuaración
        $config = array();
        $lat = $viaje->lat_origen;
        $lng = $viaje->lng_origen;
        $config['center'] = $lat.','.$lng;
        $config['map_width'] = 400;
        $config['map_height'] = 400;
        $config['zoom'] = 17;
 
        \Gmaps::initialize($config);

        //Posicion actual
        $marker = array();
        $lat = $viaje->lat_origen;
        $lng = $viaje->lng_origen;
		$marker['position'] = $lat.','.$lng;
		$marker['infowindow_content'] = 'Actual!';
		$marker['icon'] = './../../../public/images/car_map.png';
		\Gmaps::add_marker($marker);

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

		$polygon = array();
		$polygon['points'] = array('37.425, -122.1321',
					   '37.4422, -122.1622',
					   '37.4412, -122.1322',
					   '37.425, -122.1021');
		$polygon['strokeColor'] = '#000099';
		$polygon['fillColor'] = '#000099';
		\Gmaps::add_polygon($polygon);
		
		//Creat mapa
		$map = \Gmaps::create_map();
 
        //Devolver vista con datos del mapa
        return view('DetallesRuta', compact('map'))->with
 		('ruta', $ruta);
	}


}
