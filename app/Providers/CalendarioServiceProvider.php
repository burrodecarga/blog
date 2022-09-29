<?php

namespace App\Providers;

use App\Interfaces\CallendarioServiceInterface;
use App\Services\CalendarioService;
use Illuminate\Support\ServiceProvider;

class CalendarioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(CallendarioServiceInterface::class, CalendarioService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
