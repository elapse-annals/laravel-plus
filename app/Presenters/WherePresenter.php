<?php

namespace App\Presenters;

/**\
 * Class WherePresenter
 * @package App\Presenters
 */
class WherePresenter extends Presenter
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function jsonToArray(array $data): array
    {
        $where_arr = [];
        $TypePresenter = new TypePresenter();
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
