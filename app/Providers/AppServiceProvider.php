<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Venue\VenueInterface;
use App\Services\Venue\VenueService;
use App\Services\Weather\WeatherInterface;
use App\Services\Weather\WeatherService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VenueInterface::class, VenueService::class);
        $this->app->bind(WeatherInterface::class, WeatherService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
