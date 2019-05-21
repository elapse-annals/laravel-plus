<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

/**
 * Class StringController
 * @package App\Http\Controllers
 */
class StringController extends Controller
{
    /**
     * @return string
     */
    public function plural($string)
    {
        return Str::plural($string);
    }
}
