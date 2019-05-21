<?php

namespace App\Services;

/**
 * Class TypeService
 *
 * @package App\Services
 */
class TypeService extends Service
{
    /**
     * @param $data
     * @return string
     */
    public function check($data)
    {
        if (is_array($data)) {
            return 'array';
        }
        if (is_object($data)) {
            return 'object';
        }
        if (is_string($data)) {

            return 'string';
        }
    }
}
