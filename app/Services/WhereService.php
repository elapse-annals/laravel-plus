<?php

namespace App\Services;

/**\
 * Class WherePresenter
 *
 * @package App\Presenters
 */
class WhereService extends Service
{
    /**
     * @param array $request_data
     * @param array $search_map
     * @param array $where
     * @param array $search_accurate_array
     *
     * @return array
     */
    public static function joinSearchTemp(array $request_data, array $search_map, array $where = [], array $search_accurate_array = [])
    {
        if ($request_data['search']) {
            foreach ($request_data['search'] as $key => $value) {
                if (((is_string($value) && '' != $value) || (is_array($value) && !empty($value))) && $search_map[$key]) {
                    switch ($key) {
                        case 'created_at':
                        case 'updated_at':
                        case 'deleted_at':
                            $where['between'][] = self::getBetweenDate($search_map[$key], $value['start'], $value['end']);
                            break;
                        default:
                            if (is_array($value)) {
                                $where['in'][] = [$search_map[$key], $value];
                            } else {
                                if (($search_accurate_array && in_array($key, $search_accurate_array)) || isset($search_accurate_array['all'])) {
                                    $where['equal'][] = [$search_map[$key], $value];
                                } else {
                                    $where['equal'][] = [$search_map[$key], 'LIKE', "%{$value}%"];
                                }
                            }
                    }
                }
            }
        }
        $limit = self::joinPage($request_data);
        return [$where, $limit];
    }

    public static function getBetweenDate($date_key, $start_date, $end_date)
    {
        if (!empty($start_date) && !empty($end_date)) {
            $start_date = DateModel::toYmd($start_date) . ' 00:00:00';
            $end_date = DateModel::toYmd($end_date) . ' 23:59:59';
            $where_between = ['BETWEEN', [$start_date, $end_date]];
        } elseif (empty($start_date) && !empty($end_date)) {
            $end_date = DateModel::toYmd($end_date) . ' 23:59:59';
            $where[$date_key] = array('ELT', $end_date);
        } elseif (empty($end_date) && !empty($start_date)) {
            $start_date = DateModel::toYmd($start_date) . ' 00:00:00';
            $where[$date_key] = array('EGT', $start_date);
        }
        return $where_between;
    }


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
