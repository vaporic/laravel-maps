<?php namespace Vaporic\LaravelMaps\Tests;

use Vaporic\LaravelModelCaching\Providers\Service as LaravelModelCachingService;
use Orchestra\Database\ConsoleServiceProvider;

trait CreatesApplication
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/database/factories');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function getPackageProviders($app)
    {
        return [
            LaravelModelCachingService::class,
            ConsoleServiceProvider::class,
        ];
    }
}
