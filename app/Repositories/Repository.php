<?php

namespace App\Repositories;

use App\Models\Model;

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
     *
     * @return object
     */
    protected function assembvlyWhere(object $model, array $data, array $table_maps = [])
    {
        foreach ($data as $key => $datum) {
            $model = $model->when($datum, function ($query, $datum) use ($key) {
                return $query->where($key, $datum);
            });
        }
        return $model;
    }
}
