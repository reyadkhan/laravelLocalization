<?php
/**
 * Localization service provider
 *
 * Entry point of this package
 */

namespace WebCode\Localization;

use Illuminate\Support\ServiceProvider;
use WebCode\Localization\Middlewares\LocalizationMiddleware;

class LocalizationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/localization.php' => config_path('localization.php')
        ], 'config');

        $this->app['router']->pushMiddlewareToGroup('web', LocalizationMiddleware::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localization.php', 'localization');
    }
}
