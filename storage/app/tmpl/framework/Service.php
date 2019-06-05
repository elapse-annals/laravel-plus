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

}
