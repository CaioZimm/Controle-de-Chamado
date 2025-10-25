<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{



    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * muda as senhas padrao de todo o sistema da breeze
     */
    public function boot(): void {        
        Password::defaults(function () {
            return Password::min(4); // mínimo de 4 caracteres
        });
    }
}
