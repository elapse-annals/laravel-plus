<?php

namespace App\Formatters;

/**
 * Class TempFormatter
 *
 * @package App\Formatters
 */
class TempFormatter extends Formatter
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function formatIndex(array $data): array
    {
        return [
            'temps' => $data['temps'],
            'info' => $data['info'],
            'js_data' => [
                'data' => $data['temps']->items(),
                'page' => [
                    "current_page" => $data['temps']->currentPage(),
                    "sizes" => [10, 50, 100, 300],
                    "per_page" => $data['temps']->perPage(),
                ],
            ],
            'table_data' => $data['table_data'],
        ];
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function formatShow(array $data): array
    {
        return $data;
    }


}
