<?php

namespace Pishgaman\PishgamanApi;

use Illuminate\Support\ServiceProvider;

class PishgamanApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/Api.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'PishgamanApiView');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'PishgamanApiLang');

        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->publishes([
        ]);


    }
}
