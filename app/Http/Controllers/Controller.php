<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $service;

    public function __construct()
    {
        $this->initDynamicConfig();
    }

    /**
     *
     */
    private function initDynamicConfig(): void
    {
        $app_env = env('APP_ENV');
        $config_arr = [];
        $dynamic_is_strict = env('DYNAMIC_IS_STRICT');
        switch ($app_env) {
            case 'local':
            case 'test':
            case 'develop':
                $env_conf = config("dynamic.{$app_env}");
                $develop_conf = [];
                if (false === $dynamic_is_strict) {
                    $develop_conf = config("dynamic.develop");
                }
                $config_arr['dynamic'] = (array)array_merge((array)$develop_conf, (array)$env_conf);
                config($config_arr);
                break;
            case 'simulation':
            case 'production':
                $env_conf = config("dynamic.{$app_env}");
                $production_conf = config("dynamic.production");
                if (false === $dynamic_is_strict) {
                    $production_conf = config("dynamic.develop");
                }
                $config_arr['dynamic'] = (array)array_merge((array)$production_conf, (array)$env_conf);
                config($config_arr);
                break;
        }
    }
}
