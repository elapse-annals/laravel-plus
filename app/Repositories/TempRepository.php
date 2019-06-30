<?php

namespace App\Repositories;

use App\Models\Temp;

/**
 * Class TempRepository
 *
 * @package App\Presenters
 */
class TempRepository extends Repository
{
    /**
     * @var int
     */
    public $per_page = 10;

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList()
    {
        return Temp::paginate($this->per_page);
    }

    /**
     * @param $id
     *
     * @return Temp|Temp[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return Temp::find($id);
    }

    /**
     * @param array $save
     *
     * @return int
     */
    public function updateOrCreate(array $save): int
    {
        $attributes = [];
        if ($save['id']) {
            $attributes = [
                'id' => $save['id'],
            ];
        }
        return Temp::updateOrCreate($attributes, $save);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function destroy(int $id)
    {
        return Temp::destroy($id);
    }

}
