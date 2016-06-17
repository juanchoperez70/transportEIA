<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRutaZona extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ruta_zona', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ruta_id')->unsigned();
			$table->integer('zona_id')->unsigned();
			$table->foreign('zona_id')->references('id')->on('zonas');
			$table->foreign('ruta_id')->references('id')->on('rutas');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ruta_zona');
	}

}
