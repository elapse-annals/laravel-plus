<?php

namespace App\Presenters;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class StringController
 *
 * @package App\Http\Controllers
 */
class StringPresenter extends Presenter
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
}
