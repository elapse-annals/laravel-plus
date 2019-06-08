<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class TestRepository
 *
 * @package App\Presenters
 */
class TestRepository extends Repository
{
    public function getList()
    {
        return User::all();
    }

    /**
     * @param int   $id
     * @param array $save
     *
     * @return int
     */
    public function save(int $id, array $save): int
    {
        return User::find($id)
            ->save($save);
    }
}
