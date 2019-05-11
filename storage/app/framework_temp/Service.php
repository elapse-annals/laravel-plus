<?php


namespace App\Services;

use App\Respositories\TestRepository;

/**
 * Class TestService
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

}