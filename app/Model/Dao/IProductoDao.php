<?php

namespace App\Model\Dao;

/**
 *
 * @author Andres
 */
interface IProductoDao {

    public function obtenerTodos();

    public function obtenerPorId($id);

    public function guardar(array $data);

    public function eliminar($id);
    
    public function obtenerCategoriaPorId($id);

    public function obtenerCategorias();

    public function obtenerCategoriasSelect();
}
