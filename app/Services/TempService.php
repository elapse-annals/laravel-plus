<?php

namespace App\Services;

use App\Presenters\TempPresenter;
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
     * @var
     */
    private $request_data;

    /**
     * TempService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repository = new TempRepository();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($data)
    {
        if (isset($data['per_page'])) {
            $this->repository->per_page = $data['per_page'];
        }
        return $this->repository
            ->getList();
    }

    /**
     * @param $data
     *
     * @return int
     */
    public function store($data)
    {
        return $this->repository
            ->create($data);
    }

    /**
     *
     */
    public function create()
    {
    }

    /**
     * @param $id
     *
     * @return \App\Models\Temp|\App\Models\Temp[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getIdInfo($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param $data
     *
     * @return int
     */
    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }


}
