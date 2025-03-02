<?php

namespace Pishgaman\BackUpDB;

use Illuminate\Support\ServiceProvider;

class BackUpDBServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'BackUpView');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'BackUpDBLang');

        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->publishes([
            // __DIR__.'/config/PishgamanSMS.php' => config_path('PishgamanSMS.php'),
        ]);

        // $this->app->bind(SMS::class , $lib );
    }
}
