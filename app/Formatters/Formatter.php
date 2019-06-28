<?php

namespace App\Formatters;

/**
 * Class Formatter
 *
 * @package App\Formatters
 */
class Formatter
{
    /**
     * Formatter constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param array $data
     * @param bool $is_auto
     * @param array $change_keys
     * @param int $dacimals
     *
     * @return array
     */
    public function numberFormatAuto(array $data, bool $is_auto = true, array $change_keys = [], int $dacimals = 2): array
    {
        [$current_dimension_change_keys, $next_dimension_change_keys] = $this->splitDimension($change_keys);
        foreach ($data as $key => &$datum) {
            if (is_array($datum)) {
                $datum = $this->numberFormatAuto($datum, $is_auto, $next_dimension_change_keys, $dacimals);
            }
            if ($is_auto && (is_int($datum) || is_float($datum))) {
                $datum = number_format($datum, $dacimals);
            }
            if ($current_dimension_change_keys && in_array($key, $current_dimension_change_keys)) {
                $datum = number_format($datum, $dacimals);
            }
        }
        return $data;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function splitDimension(array $data): array
    {
        $current_dimension_change_keys = $next_dimension_change_keys = [];
        foreach ($data as $datum) {
            $current_dimension_change_keys[] = strstr($datum, '.', true);
            $next_dimension_change_keys[] = strstr($datum, '.');
        }
        return [$current_dimension_change_keys, $next_dimension_change_keys];
    }
}
