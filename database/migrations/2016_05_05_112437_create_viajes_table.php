<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('viajes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('usuario_id')->unsigned();
			$table->integer('ruta_id')->unsigned();
			$table->datetime('updated_at');
			$table->datetime('created_at');
			$table->foreign('usuario_id')->references('id')->on('usuarios');
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
		Schema::drop('viajes');//
	}

}
