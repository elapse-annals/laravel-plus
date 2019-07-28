<?php

namespace App\Repositories;

use App\Models\Temp;
use phpDocumentor\Reflection\Types\Object_;

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
     * @param array $data
     *
     * @return mixed
     */
    public function getList(array $data = [])
    {
        $Temp = new Temp();
        if (! empty($data)) {
            $Temp = $this->assembvlyWhere($Temp, $data);
        }
        return $Temp->Paginate($this->per_page);
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

    public function create(array $save)
    {
        return Temp::create($save);
    }

    /**
     * @param array $save
     *
     * @return Temp|\Illuminate\Database\Eloquent\Model
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
        return Temp::updateOrCreate($attributes, $save);
    }

    /**
     * @param array $save
     *
     * @return Temp|\Illuminate\Database\Eloquent\Model
     */
    public function update(array $save, $id)
    {
        $attributes['updated_at'] = $save['updated_at'];
        return Temp::find($id)->update($attributes, $save);
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
