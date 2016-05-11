<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario;
use App\Model\Zona;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //'nombre', 'apellido', 'celular', 'correo', 'usuario', 'contrasena', 'comentario'

        // DB::table('usuarios')->delete();
        // Usuario::create(
        //     array(
        //         'nombre' => 'Esteban',
        //         'apellido' => 'Hernandez',
        //         'celuar' => '3119988770',
        //         'email' => 'esteban@saion.com',
        //         'usuario' => 'esteban', 
        //         'password' => Hash::make('12345'),
        //         'comentario'=> 'puntual')
        // );

         DB::table('zonas')->delete();
        Zona::create(
            array(
                'nombre' => 'Zona_prueba',
                'punto1' => '37.425',
                'punto2' => '-122.1321',
                'punto3' => '37.442',
                'punto4' => '-122.1622',
                'punto5' => '37.4412',
                'punto6' => '-122.1322',
                'punto7' => '37.425',
                'punto8' => '-122.1021',
                'descripcion' => 'Esta es la prueba del módulo de zonas')

        );
        Zona::create(
            array(
                'nombre' => 'Zona_prueba1',
                'punto1' => '37.425',
                'punto2' => '-122.1321',
                'punto3' => '37.442',
                'punto4' => '-122.1622',
                'punto5' => '37.4412',
                'punto6' => '-122.1322',
                'punto7' => '37.425',
                'punto8' => '-122.1021',
                'descripcion' => 'Esta es la prueba1 del módulo de zonas')

        );

Zona::create(
            array(
                'nombre' => 'Zona_prueba2',
                'punto1' => '37.425',
                'punto2' => '-122.1321',
                'punto3' => '37.442',
                'punto4' => '-122.1622',
                'punto5' => '37.4412',
                'punto6' => '-122.1322',
                'punto7' => '37.425',
                'punto8' => '-122.1021',
                'descripcion' => 'Esta es la prueba2 del módulo de zonas')

        );


    }

}
