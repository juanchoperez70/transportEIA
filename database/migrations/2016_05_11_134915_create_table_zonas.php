<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableZonas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zonas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre',100);
			$table->double('punto1');
			$table->double('punto2');
			$table->double('punto3');
			$table->double('punto4');
			$table->double('punto5');
			$table->double('punto6');
			$table->double('punto7');
			$table->double('punto8');
			$table->string('descripcion',200);
			$table->datetime('updated_at');
			$table->datetime('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('zonas');//
	}

}
