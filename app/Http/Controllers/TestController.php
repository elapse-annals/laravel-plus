<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\FrameworkException;

class TestController extends Controller
{
    //
    public function exception()
    {
        throw new FrameworkException('xxxx');
    }
}
