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

    /**
     * @param string $string
     *
     * @return bool
     * @throws \JsonException
     */
    public static function isJson(string $string): bool
    {
        json_decode($string, true, 512, JSON_THROW_ON_ERROR);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * @param string $string
     *
     * @return mixed
     * @throws \JsonException
     */
    public static function jsonToArray(string $string)
    {
        if (self::isJson($string)) {
            return json_decode($string, true, 512, JSON_THROW_ON_ERROR);
        } else {
            throw new \Exception('error json string', 401);
        }
    }

}
