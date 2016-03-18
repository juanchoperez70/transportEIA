<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Model\Dao\UsuarioDao;


class ListadoController extends Controller {

	private $usuarioDao;
 		function __construct(UsuarioDao $dao) {
 			$this->usuarioDao = $dao;
 	}
 	public function getIndex() {
 		return view('listado.index')->with('titulo', 'Lista de Usuarios')->with
 		('usuarios', $this->usuarioDao->obtenerTodos());

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
