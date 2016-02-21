<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'cantidad'];

    public function categoria() {
        return $this->belongsTo('App\Model\Categoria');
    }

}
