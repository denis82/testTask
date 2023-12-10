<?php

namespace App\Framework\Providers;

use App\Framework\Di\Race;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        foreach ((new Race)() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
