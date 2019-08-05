<?php

namespace App\Services;

use App\Presenters\TmplPresenter;
use App\Repositories\TmplRepository;

/**
 * Class TmplService
 *
 * @package App\Services
 */
class TmplService extends Service
{
    /**
     * @var TmplRepository
     */
    protected $repository;

    /**
     * @var
     */
    private $request_data;

    /**
     * TmplService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repository = new TmplRepository();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function getList($data = [])
    {
        if (isset($data['per_page'])) {
            $this->repository->per_page = $data['per_page'];
        }
        if (! isset($data['search']) || '{}' == $data['search']) {
            $data['search'] = [];
        }
        return $this->repository->getList($data['search']);
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
     * @return \App\Models\Tmpl|\App\Models\Tmpl[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
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
