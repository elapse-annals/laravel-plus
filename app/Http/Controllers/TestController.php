<?php

namespace App\Http\Controllers;

use App\Exceptions\FrameworkException;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @throws FrameworkException
     */
    public function exception(): void
    {
        throw new FrameworkException('xxxx');
    }

    public function test(Request $request)
    {
        dd($request->input());
    }
}
