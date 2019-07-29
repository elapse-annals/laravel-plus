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
            'info'       => $data['info'],
            'js_data'    => [
                'data' => $data['temps']->items(),
                'page' => $this->assemblyPage($data['temps']),
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
