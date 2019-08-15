<?php

namespace App\Repositories;

use App\Models\Language;
use phpDocumentor\Reflection\Types\Object_;

/**
 * Class LanguageRepository
 *
 * @package App\Presenters
 */
class LanguageRepository extends Repository
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
        $Language = new Language();
        if (!empty($data)) {
            $Language = $this->assembvlyWhere($Language, $data);
        }
        return $Language->Paginate($this->per_page);
    }

    /**
     * @param $id
     *
     * @return Language|Language[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return Language::find($id);
    }

    public function create(array $save)
    {
        return Language::create($save);
    }

    /**
     * @param array $save
     *
     * @return Language|\Illuminate\Database\Eloquent\Model
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
        return Language::updateOrCreate($attributes, $save);
    }

    /**
     * @param array $save
     *
     * @return Language|\Illuminate\Database\Eloquent\Model
     */
    public function update(array $save, $id)
    {
        $attributes['updated_at'] = $save['updated_at'];
        return Language::find($id)->update($attributes, $save);
    }

    /**
     * @param int $id
     *
     * @return int
     */
    public function destroy(int $id)
    {
        return Language::destroy($id);
    }

}
