<?php

namespace HyperTool\LaravelPlusPackage;

use Illuminate\Support\ServiceProvider;
use HyperTool\LaravelPlusPackage\Framework;

class LaravelPlusPackageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'hyper-tool');
        //        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'hyper-tool');
        //        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        if ($this->app->runningInConsole()) {
            $this->commands([
                                Framework::class,
                            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-plus-package.php', 'laravel-plus-package');

        // Register the service the package provides.
        $this->app->singleton('laravel-plus-package', function ($app) {
            return new LaravelPlusPackage;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-plus-package'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
                             __DIR__ . '/../config/laravel-plus-package.php' => config_path('laravel-plus-package.php'),
                         ], 'laravel-plus-package.config');

        // Publishing the views.
        $this->publishes([
                             __DIR__ . '/../resources/views' => base_path('resources/views/vendor/hyper-tool'),
                         ], 'laravel-plus-package.views');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/hyper-tool'),
        ], 'laravel-plus-package.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/hyper-tool'),
        ], 'laravel-plus-package.views');*/

        // Publishing the storage.
        $this->publishes([
                             __DIR__ . '/../resources/views' => base_path('resources/views/vendor/hyper-tool'),
                         ], 'laravel-plus-package.views');

        // Registering package commands.
        // $this->commands([]);
    }
}
