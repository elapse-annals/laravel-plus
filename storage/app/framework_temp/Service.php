<?php


namespace App\Services;

use App\Respositories\TestRepository;

class TestService extends Service
{
    public function __construct()
    {
        parent::__construct();
        $this->repository = new TestRepository();
    }

}