<?php

namespace App\Services;

use App\Repositories\TempRepository;

/**
 * Class TempService
 *
 * @package App\Services
 */
class TempService extends Service
{
    /**
     * @var TempRepository
     */
    protected $repository;

    /**
     * TempService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repository = new TempRepository();
    }

    public function index()
    {
    }

    public function store(Request $request)
    {
    }

    public function create()
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $this->service->destroy($id);
    }

    public function edit($id)
    {
    }
}
