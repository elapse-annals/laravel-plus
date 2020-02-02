<?php

namespace App\Http\Controllers;

use App\Services\StringService;
use Illuminate\Http\Request;

/**
 * Class StringController
 * @package App\Http\Controllers
 */
class StringController extends Controller
{
    /**
     * @var StringService
     */
    protected $service;

    /**
     * StringController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new StringService();
    }

    //
    public function plural(Request $request)
    {
        return $this->service->plural($request);
    }

    public function removeKilometer(Request $request)
    {
        return $this->service->removeKilometer($request);
    }

    public function __call($method, $parameters)
    {
    }
}
