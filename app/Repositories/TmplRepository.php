<?php

namespace App\Repositories;

use App\Models\Tmpl;
use phpDocumentor\Reflection\Types\Object_;
use Illuminate\Support\Facades\Schema;

/**
 * Class TmplRepository
 *
 * @package App\Presenters
 */
class TmplRepository extends Repository
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
        $Tmpl = new Tmpl();
        if (! empty($data)) {
            $Tmpl = $this->assembvlyWhere($Tmpl, $data);
        }
        return $Tmpl->Paginate($this->per_page);
    }

    /**
     * @param $id
     *
     * @return Tmpl|Tmpl[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return Tmpl::find($id);
    }

    public function create(array $save)
    {
        return Tmpl::create($save);
    }

    /**
     * @param array $save
     *
     * @return Tmpl|\Illuminate\Database\Eloquent\Model
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
        return Tmpl::updateOrCreate($attributes, $save);
    }

    /**
     * @param array $save
     *
     * @return Tmpl|\Illuminate\Database\Eloquent\Model
     */
    public function update(array $save, $id)
    {
        $attributes['updated_at'] = $save['updated_at'];
        return Tmpl::find($id)->update($attributes, $save);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function destroy(int $id)
    {
        return Tmpl::destroy($id);
    }

}
