<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use App\Model\Usuario;
use App\Model\Ruta;
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

 	public function guardar($id,$id_ruta) {
 		
 			$usuario= Usuario::find($id);
 			$usuario_id = $usuario['id'];

 			$ruta = Ruta::find($id_ruta);
 			$ruta_id = $ruta['id'];

 			$data = array('usuario_id'=>$usuario_id,'ruta_id'=>$ruta_id );
 			$viaje = Viaje::create($data);
 			
			$viaje->usuarios()->save($usuario);
			$viaje->ruta()->save($ruta);
			$viaje->save();
 			
 			
 			return $viaje;
 	} 

 	public function getByUserRuta($id_user,$id_ruta){

 		return Viaje::where('usuario_id',$id_user)->where('ruta_id',$id_ruta);
 	}

}
