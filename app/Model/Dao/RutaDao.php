<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Model\Ruta;
use App\Model\Zona;
use App\Model\Ruta_Zona;
use App\Model\Usuario;
use Auth;

class RutaDao implements IRutaDao {

	//

	 public function obtenerPorId($id) {
	 return Ruta::find($id);
 	}
 		public function obtenerTodos() {
 		return DB:: table('rutas')
            ->join('usuarios', 'rutas.usuario_id', '=', 'usuarios.id')
            ->join('ruta_zona', 'rutas.id', '=', 'ruta_zona.ruta_id')
            ->join('zonas', 'ruta_zona.zona_id', '=', 'zonas.id')
            ->select('rutas.*', 'usuarios.nombre', 'usuarios.apellido', 'zonas.nombre as zona_nombre')
            ->get();
 		}

 		public function eliminar($id) {
 			if ($id) {
 				$ruta = Ruta::find($id);
 				
 				foreach ($ruta->zonas as $zona) {
 					$ruta->zonas()->detach($zona);
 				}
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
 			
 			$zona_list= $data['zonas'];
 			
 			foreach ($zona_list as $zone) {
 				$ruta->zonas()->attach($zone); 			
 			}

 			//$ruta->driver->save($data['usuario_id']);
 			$ruta->save();
 	} 

 	 	public function editar(array $data) {
 			$id = $data['id'];
 			$ruta = Ruta::find($id);
 			$ruta->fill($data);
 			$ruta->save();
 	} 
 	

}
