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
    public function handle()
    {
    }

    public function index()
    {
        $this->service->index();
        return view('temp.index');
    }

    public function store(Request $request)
    {
        $this->service->store();
    }

    public function create()
    {
        $this->service->create();
        return view('temp.create');
    }

    public function show($id)
    {
        $this->service->show($id);
        return view('temp.show');
    }

    public function update(Request $request, $id)
    {
        $this->service->update();

    }

    public function destroy($id)
    {
        $this->service->destroy($id);
    }

    public function edit($id)
    {
        $this->service->edit($id);
        return view('temp.edit');
    }
}
