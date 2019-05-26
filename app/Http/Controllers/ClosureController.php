<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class ClosureController
 *
 * @package App\Http\Controllers
 */
class ClosureController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
