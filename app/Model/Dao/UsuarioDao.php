<?php namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use App\Model\Usuario;
use Illuminate\Support\Facades\DB;


class UsuarioDao implements IUsuarioDao {

	//

	 public function obtenerPorId($id) {
	 return Usuario::find($id)->get();
 	}
 		public function obtenerTodos() {
 		return Usuario::all();
 		}

 		public function eliminar($id) {
 			if ($id) {
 				$usuario = Usuario::find($id);
 				$usuario->delete();
 			}
 		}
 	public function guardar(array $data) {
 		$id = isset($data['id']) ? (int) $data['id'] : 0;
 			if ($id > 0) {
 				$usuario = Usuario::find($id);
 				$usuario->fill($data);
 			} else {
 				$data['password'] = bcrypt($data['password']);
 				$usuario = Usuario::create($data);
 			}
 			$usuario->save();
 	} 

 	public function obtenerDireccionPorId($id) {
 		return Direccion::find($id);
 	}
 	public function obtenerDirecciones() {
 		return Direccion::with('usuario')->get();
 	}

 	public function getrides($id){
 		return DB:: table('rutas')
            ->select(DB::raw('count(*) as rides_count'))
            ->where('rutas.usuario_id', $id)
            ->get();
 	}
 	

}
