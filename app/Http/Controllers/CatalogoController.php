<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Dao\ProductoDao;
use Illuminate\Session\Store as Session;

class CatalogoController extends Controller {

    private $produtoDao;
    private $session;

    function __construct(ProductoDao $dao, Session $session) {
        $this->produtoDao = $dao;
        $this->session = $session;

        $this->middleware('auth', ['except' => 'getIndex']);
    }

    public function getIndex() {
        return view('catalogo.index')->with('titulo', 'Lista de Productos')
                        ->with('productos', $this->produtoDao->obtenerTodos());
    }

    public function getCrear() {
        return view('catalogo.form')
                        ->with('categorias', $this->produtoDao->obtenerCategoriasSelect())
                        ->with('titulo', 'Crear Producto');
    }

    public function getEditar($id) {
        if (!$id) {
            return redirect('catalogo/index');
        }
        return view('catalogo.form')->with('titulo', 'Editar Producto')
                        ->with('categorias', $this->produtoDao->obtenerCategoriasSelect())
                        ->with('producto', $this->produtoDao->obtenerPorId($id));
    }

    public function postGuardar(Request $request) {
        if (!$request->isMethod('post')) {
            return redirect('catalogo/index');
        }
        $data = $request->all();

        $validator = Validator::make($data, array('nombre' => 'required|min:6',
                    'precio' => 'required|integer',
                    'cantidad' => 'required|integer',
                    'categoria_id' => 'required|integer|min:1',));

        if ($validator->fails()) {
            //Retornamos e imprimimos el formulario en pantalla con los mensajes de errores
            return redirect()->to('catalogo/crear')
                            ->withErrors($validator)
                            ->withInput($request->input());
        }

        $this->produtoDao->guardar($data);

        $this->session->flash('message', "Producto guardado con éxito");
        $this->session->flash('alert-class', 'alert-success');
        return redirect('catalogo/index');
    }

    public function getEliminar($id) {
        if (!$id) {
            return redirect('catalogo/index');
        }
        $this->produtoDao->eliminar($id);

        $this->session->flash('message', "Producto eliminado con éxito");
        $this->session->flash('alert-class', 'alert-success');

        return redirect('catalogo/index');
    }

    public function getCargarProductos() {
        return view('catalogo.cargar-productos')
                        ->with('categorias', $this->produtoDao->obtenerCategoriasSelect())
                        ->with('titulo', 'Cargar Productos usando Ajax jQuery');
    }

    public function postCargarProductosAjax(Request $request, $format = "html") {
        if ($request->ajax()) {
            $catId = (int) $request->input("catId", 0);
            $data = $this->produtoDao->listarPorCategoriaIdSelect($catId);

            if ($format === 'html') {
                return view('catalogo.cargar-productos-ajax')->with('productos', $data);
            } else if ($format === 'json') {
                return response()->json($data);
            }
        }
        return response('Unauthorized.', 401);
    }

}
