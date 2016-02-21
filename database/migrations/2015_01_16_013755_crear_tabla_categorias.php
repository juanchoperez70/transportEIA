<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategorias extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
        });
        DB::statement("TRUNCATE TABLE productos");
        Schema::table('productos', function(Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('productos', function(Blueprint $table) {
            $table->dropForeign('productos_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });
        Schema::drop('categorias');
    }

}
