<?php

namespace App\Presenters;

/**
 * Class TempPresenter
 *
 * @package App\Presenters
 */
class DataPresenter extends Presenter
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
