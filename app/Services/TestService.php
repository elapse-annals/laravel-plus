<?php

namespace App\Services;

use App\Repositories\TestRepository;

/**
 * Class TestService
 *
 * @package App\Services
 */
class TestService extends Service
{
    /**
     * @var TestRepository
     */
    protected $repository;

    /**
     * TestService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repository = new TestRepository();
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
