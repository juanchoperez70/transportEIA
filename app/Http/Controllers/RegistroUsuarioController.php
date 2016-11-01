<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Model\Dao\UsuarioDao;

class RegistroUsuarioController extends Controller {

    private $usuarioDao;
        function __construct(UsuarioDao $dao) {
            $this->usuarioDao = $dao;
    }

        public function getIndex() {
        return view('registro.registerform');   //


       } 
	 
      public function postCrear(Request $request) {

        if (!$request->isMethod('post')) {
            return redirect('listado/index');
        }
        $data = $request->all();

        $mensajesEspanol = array(
            'required' => 'El campo :attribute es requerido.',
            'between' => 'El campo :attribute debe estar dentro del rango (:min - :max) caracteres.',
            'email' => 'El campo :attribute debe ser una dirección de correo válido.',
            'alpha_num' => 'El :attribute debe ser alfanúmerico',
        );

        $validator = Validator::make($data, array('nombre' => 'required|alpha_num', 
        			'apellido' => 'required|alpha_num',
                    'email' => 'required|email',
                    'celular'=> 'required|num',
                    'username' => 'alpha_num|between:5,10',
                    'clave' => 'alpha_num|between:4,8'), $mensajesEspanol);

        if ($validator->fails()) {
            //Retornamos e imprimimos el formulario en pantalla con los mensajes de errores
            return redirect()->to('registro')
                            ->withErrors($validator)
                            ->withInput($request->input());
        } else {
            $this->usuarioDao->guardar($data);
            return view('registro.accept')->with('datos', $data);
        }
    }  

    
    public function getEditar($id) {
        if (!$id) {
        return redirect('listado/index');
    }
        return view('registro.registerform')->with(
            'usuario', $this->usuarioDao->obtenerPorId($id));
     }

    public function getEliminar($id) {
        if (!$id) {
            return redirect('listado/index');
        }
            $this->usuarioDao->eliminar($id);
            
        return redirect('listado/index');
    }

    public function getDetalle($id) {
        if (!$id) {
            return redirect('listado/index');
        }
                
        return view('registro.detalle')->with('usuario', $this->usuarioDao->obtenerPorId($id));
    }

}
