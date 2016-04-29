<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Model\Dao\RutaDao;

class VerRutasController extends Controller {

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

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	private $rutaDao;
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
		$map = \Gmaps::create_map();
 
        // Colocar el marcador 
        // Una vez se conozca la posición del usuario
        /*$marker = array();
        \Gmaps::add_marker($marker);

        $map = \Gmaps::create_map();*/
 
        //Devolver vista con datos del mapa
        return view('VerRutas')->with('titulo', 'Lista de Rutas')->with
 		('rutas', $this->rutaDao->obtenerTodos());

	}

}
