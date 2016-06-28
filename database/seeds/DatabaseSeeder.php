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

        'nombre', 'apellido', 'celular', 'correo', 'usuario', 'contrasena', 'comentario'

        DB::table('usuarios')->delete();
        Usuario::create(
            array(
                'nombre' => 'Esteban',
                'apellido' => 'Hernandez',
                'celuar' => '3119988770',
                'email' => 'esteban@saion.com',
                'usuario' => 'esteban', 
                'password' => Hash::make('12345'),
                'viaje_id' => 0,
                'comentario'=> 'puntual')
        );

//          DB::table('zonas')->delete();
//         Zona::create(
//             array(
//                 'nombre' => 'San Diego',
//                 'punto1' => '6.23471715494602',
//                 'punto2' => '-75.57014465332031',
//                 'punto3' => '6.236540931525322',
//                 'punto4' => '-75.5687928199768',
//                 'punto5' => '6.228445874812434',
//                 'punto6' => '-75.56387901306152',
//                 'punto7' => '6.230749619080851',
//                 'punto8' => '-72.56868553161621',
//                 'descripcion' => 'Esta es la prueba del módulo de zonas')

//         );
//         Zona::create(
//             array(
//                 'nombre' => 'Balsos',
//                 'punto1' => '6.188726030677375',
//                 'punto2' => '-75.56130409240723',
//                 'punto3' => '6.185440796831991',
//                 'punto4' => '-75.54654121398926',
//                 'punto5' => '6.183520845521834',
//                 'punto6' => '-75.54563999176025',
//                 'punto7' => '6.184587485999269',
//                 'punto8' => '-75.5613899230957',
//                 'descripcion' => 'Esta es la prueba1 del módulo de zonas')

//         );

//         Zona::create(
//             array(
//                 'nombre' => 'Oriente',
//                 'punto1' => '6.162400921526595',
//                 'punto2' => '-75.43642044067383',
//                 'punto3' => '6.183904836341574',
//                 'punto4' => '-75.43470382690432',
//                 'punto5' => '6.168544986241183',
//                 'punto6' => '-75.51521301269531',
//                 'punto7' => '6.15233132833537',
//                 'punto8' => '-75.51658630371094',
//                 'descripcion' => 'Esta es la prueba1 del módulo de zonas')

//         );


    }

}
