<?php

namespace App\Providers;

use App\Http\Controllers\smscontroller;
use App\sms\jamilsms;
use App\sms\merosms;
use App\sms\smsinterface;
use Illuminate\Support\ServiceProvider;

class smsprovider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(smscontroller::class)
        ->needs(smsinterface::class)
        ->give(function () {
            return new jamilsms();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}