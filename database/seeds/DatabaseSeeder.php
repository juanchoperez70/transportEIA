<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //'nombre', 'apellido', 'celular', 'correo', 'usuario', 'contrasena', 'comentario'

        DB::table('usuarios')->delete();
        Usuario::create(
            array(
                'nombre' => 'Esteban',
                'apellido' => 'Hernandez',
                'celuar' => '3119988770',
                'email' => 'esteban@saion.com',
                'usuario' => 'esteban', 
                'password' => Hash::make('12345'),
                'comentario'=> 'puntual')
        );
    }

}
