<?php

namespace App\Services;

/**\
 * Class WherePresenter
 * @package App\Presenters
 */
class WhereService extends Service
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function jsonToArray(array $data): array
    {
        $where_arr = [];
        $TypePresenter = new TypeService();
        foreach ($data as $datum) {
            switch ($TypePresenter->check($datum)) {
                case 'string':
                    break;
                case 'array':
                    break;
            }
        }
        return $where_arr;
    }

}
