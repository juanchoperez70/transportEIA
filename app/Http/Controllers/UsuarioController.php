<?php
namespace App\Http\Controllers;

use App\Model\Dao\UsuarioDao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller {

    protected $usuarioDao;

    public function __construct(UsuarioDao $dao) {
        $this->usuarioDao = $dao;

    }

    public function index() {
        return redirect('usuario/listar');
    }

    public function listar() {
        return view('index')->with(array('usuarios' => $this->usuarioDao->obtenerTodos(),
                    'titulo' => "Listado Usuarios"));
    }

    public function ver($id) {
        $resultado = $this->usuarioDao->obtenerPorId($id);

        return view('ver')->with(array('usuario' => $resultado,
                    'titulo' => "Detalle usuario"));
    }

    public function guardar(Request $request)
    {
        $data=$request->all();
        $mensaje = array(
             'required' => 'El campo :attribute es requerido.',
             'min' => 'El campo :attribute debe contener al menos :min caracteres.',
             'email' => 'El campo :attribute debe ser una dirección de correo válido.',
             'alpha_num' => 'El :attribute debe contener sólo letras y números',
             'between:5,10'=> 'El campo ::attribute debe tener entre 5 y 10 caracteres',
             'between:4,8'=> 'El campo ::attribute debe tener entre 4 y 8 caracteres'
             );
             $validator = Validator::make($data, array('nombre' => 'required|alpha_num',
                         'apellido' => 'required|alpha_num',
                         'email' => 'required|email',
                         'username' => 'alpha_num|between:5,10',
                         'password' => 'alpha_num|between:4,8'), $mensaje);
             if ($validator->fails()) {
                 //Retornamos e imprimimos el formulario en pantalla con los mensajes de errores
                 return redirect()->to('/usuario/crear')
                     ->withErrors($validator)
                     ->withInput($request->input());
             } else {
                $usuario=$this->usuarioDao->guardar($data);
                return view('ver')->with(array('usuario'=>$usuario, 'titulo'=>'Detalle'));
             }

    }

    public function crear()
    {
        return view('crear');
    }

    public function eliminar($id)
    {
        $this->usuarioDao->eliminar($id);
        return redirect('usuario/listar');
    }

}
