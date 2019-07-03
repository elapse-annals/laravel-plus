<?php

namespace App\Services;

/**
 * Class TempPresenter
 *
 * @package App\Presenters
 */
class DataService extends Service
{
    /**
     * @param array $data
     *
     * @return \Generator
     */
    public static function toYield(array $data)
    {
        foreach ($data as $value) {
            yield $value;
        }
    }

}
