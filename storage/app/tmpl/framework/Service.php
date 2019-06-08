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

    private $request_data;

    /**
     * TempService constructor.
     */
    public function __construct($request_data)
    {
        parent::__construct();
        $this->request_data = $request_data;
        $this->repository = new TempRepository();
    }

    public function index()
    {
        return $this->repository
            ->getList();
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

    public function update()
    {
        $id = $this->request_data->id;
        return $this->repository
            ->save();
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
    }

    public function edit($id)
    {
    }
}
