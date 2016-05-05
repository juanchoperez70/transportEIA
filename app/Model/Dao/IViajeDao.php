<?php
namespace App\Model\Dao;

interface IViajeDao {

 public function obtenerTodos();
 public function obtenerPorId($id);
 public function guardar($id,$id_ruta);
 public function eliminar($id);
}