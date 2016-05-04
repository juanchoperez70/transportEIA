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
			$table->integer('usuario_id');
			$table->integer('ruta_id');
			$table->datetime('updated_at');
			$table->datetime('created_at');
			});//
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
