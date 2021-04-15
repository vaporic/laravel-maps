<?php namespace Vaporic\LaravelMaps\Providers;

use Vaporic\LaravelMaps\Map;
use Illuminate\Support\ServiceProvider;

class Service extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->singleton('map', function () {
            return new Map(['apiKey' => config('services.google.maps.api-key')]);
        });
    }

    public function provides() : array
    {
        return array('vaporic-laravel-maps');
    }
}
