<?php
namespace App\Model\Dao;

interface IRutaDao {

 public function obtenerTodos();
 public function obtenerPorId($id);
 public function guardar(array $data);
 public function eliminar($id);
}