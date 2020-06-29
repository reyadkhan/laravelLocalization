<?php
/**
 * Localization service provider
 *
 * Entry point of this package
 */

namespace WebApp\Localization;

use Illuminate\Support\ServiceProvider;
use WebApp\Localization\Middlewares\LocalizationMiddleware;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application event
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/localization.php' => config_path('localization.php')
        ], 'config');

        $this->loadViewsFrom(__DIR__ . '/../views', 'localization');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/localization')
        ], 'view');

        $this->app['router']->pushMiddlewareToGroup('web', LocalizationMiddleware::class);
    }

    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localization.php', 'localization');
    }
}
