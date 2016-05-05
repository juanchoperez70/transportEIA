<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('rutas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->double('lat_origen');
			$table->double('lng_origen');
			$table->double('lat_destino');
			$table->double('lng_destino');
			$table->datetime('fecha_inicio');
			$table->datetime('fecha_destino');
			$table->datetime('updated_at');
			$table->datetime('created_at');
			$table->integer('viaje_id');
			$table->string('descripcion');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('rutas');
	}

}
