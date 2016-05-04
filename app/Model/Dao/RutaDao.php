<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ruta;


class RutaDao implements IRutaDao {

	//

	 public function obtenerPorId($id) {
	 return Ruta::find($id);
 	}
 		public function obtenerTodos() {
 		return Ruta::all();
 		}

 		public function eliminar($id) {
 			if ($id) {
 				$ruta = Ruta::find($id);
 				$ruta->delete();
 			}
 		}
 	public function guardar(array $data) {
 		$id = isset($data['id']) ? (int) $data['id'] : 0;
 			if ($id > 0) {
 				$ruta = Ruta::find($id);
 				$ruta->fill($data);
 			} else {
 				$ruta = Ruta::create($data);
 			}
 			$ruta->save();
 	} 

 	 	public function editar(array $data) {
 			$id = $data['id'];
 			$ruta = Ruta::find($id);
 			$ruta->fill($data);
 			$ruta->save();
 	} 
 	

}
