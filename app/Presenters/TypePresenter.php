<?php

namespace App\Presenters;

/**
 * Class TypePresenter
 * @package App\Presenters
 */
class TypePresenter extends Presenter
{
    /**
     * @param $data
     *
     * @return string
     */
    public function check($data): string
    {
        $type = null;
        if (is_array($data)) {
            $type = 'array';
        }
        if (is_object($data)) {
            $type = 'object';
        }
        if (is_string($data)) {
            $type = 'string';
        }
        return $type;
    }
}
