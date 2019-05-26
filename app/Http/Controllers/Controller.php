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
     * @return array
     */
    private function initDynamicConfig(): void
    {
        $app_env = env('APP_ENV');
        $config_arr = [];
        switch ($app_env) {
            case 'test':
            case 'local':
            case 'develop':
                $env_conf = config("dynamic.{$app_env}");
                $develop_conf = config("dynamic.develop");
                $config_arr['dynamic'] = (array)array_merge((array)$develop_conf, (array)$env_conf);
                config($config_arr);
                break;
            case 'simulation':
            case 'production':
                $env_conf = config("dynamic.{$app_env}");
                $production_conf = config("dynamic.production");
                $config_arr['dynamic'] = (array)array_merge((array)$production_conf, (array)$env_conf);
                config($config_arr);
                break;
        }
    }
}
