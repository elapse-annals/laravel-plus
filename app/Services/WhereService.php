<?php

namespace App\Services;

/**
 * Class WhereService
 *
 * @package App\Services
 */
class WhereService extends Service
{
    const MIN_TIME = '1970-01-01 07:00:00';
    const MAX_TIME = '2038-01-19 03:14:07';

    /**
     * @param array $request_data
     * @param array $search_map
     * @param array $where
     * @param array $search_accurate_array
     *
     * @return array
     */
    public static function assemblySearchCriteria(
        array $request_data,
        array $search_map,
        array $where = [],
        array $search_accurate_array = []
    )
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

    /**
     * @param $column
     * @param $start_date
     * @param $end_date
     *
     * @return array
     */
    public static function getBetweenDate($column, $start_date, $end_date)
    {
        if (empty($start_date) && !empty($end_date)) {
            $start_date = self::MIN_TIME;
        } elseif (empty($end_date) && !empty($start_date)) {
            $end_date = self::MAX_TIME;
        }
        $start_date = DateService::format($start_date) . ' 00:00:00';
        $end_date = DateService::format($end_date) . ' 23:59:59';
        $where_between = [$column, [$start_date, $end_date]];
        return $where_between;
    }

    /**
     * @param array $request_data
     *
     * @return array
     */
    private static function joinPage(array $request_data)
    {
        if (!$request_data['pages'] && $request_data['page']) {
            $request_data['pages'] = $request_data['page'];
        }
        if ($request_data['pages']) {
            $limit = [($request_data['pages']['current_page'] - 1) * $request_data['pages']['per_page'], $request_data['pages']['per_page']];
        } else {
            $limit = [0, 10];
        }
        return $limit;
    }

    public static function joinSearchString(array $request_data, array $search_map, $where = "", array $search_accurate_arr = [])
    {
        if ($request_data['search']) {
            foreach ($request_data['search'] as $key => $value) {
                if (((is_string($value) && '' != $value) || (is_array($value) && !empty($value))) && $search_map[$key]) {
                    switch ($key) {
                        case 'created_at':
                            $where .= self::getBetweenDateString($value['start'], $value['end'], '', $search_map[$key]);
                            break;
                        case 'updated_at':
                            $where .= self::getBetweenDateString($value['start'], $value['end'], '', $search_map[$key]);
                            break;
                        case 'verification_at':
                            $where .= self::getBetweenDateString($value['start'], $value['end'], '', $search_map[$key]);
                            break;
                        default:
                            if (is_array($value)) {
                                $condition = "";
                                foreach ($value as $handle) {
                                    $condition .= "'{$handle}'" . ',';
                                }
                                $condition = trim($condition, ',');
                                $where .= $search_map[$key] . ' IN (' . $condition . ') AND ';
                            } else {
                                if (($search_accurate_arr && in_array($key, $search_accurate_arr)) || isset($search_accurate_arr['all'])) {
                                    $where .= $search_map[$key] . ' = \'' . $value . '\' AND ';
                                }
                            }
                    }
                }
            }
        }
        $where = trim($where, 'AND ');
        $limit = self::joinPage($request_data);
        return [$where, $limit];
    }

    public static function getBetweenDateString($start_date, $end_date, $where, $date_key)
    {
        if (!empty($start_date) && !empty($end_date)) {
            $start_date .= ' 00:00:00';
            $end_date .= ' 23:59:59';
            $where = $date_key . ' BETWEEN ' . "'$start_date'" . ' AND ' . "'$end_date'" . ' AND ';
        } elseif (empty($start_date) && !empty($end_date)) {
            $end_date .= ' 23:59:59';
            $where = $date_key . ' <= ' . "'$end_date'" . ' AND ';
        } elseif (empty($end_date) && !empty($start_date)) {
            $start_date .= ' 00:00:00';
            $where = $date_key . ' >= ' . "'$start_date'" . ' AND ';
        }
        return $where;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public static function arrayToInString(array $data): string
    {
        $temp_data = array_values($data);
        $temp_string = implode("','", $temp_data);
        $temp_string = "'" . trim($temp_string, "','") . "'";
        return $temp_string;
    }
}
