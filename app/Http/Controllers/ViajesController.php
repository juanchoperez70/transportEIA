<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Model\Dao\ViajeDao;


class ViajesController extends Controller {

	private $viajeDao;
 		function __construct(ViajeDao $dao) {
 			$this->viajeDao = $dao;
 	}
 	public function index($id) {
 		$viajes = $this->viajeDao->getByUser($id);
 		return view('viajes')->with('trips',$viajes);

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
