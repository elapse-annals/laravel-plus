<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @property int $id
 * @property string $key_word
 * @property string $code
 * @property string $key_value
 * @property Carbon $created_at
 * @property string $created_by
 * @property Carbon $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 * @package App\Models
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Language onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereKeyValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereKeyWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Language withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Language withoutTrashed()
 * @mixin \Eloquent
 */
class Language extends Model
{
	use SoftDeletes;
	protected $table = 'languages';

	protected $fillable = [
		'key_word',
		'code',
		'key_value',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
