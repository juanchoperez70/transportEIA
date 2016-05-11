<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use App\Model\Zona;


class ZonaDao implements IZonaDao {

	//

	 public function obtenerPorId($id) {
	 return Zona::find($id);
 	}
 		public function obtenerTodos() {
 		return Zona::all();
 		}

 		public function eliminar($id) {
 			if ($id) {
 				$zona = Zona::find($id);
 				$zona->delete();
 			}
 		}
 	public function guardar(array $data) {
 		$id = isset($data['id']) ? (int) $data['id'] : 0;
 			if ($id > 0) {
 				$zona = Zona::find($id);
 				$zona->fill($data);
 			} else {
 				$Zona = Zona::create($data);
 			}
 			$Zona->save();
 	} 

 	 	public function editar(array $data) {
 			$id = $data['id'];
 			$zona = Zona::find($id);
 			$zona->fill($data);
 			$zona->save();
 	} 
 	

}
