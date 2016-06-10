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
 		function __construct(ViajeDao $dao, UsuarioDao $user, RutaDao $route) {
 			$this->viajeDao = $dao;
 			$this->usuarioDao = $user;
 			$this->rutaDao = $route;
 	}
 	public function index($id) {
 		$viajes = $this->viajeDao->getByUser($id);
 		$viajes2 = $this->viajeDao->getByUserDetailed($id);
		$usuario = $this->usuarioDao->obtenerPorId($id);
 		return view('viajes')->with('trips',$viajes)->with('user',$usuario)->with('trips2',$viajes2);

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


}
