<?php

namespace App\Services;

use Generator;

/**
 * Class DataService
 * @package App\Services
 */
class DataService extends Service
{
    /**
     * @param array $data
     *
     * @return Generator
     */
    public static function toYield(array $data)
    {
        foreach ($data as $value) {
            yield $value;
        }
    }

}
