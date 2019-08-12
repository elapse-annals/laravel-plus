<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 12 Aug 2019 04:30:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $key
 * @property string $code
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property string $created_by
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 *
 * @package App\Models
 */
class Language extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'key',
		'code',
		'value',
		'created_by',
		'updated_by',
		'deleted_by'
	];
}
