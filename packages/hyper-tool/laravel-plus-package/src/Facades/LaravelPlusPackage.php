<?php

namespace HyperTool\LaravelPlusPackage\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelPlusPackage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-plus-package';
    }
}
