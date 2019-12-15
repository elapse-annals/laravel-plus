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
 * @property int $id
 * @property string $name
 * @property int $sex
 * @property Carbon $created_at
 * @property string $created_by
 * @property Carbon $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 *
 * @package App\Models
 */
class Tmpl extends Model
{
	use SoftDeletes;
	protected $table = 'tmpls';

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
}
