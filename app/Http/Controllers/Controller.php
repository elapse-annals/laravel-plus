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
        $app_env = env('APP_ENV');
        switch ($app_env) {
            case 'develop':
            case 'local':
            case 'production':
                $config_arr['dynamic'] = config("dynamic.{$app_env}");
                config($config_arr);
                break;
        }
    }
}
