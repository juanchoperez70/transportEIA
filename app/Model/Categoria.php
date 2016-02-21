<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categorias';
	
	protected $fillable = ['nombre'];
        public $timestamps = false;

        public function productos(){
            return $this->hasMany('App\Model\Producto');
        }
}
