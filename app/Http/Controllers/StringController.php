<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class StringController
 *
 * @package App\Http\Controllers
 */
class StringController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function plural(Request $request)
    {
        return Str::plural($request->singular);
    }
}
