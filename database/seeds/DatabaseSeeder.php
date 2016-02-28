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

        DB::table('usuario')->delete();
        Usuario::create(array('nombre' => 'Andrés',
            'email' => 'aguzman@bolsadeideas.com',
            'password' => Hash::make('12345'),));
    }

}
