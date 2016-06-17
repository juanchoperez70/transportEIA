<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Ruta extends Model implements AuthenticatableContract {

	use Authenticatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rutas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['lat_origen', 'lng_origen', 'lat_destino', 'lng_destino', 'fecha_inicio', 'fecha_destino', 'descripcion','usuario_id'];
	
	public function viaje(){
		return $this->belongsTo('App\Model\Viaje');
	}

	public function driver(){
		return $this->belongsTo('App\Model\Usuario');
	}

	public function zonas(){
		return $this->belongsToMany('App\Model\Zona');
	}
}
