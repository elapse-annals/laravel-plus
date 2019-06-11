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
    public $per_page = 10;

    public function getList()
    {
        return Temp::paginate($this->per_page);
    }

    public function find($id)
    {
        return Temp::find($id);
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
