<?php
namespace App\Model\Dao;

interface IViajeDao {

 public function obtenerTodos();
 public function obtenerPorId($id);
 public function guardar($id);
 public function eliminar($id);
}