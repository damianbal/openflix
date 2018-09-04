<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use damianbal\Restpal\RestpalConfiguration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $restpalConfig = $this->app->make(RestpalConfiguration::class);

        $restpalConfig->setValidation('User', 'create', [
            'email' => 'required|min:3|email|unique:users',
            'password' => 'required|min:3',
            'name' => 'required|min:3'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
