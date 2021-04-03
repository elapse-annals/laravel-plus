<?php

namespace App\Repositories;

use App\Models\Team;

/**
 * Class TeamRepository
 *
 * @package App\Presenters
 */
class TeamRepository extends Repository
{
    /**
     * @var int
     */
    public $per_page = 10;

    /**
     * if this model associate other models need ->with('')
     *
     * @param array $data
     *
     * @return mixed
     */
    public function getList(array $data = [])
    {
        $Team = new Team();
        if (! empty($data)) {
            $Team = $this->assemblyWhere($Team, $data);
        }
        return $Team->orderBy('id')->Paginate($this->per_page);
    }

    /**
     * @param $id
     *
     * @return Team|Team[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return Team::find($id);
    }

    public function create(array $save)
    {
        return Team::create($save);
    }

    /**
     * @param array $save
     *
     * @return Team|\Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $save)
    {
        $attributes = [];
        if (isset($save['id'])) {
            $attributes['id'] = $save['id'];
        }
        if (isset($save['updated_at'])) {
            $attributes['updated_at'] = $save['updated_at'];
        }
        return Team::updateOrCreate($attributes, $save);
    }

    /**
     * @param array $save
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $save, $id)
    {
        return Team::where('id', $id)
            ->where('updated_at', $save['updated_at'])
            ->update($save);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function destroy(int $id)
    {
        return Team::destroy($id);
    }

}
