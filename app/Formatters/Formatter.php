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
     * @param object $data
     *
     * @return array
     */
    public function assemblyPage(object $data): array
    {
        return [
            "current_page" => $data->currentPage(),
            "sizes"        => [10, 50, 100, 300],
            "per_page"     => (int)$data->perPage(),
            "total"        => $data->total(),
        ];
    }
}
