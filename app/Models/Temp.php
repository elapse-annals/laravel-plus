<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Aug 2019 05:40:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Temp
 *
 * @property int $id
 * @property string $name
 * @property int $sex
 * @property \Carbon\Carbon $created_at
 * @property string $created_by
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 * @package App\Models
 */
class Temp extends Eloquent
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $casts = [
        'sex' => 'int'
    ];

    protected $fillable = [
        'name',
        'sex',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function info()
    {
        return $this->hasOne('App\Models\Info');
    }
}
