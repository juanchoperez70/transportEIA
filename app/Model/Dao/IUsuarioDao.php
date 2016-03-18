<?php
namespace App\Model\Dao;

interface IUsuarioDao {

 public function obtenerTodos();
 public function obtenerPorId($id);
 public function guardar(array $data);
 public function eliminar($id);
 public function obtenerDireccionPorId($id);
 
}