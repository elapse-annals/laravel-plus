<?php

namespace App\Formatters;

/**
 * Class TmplFormatter
 *
 * @package App\Formatters
 */
class TmplFormatter extends Formatter
{
    /**
     * if Association model need :  
     *      foreach ($items as &$item) {
                $item['info'] = [$item['info']];
            }
     *
     * @param array $data
     *
     * @return array
     */
    public function formatIndex(array $data): array
    {
        $items = collect($data['tmpls']->items())->toArray();
        return [
            'info' => $data['info'],
            'js_data' => [
                'data' => $items,
                'page' => $this->assemblyPage($data['tmpls']),
            ],
            'list_map' => $data['list_map'],
            'search_map' => $data['search_map'],
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
