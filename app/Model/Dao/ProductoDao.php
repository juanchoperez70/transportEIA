<?php

namespace App\Model\Dao;

use App\Model\Producto;
use App\Model\Categoria;

/**
 * Description of ProductoDao
 *
 * @author Andres
 */
class ProductoDao implements IProductoDao {

    public function obtenerPorId($id) {
        return Producto::find($id);
    }

    public function obtenerTodos() {
        return Producto::with('categoria')->paginate(5); //para paginar cambiamos el método get() por paginate(5);
    }

    public function eliminar($id) {
        if ($id) {
            $producto = Producto::find($id);
            $producto->delete();
        }
    }

    public function guardar(array $data) {
        $id = isset($data['id']) ? (int) $data['id'] : 0;

        if ($id > 0) {
            $producto = Producto::find($id);
            $producto->fill($data);
        } else {
            $producto = new Producto($data);
        }

        $categoria = $this->obtenerCategoriaPorId((int)$data['categoria_id']);

        $producto->categoria()->associate($categoria);

        $producto->save();
    }

        public function obtenerCategorias() {
        return Categoria::all();
    }
    
    public function obtenerCategoriaPorId($id) {
        return Categoria::find($id);
    }

    public function obtenerCategoriasSelect() {
        $categorias = $this->obtenerCategorias();
        $select = array('0' => 'Seleccionar');
        foreach ($categorias as $categoria) {
            $select[$categoria->id] = $categoria->nombre;
        }
        return $select;
    }

}
