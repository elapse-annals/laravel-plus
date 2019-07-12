<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class StringService
 * @package App\Services
 */
class StringService extends Service
{
    
    /**
     * @param Request $request
     *
     * @return string
     */
    public function plural(Request $request): string
    {
        return Str::plural($request->singular);
    }

    /**
     * 
     */
    public static function removeKilometer(string $data):float
    {
        return str_replace(',','',$data);
    }

}
