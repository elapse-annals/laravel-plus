<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

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
 *
 * @package App\Models\Base
 */
class Language extends Model
{
	use SoftDeletes;
	protected $table = 'languages';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];
}
