<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model;

/**
 * Class Tmpl
 *
 * @property int    $id
 * @property string $name
 * @property int    $sex
 * @property Carbon $created_at
 * @property string $created_by
 * @property Carbon $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 * @package App\Models
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tmpl onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tmpl whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tmpl withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tmpl withoutTrashed()
 * @mixin \Eloquent
 */
class Tmpl extends Model
{
    use SoftDeletes;

    protected $table = 'tmpls';

    protected $casts = [
        'sex' => 'int',
    ];

    protected $fillable = [
        'name',
        'sex',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
