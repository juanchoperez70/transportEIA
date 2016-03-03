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

        DB::table('usuarios')->delete();
        Usuario::create(array('nombre' => 'Esteban',
            'email' => 'esteban@saion.com',
            'password' => Hash::make('12345'),));
    }

}
