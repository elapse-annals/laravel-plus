<?php

namespace App\Http\Controllers;

use App\Exceptions\FrameworkException;

class TestController extends Controller
{
    /**
     * @throws FrameworkException
     */
    public function exception(): void
    {
        throw new FrameworkException('xxxx');
    }
}
