<?php

namespace App\Http\Controllers;

use App\Services\TempService;
use App\Presenters\TempPresenter;
use App\Transformers\TempTransformer;
use App\Formatters\TempFormatter;

/**
 * Class TempController
 *
 * @package App\Http\Controllers
 */
class TempController extends Controller
{
    /**
     * @var TempService
     */
    protected $service;

    /**
     * TempController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TempService();
    }

    /**
     *
     */
    public function handle(): void
    {
    }

    public function index(): void
    {
        return view('temp.index');
    }

    public function store(): void
    {
    }

    public function create(): void
    {
        return view('temp.create');
    }

    public function show(): void
    {
        return view('temp.show');
    }

    public function update(): void
    {
    }

    public function destroy(): void
    {
    }

    public function edit(): void
    {
        return view('temp.edit');
    }
}
