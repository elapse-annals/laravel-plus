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
    public function getList()
    {
        return Temp::all();
    }

    /**
     * @param int   $id
     * @param array $save
     *
     * @return int
     */
    public function save(int $id, array $save): int
    {
        return Temp::find($id)
            ->save($save);
    }
}
