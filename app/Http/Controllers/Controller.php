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
    }

    /**
     * @param \Exception $exception
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function catchException(\Exception $exception)
    {
        if ($exception->getCode()) {
            $status = $exception->getCode();
        } else {
            $status = 500;
        }
        return response($exception->getMessage(), $status);
    }
}
