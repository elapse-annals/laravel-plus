<?php

namespace App\Repositories;

use App\Models\Model;
use App\Services\DateService;

/**
 * Class Repository
 * @package App\Repositories
 */
class Repository
{
    /**
     * Repository constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param object $model
     * @param array  $data
     * @param array  $table_maps
     * @param string $match_method
     *
     * @return object
     */
    protected function assembvlyWhere(object $model, array $data, array $table_maps = [], $match_method = 'left')
    {
        foreach ($data as $key => $datum) {
            if (empty($datum)) {
                contains();
            }
            $temp_key = $table_maps[$key] ?? $key;
            switch ($key) {
                case 'created_at':
                case 'updated_at':
                case 'deleteed_at':
                    $model = $model->when($datum, function ($query, $datum) use ($temp_key) {
                        return $query->whereBetween($temp_key, $this->getBetweenDate(...array_values($datum)));
                    });
                    break;
                default:
                    if (is_string($datum)) {
                        $temp_datum = $datum;
                        switch ($match_method) {
                            case 'all':
                                $temp_datum = '%' . $temp_datum;
                            case 'left':
                                $temp_datum = $temp_datum . '%';
                                $model = $model->when($datum, function ($query, $temp_datum) use ($temp_key) {
                                    return $query->where($temp_key, 'like', $temp_datum);
                                });
                                break;
                            default:
                                $model = $model->when($datum, function ($query, $datum) use ($temp_key) {
                                    return $query->where($temp_key, $datum);
                                });
                        }
                    } elseif (is_array($datum)) {
                        $model = $model->when($datum, function ($query, $datum) use ($temp_key) {
                            return $query->whereIn($temp_key, $datum);
                        });
                    }
            }
        }
        return $model;
    }

    /**
     * @param null $start_date
     * @param null $end_date
     *
     * @return array
     */
    public function getBetweenDate($start_date = null, $end_date = null): array
    {
        if (empty($start_date) && ! empty($end_date)) {
            $start_date = self::MIN_TIME;
        } elseif (empty($end_date) && ! empty($start_date)) {
            $end_date = self::MAX_TIME;
        }
        $start_date = DateService::toYmd($start_date) . ' 00:00:00';
        $end_date = DateService::toYmd($end_date) . ' 23:59:59';
        return [$start_date, $end_date];
    }
}
