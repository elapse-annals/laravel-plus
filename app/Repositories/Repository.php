<?php

namespace App\Repositories;

use App\Models\Model;
use App\Services\DateService;
use Illuminate\Support\Facades\Date;

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
     * @param null $start_datetime
     * @param null $end_datetime
     *
     * @return array
     */
    public function getBetweenDate($start_datetime = null, $end_datetime = null): array
    {
        if (empty($start_datetime) && ! empty($end_datetime)) {
            $start_datetime = self::MIN_TIME;
        } elseif (empty($end_datetime) && ! empty($start_datetime)) {
            $end_datetime = self::MAX_TIME;
        }
        if (0 == DateService::format($start_datetime, 'time_only')) {
            $start_datetime = DateService::format($start_datetime) . ' 00:00:00';
        }
        if (0 == DateService::format($end_datetime, 'time_only')) {
            $end_datetime = DateService::format($end_datetime) . ' 23:59:59';
        }
        return [$start_datetime, $end_datetime];
    }
}
