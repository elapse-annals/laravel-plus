<?php


namespace App\Presenters;

use App\Services\TypeService;


/**
 * Class WhereRepository
 * @package App\Presenters
 */
class WhereRepository extends Repository
{
    /**
     * @param $data
     *
     * @return array
     */
    public function JsonToArr($data): array
    {
        $where_arr = [];
        $TypeService = new TypeService();
        foreach ($data as $datum) {
            switch ($TypeService->check($datum)) {
                case   'string':
                    break;
                case   'array':
                    break;
            }
        }
        return $where_arr;
    }
}