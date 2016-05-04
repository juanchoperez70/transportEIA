<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use App\Model\Usuario;
use App\Model\Viaje;

class ViajeDao implements IViajeDao {

	//

	 public function obtenerPorId($id) {
	 return Viaje::find($id);
 	}
 		public function obtenerTodos() {
 		return Viaje::all();
 		}

 		public function eliminar($id) {
 			if ($id) {
 				$viaje = Viaje::find($id);
 				$viaje->delete();
 			}
 		}
 	public function guardar($id) {
 		$data = array('usuario_id' =>$id ,'ruta_id'=>'3' );
 			$viaje = Viaje::create($data);
 			$viaje->usuarios()->save($data);
 			$viaje->save();
 			return $viaje;
 	} 

 	

}
