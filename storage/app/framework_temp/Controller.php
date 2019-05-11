<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use App\Presenters\TestPresenter;
use App\Transformers\TestTransformer;
use App\Formatters\TestFormatter;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * @var TestService
     */
    protected $service;

    /**
     * TestController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TestService();
    }

    /**
     *
     */
    public function handle(): void
    {

    }
}
