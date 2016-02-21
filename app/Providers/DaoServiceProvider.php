<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DaoServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('App\Model\Dao\ProductoDao');
    }

}
