<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Viaje extends Model implements AuthenticatableContract{

	use Authenticatable;
	protected $table = 'viajes';
 	protected $fillable = ['id', 'usuario_id', 'ruta_id'];

 	public function usuarios() {
 		return $this->hasMany('App\Model\Usuario');
 	}

 	public function ruta() {
 		return $this->hasOne('App\Model\Ruta');
 	}
}
