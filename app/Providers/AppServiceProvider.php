<?php

namespace App\Providers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            //            $this->app->register(Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if mysql version < 5.7.7
        Schema::defaultStringLength(191);

        if (true === env('ENABLE_HOT_SWITCHING')) {
            $this->initDynamicConfig();
        }
        if (true === env('LANG_REDIS_CONFIGURE')) {
            $locale = app()->getLocale();
            $lang_configure = Redis::get('LANG_' . $locale);
            app('translator')->addLines($lang_configure, $locale);
        }
    }

    private function initDynamicConfig(): void
    {
        $app_env = env('APP_ENV');
        $config_arr = [];
        $dynamic_is_strict = env('DYNAMIC_IS_STRICT');
        switch ($app_env) {
            case 'local':
            case 'test':
            case 'simulation':
            case 'develop':
                $env_conf = config("dynamic.{$app_env}");
                $develop_conf = [];
                if (false === $dynamic_is_strict) {
                    $develop_conf = config("dynamic.develop");
                }
                $config_arr['dynamic'] = (array)array_merge((array)$develop_conf, (array)$env_conf);
                config($config_arr);
                break;
            case 'production':
                $env_conf = config("dynamic.{$app_env}");
                $production_conf = [];
                if (false === $dynamic_is_strict) {
                    $production_conf = config("dynamic.production");
                }
                $config_arr['dynamic'] = (array)array_merge((array)$production_conf, (array)$env_conf);
                config($config_arr);
                break;
        }
    }
}
